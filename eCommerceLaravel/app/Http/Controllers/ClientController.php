<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function Index(){
        $product = Product::all();
        return view( "client.index",["product"=>$product]);
    }
}
