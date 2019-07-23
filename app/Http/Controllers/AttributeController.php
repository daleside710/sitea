<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Attribute;
use Config;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('pages.attribute.index');
    }

    public function ajax(Request $req, $type)
    {

        switch ( $type ) {

            case 'load':
                $p_start = intval( $req->input('start'), 10);
                $p_length = intval( $req->input('length'), 10);
                $p_order = $req->input('order');
                $p_search = $req->input('search');

                $cols = array('No', 'name', 'display_order', 'type', 'memo', 'created_at', 'updated_at');

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

                $total = Attribute::count();

                $totalAfterFilter = DB::table('attributes')
                    ->select('attributes.*')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('display_order', 'LIKE', '%' . $search . '%')
                    ->orWhere('type', 'LIKE', '%' . $search . '%')
                    ->orWhere('memo', 'LIKE', '%' . $search . '%')
                    ->count();

                $data = DB::table('attributes')
                    ->select('attributes.*')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('display_order', 'LIKE', '%' . $search . '%')
                    ->orWhere('type', 'LIKE', '%' . $search . '%')
                    ->orWhere('memo', 'LIKE', '%' . $search . '%')
                    ->orderByRaw( $order )
                    ->offset( $start )
                    ->limit( $length )
                    ->get();

                $result["recordsTotal"] = $total;
                $result["recordsFiltered"] = $totalAfterFilter;
                $result["data"] = $data;

                return response( $result )
                    ->header('Content-Type', 'application/json');

                break;

            case 'get_display_order':
                $display_order_max  = intval( Attribute::max('display_order'), 10);
                $display_order_new  = sprintf('%d', $display_order_max + 1);

                $result['display_order'] = $display_order_new;

                return response( $result )
                    ->header('Content-Type', 'text/html');

                break;

            case 'create':
                $name           = trim( $req->input('name') );
                $display_order  = intval( $req->input('display_order'), 10 );
                $type           = trim( $req->input('type') );
                $memo           = trim( $req->input('memo') );

                $result = array('code'=>-1, 'msg'=> Config::get('constants.E_FAILED') );

                $dup_count = Attribute::where('name', $name)->count();

                if( $dup_count > 0 ){
                    $result['code'] = 1;
                    $result['msg'] = Config::get('constants.E_DUPLICATED');
                } else {
                    $data = new Attribute;
                    $data->name             = $name;
                    $data->display_order    = $display_order;
                    $data->type             = $type;
                    $data->memo             = $memo;
                    $data->save();

                    $result['code'] = 0;
                    $result['msg'] = Config::get('constants.S_OK');
                }

                return response( $result )
                    ->header('Content-Type', 'text/html');

                break;

            case 'update':
                $id             = intval( $req->input('id'), 10);
                $name           = trim( $req->input('name') );
                $display_order  = intval( $req->input('display_order'), 10);
                $type           = trim( $req->input('type') );
                $memo           = trim( $req->input('memo') );

                $result = array('code'=>-1, 'msg'=> Config::get('constants.E_FAILED') );

                $dup_count = Attribute::where('name', $name)
                    ->where('id', '!=', $id)
                    ->count();

                if( $dup_count > 0 ){
                    $result['code'] = 1;
                    $result['msg'] = Config::get('constants.E_DUPLICATED');
                } else {
                    $data = Attribute::find( $id );
                    $data->name             = $name;
                    $data->display_order    = $display_order;
                    $data->type             = $type;
                    $data->memo             = $memo;
                    $data->save();

                    $result['code'] = 0;
                    $result['msg'] = Config::get('constants.S_OK');
                }

                return response( $result )
                    ->header('Content-Type', 'text/html');

                break;

            case 'delete':
                $result = array('code'=>-1, 'msg'=> Config::get('constants.E_FAILED') );

                $id = intval( $req->input('id'), 10);

                if( $id > 0 ){
                    $row = Attribute::find( $id );
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
