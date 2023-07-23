<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Session;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class ProductController extends Controller
{
    //_____ all product __
    public function Products()
    {
        return Product::all();
    }

    //_____ product Detail __
    public function ProductDetail($id)
    {
        $data = Product::find($id);
        return View("client.Product.Product", ["ProductDetail" => $data]);
    }

    //_____ Search Product __
    public function Search(Request $req)
    {
        // return $req->input();
        $data =  Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return View("client.Product.Search", ['Product' => $data]);
    }

    //_____ Add to cart __
    public function AddToCart(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart = new cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect("/");
        } else {
            return Redirect("/Account/Login");
        }
    }

    //_____ count Cart __
    static public function cartItem()
    {
        if (Session::has('user')) {
            $userId = Session::get('user')['id'];
            // return cart::where('user_id',$userId)->count();
            $cartItems = cart::where('user_id', $userId)->get();

            $totalItems = 0;
            foreach ($cartItems as $cartItem) {
                $totalItems += $cartItem->quantity;
            }
            return $totalItems;
        } else {
            return View();
        }
    }


    // public function CartList(Request $req){
    //     if($req->session()->has('user')){
    //         $userId = $req->session()->get('user')['id'];
    //         $products = DB::table('cart')
    //             ->join('products','cart.product_id','=','products.id')
    //             ->where('cart.user_id',$userId)
    //             ->select('products.*','cart.id as cart_id','cart.quantity')
    //             ->get();
    //         return View("client.Product.CartList",['CartList'=>$products]);
    //     }
    //     else{
    //         return Redirect("/Account/Login");
    //     }        
    // }
    public function CartList(Request $req)
    {
        if ($req->session()->has('user')) {
            $userId = $req->session()->get('user')['id'];
            $cartItems = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)
                ->select('products.*', 'cart.id as cart_id', 'cart.quantity')
                ->paginate(3); // Set the number of cart items per page

            // Check if there are only 3 carts, if so, hide pagination
            $hidePagination = $cartItems->lastPage() <= 1;

            return View("client.Product.CartList", [
                'CartList' => $cartItems,
                'hidePagination' => $hidePagination,
            ]);
        } else {
            return Redirect("/Account/Login");
        }
    }

    public function RemoveCart($id)
    {
        cart::destroy($id);
        return redirect('/Product/CartList');
    }

    public function UpdateQuantity(Request $req, $id)
    {
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

    //__________ Order ____________
    public function Order(Request $req)
    {
        // _______ 1.Check if the user is logged in _________
        if (!$req->session()->has('user')) {
            // Redirect the user to the login page if not logged in
            return redirect('/Account/Login');
        }

        // _______ Get the user ID from the session
        $userId = $req->session()->get('user')['id'];

        // _______ Retrieve the cart items for the user with the product details using a join
        $cartItems = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('cart.*', 'products.price as product_price')
            ->get();
        // _______ Calculate the total value and total amount before discount
        $totalValue = 0;
        $totalItems = 0;
        foreach ($cartItems as $cartItem) {
            // Total items based on quantity
            $totalItems += $cartItem->quantity;

            // Total value based on quantity and product price
            $totalValue += $cartItem->product_price * $cartItem->quantity;
        }

        //_____ get Payment Method  ___
        $payment_method = DB::table('payment_method')->get();

        //_____ get Payment Method  ___
        $delevery_type = DB::table('delevery_type')->get();

        // Create an object to hold the total items and total value
        $dto = (object) [
            'totalItems' => $totalItems,
            'totalValue' => $totalValue,
            'paymentMethod' => $payment_method,
            'delevery_type' => $delevery_type
        ];

        // Pass the object to the view
        return view('client.Product.order', ['proDto' => $dto]);
    }

    //__________ CheckOut ____________

}
