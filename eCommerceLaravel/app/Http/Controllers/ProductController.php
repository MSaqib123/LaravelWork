<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //_____ all product __
    public function Products(){
        return Product::all();
    }

    //_____ product Detail __
    public function ProductDetail($id){
        $data= Product::find($id);
        return View("client.Product.Product",["ProductDetail"=>$data]);
    }

    //_____ Search Product __
    public function Search(Request $req){
        // return $req->input();
        $data =  Product::where('name','like','%'.$req->input('query').'%')->get();
        return View("client.Product.Search",['Product'=>$data]);
    }

    //_____ Add to cart __
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

    //_____ count Cart __
    static public function cartItem(){
        $userId = Session::get('user')['id'];
        // return cart::where('user_id',$userId)->count();
        $cartItems = cart::where('user_id', $userId)->get();
    
        $totalItems = 0;
        foreach ($cartItems as $cartItem) {
            $totalItems += $cartItem->quantity;
        }
        return $totalItems;
     }
    

    public function CartList(Request $req){
        if($req->session()->has('user')){
            $userId = $req->session()->get('user')['id'];
            $products = DB::table('cart')
                ->join('products','cart.product_id','=','products.id')
                ->where('cart.user_id',$userId)
                ->select('products.*','cart.id as cart_id','cart.quantity')
                ->get();
            return View("client.Product.CartList",['CartList'=>$products]);
        }
        else{
            return Redirect("/Account/Login");
        }        
    }

    public function RemoveCart($id){
        cart::destroy($id);
        return redirect('/Product/CartList');
    }

    public function UpdateQuantity(Request $req, $id) {
        $cartItem = Cart::find($id);
    
        if ($cartItem) {
            $quantityChange = $req->input('quantity_change');
            if ($quantityChange) {
                $newQuantity = $cartItem->quantity + $quantityChange;
                
                if ($newQuantity > 0) {
                    $cartItem->quantity = $newQuantity;
                    $cartItem->save();
                } else {
                    // If the new quantity is zero or negative, remove the item from the cart
                    $cartItem->delete();
                }
            }
        }
        return redirect('/Product/CartList');
    }

}
