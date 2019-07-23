<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Model\Attribute;
use App\Model\Product;
use App\Model\ProductDetail;
use Config;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $attributes     = Attribute::orderBy('display_order', 'asc')->get();

        return view('pages.product.index', [ 'attributes' => $attributes ] );
    }

    public function create( )
    {
        $attributes     = Attribute::orderBy('display_order', 'asc')->get();

        return view('pages.product.create', [ 'attributes' => $attributes ] );
    }

    public function edit( $id )
    {
        $attributes     = Attribute::orderBy('display_order', 'asc')->get();
        $product        = Product::find( $id );

        $product_detail = ProductDetail::where('product_id', $id)->get();

        $product_detail_row = array();
        for( $i = 0; $i < count( $product_detail ); $i ++ ){
            $product_detail_row[ $product_detail[$i]->attribute_id ] = $product_detail[$i]->val;
        }

        return view('pages.product.edit', [ 'attributes' => $attributes, 'product' => $product, 'product_detail' => $product_detail_row ] );
    }

    public function ajax(Request $req, $type)
    {
        $attributes     = Attribute::orderBy('display_order', 'asc')->get();

        switch ( $type ) {

            case 'load':
                $p_start = intval( $req->input('start'), 10);
                $p_length = intval( $req->input('length'), 10);
                $p_order = $req->input('order');
                $p_search = $req->input('search');

                $cols = array('No');
                for( $i = 0; $i < count( $attributes ); $i ++ )
                    array_push( $cols, $attributes[$i]['name'] );

                $start = $p_start >= 0 ? $p_start : 0;
                $length = $p_length >= 5 && $p_length <= 100 ? $p_length : 5;

                $order = "";
                for( $i = 0; $i < count( $p_order ); $i ++ ){
                    $order .= $cols[ $p_order[$i]['column'] ] . " " . $p_order[$i]['dir'];

                    if( $i < count( $p_order ) - 1 )
                        $order .= ", ";
                }

                $search = trim( $p_search['value'] );

                $total = 0;
                $totalAfterFilter = 0;

                $total = Product::count();

                $totalAfterFilter = Product::count();

                $sql    =   'SELECT     id, ';

                for( $i = 0; $i < count( $attributes ); $i ++ ){
                    $sql    .=  "( " .
                                "   SELECT  val " .
                                "   FROM    product_details AS t1 " .
                                "   WHERE   t1.product_id = t0.id " .
                                "           AND t1.attribute_id = {$attributes[$i]['id']} " .
                                ") AS {$attributes[$i]['name']}, ";
                }

                $sql    .=  "           created_at " .
                            "FROM       products AS t0 " .
                            "ORDER BY   created_at " .
                            "LIMIT      {$start}, {$length} ";

                $data = DB::select( $sql );

                $result["recordsTotal"] = $total;
                $result["recordsFiltered"] = $totalAfterFilter;
                $result["data"] = $data;
                $result["sql"] = $sql;

                return response( $result )
                    ->header('Content-Type', 'application/json');

                break;

            case 'create':

                $input_data = array();

                for( $i = 0; $i < count( $attributes ); $i ++ ){
                    if( $attributes[$i]->type === 'text' )
                        $input_data[ $attributes[$i]->name ] = trim( $req->input( $attributes[$i]->name ) );

                    if( $attributes[$i]->type === 'number' )
                        $input_data[ $attributes[$i]->name ] = doubleval( $req->input( $attributes[$i]->name ) );

                    if( $attributes[$i]->type === 'file' ){
                        $file = $req->file($attributes[$i]->name);

                        if( isset( $file ) ){
                            $new_file_name = md5( time() ) . '.' . $file->getClientOriginalExtension();
                            $file->move( public_path() . '/img/product/', $new_file_name );
                            $input_data[ $attributes[$i]->name ] = $new_file_name;
                        }
                    }
                }

                $data = new Product;
                $data->save();

                $last_product_id = $data->id;

                for( $i = 0; $i < count( $attributes ); $i ++ ){
                    $data = new ProductDetail;
                    $data->product_id       = $last_product_id;
                    $data->attribute_id     = $attributes[$i]->id;
                    $data->val              = $input_data[ $attributes[$i]->name ];
                    $data->save();
                }

                return redirect('product');

                break;

            case 'update':
                $id         = intval( $req->input('id'), 10);
                $input_data = array();

                for( $i = 0; $i < count( $attributes ); $i ++ ){
                    if( $attributes[$i]->type === 'text' )
                        $input_data[ $attributes[$i]->name ] = trim( $req->input( $attributes[$i]->name ) );

                    if( $attributes[$i]->type === 'number' )
                        $input_data[ $attributes[$i]->name ] = doubleval( $req->input( $attributes[$i]->name ) );

                    if( $attributes[$i]->type === 'file' ){
                        $is_file = intval( $req->input( 'is_' . $attributes[$i]->name ), 10 );

                        if( $is_file > 0 ){
                            $file = $req->file($attributes[$i]->name);
                            $new_file_name = md5( time() ) . '.' . $file->getClientOriginalExtension();
                            $file->move( public_path() . '/img/product/', $new_file_name );
                            $input_data[ $attributes[$i]->name ] = $new_file_name;
                        }
                    }
                }

                $data = Product::find( $id );
                $data->save();

                $last_product_id = $data->id;

                for( $i = 0; $i < count( $attributes ); $i ++ ){
                    $data = ProductDetail::where('product_id', $last_product_id)->where('attribute_id', $attributes[$i]->id)->first();

                    if( count( $data ) > 0 ){
                        if( isset( $input_data[ $attributes[$i]->name ] ) ){
                            $data->val              = $input_data[ $attributes[$i]->name ];
                            $data->save();
                        }
                    } else {
                        $data = new ProductDetail;
                        $data->product_id       = $last_product_id;
                        $data->attribute_id     = $attributes[$i]->id;
                        $data->val              = $input_data[ $attributes[$i]->name ];
                        $data->save();
                    }
                }

                return redirect('product');

                break;

            case 'delete':
                $result = array('code'=>-1, 'msg'=> Config::get('constants.E_FAILED') );

                $id = intval( $req->input('id'), 10);

                if( $id > 0 ){
                    ProductDetail::where('product_id', $id)->delete();

                    $row = Product::find( $id );
                    $row->delete();

                    $result['code'] = 0;
                    $result['msg']  = Config::get('constants.S_OK');
                }

                return response( $result )
                    ->header('Content-Type', 'text/json');

                break;

            default:
                break;
        }
    }
}
