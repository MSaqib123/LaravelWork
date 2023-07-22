<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Session;

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

    public function AddToCart(Request $req){
       if($req->session()->has('user')){
        $cart = new cart;
        $cart->user_id = $req->session()->get('user')['id'];
        $cart->product_id = $req->product_id;
        $cart->save();
        return redirect("/");
       }
       else{
        return Redirect("/Account/Login");
       }        
    }

    static public function cartItem(){
        $userId = Session::get('user')['id'];
        return cart::where('user_id',$userId)->count();
     }


}
