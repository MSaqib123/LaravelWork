<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function Products(){
        return Product::all();
    }

    public function ProductDetail($id){
        $data= Product::find($id);
        return View("client.Product.Product",["ProductDetail"=>$data]);
    }
}
