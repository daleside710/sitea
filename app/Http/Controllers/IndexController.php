<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Attribute;
use App\Model\Product;
use App\Model\ProductDetail;

use Config;

class IndexController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $attributes     = Attribute::orderBy('display_order', 'asc')->get();

        $products       = Product::get();
        for( $i = 0; $i < count( $products); $i ++ ){
            for( $j = 0; $j < count( $attributes ); $j ++ ){
                $product_detail = ProductDetail::where('product_id', $products[$i]->id)->where('attribute_id', $attributes[$j]->id)->first();
                $products[$i][ $attributes[$j]->name ] = $product_detail->val;
            }
        }

        return view('pages.index', [ 'attributes' => $attributes, 'products' => $products ]);
    }

    public function ajax(Request $req, $type)
    {

        switch ($type) {



            default:
                break;
        }
    }
}
