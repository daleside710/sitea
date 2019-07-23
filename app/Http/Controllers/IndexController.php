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
        $this->middleware('auth');
    }

    public function index(){
        $attributes     = Attribute::orderBy('display_order', 'asc')->get();
        return view('pages.index', [ 'attributes' => $attributes ]);
    }

    public function ajax(Request $req, $type)
    {

        switch ($type) {



            default:
                break;
        }
    }
}
