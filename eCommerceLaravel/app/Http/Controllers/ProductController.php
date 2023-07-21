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

    public function Search(Request $req){
        // return $req->input();
        $data =  Product::where('name','like','%'.$req->input('query').'%')->get();
        return View("client.Product.Search",['Product'=>$data]);
    }
}
