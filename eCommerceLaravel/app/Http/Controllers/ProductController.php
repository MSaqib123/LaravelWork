<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\checkout;
use App\Models\delivery;
use App\Models\order_details;
use App\Models\orders;
use App\Models\payment;
use App\Models\Product;
use DateTime;
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

        // _______ if no Cart then don't show this page ____
        if(cart::where('user_id',$userId)->count() == 0){
            return redirect("/");
        }

        // _______ if no Cart then don't show this page ____
        if(cart::where('user_id',$userId)->count() == 0){
            return redirect("/");
        }

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

        //_____ get Payment Method ___
        $payment_method = DB::table('payment_method')->get();

        //_____ get Payment Method ___
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
    public function OrderCheckout(Request $req)
    {
        // _______ 1.Check if the user is logged in _________
        if (!$req->session()->has('user')) {
            return redirect('/Account/Login');
        }

        // _______ Get the user ID from the session
        $userId = $req->session()->get('user')['id'];

        // _______ if no Cart then don't show this page ____
        if(cart::where('user_id',$userId)->count() == 0){
            return redirect("/");
        }

        // _______ Retrieve the cart items for the user with the product details using a join
        $cartItems = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('cart.*', 'products.price as product_price')
            ->get();

        
        //___________________ 1. Insert Order Table _______________
        $orders = new orders;
        $orders->user_id = $userId;
        $orders->status = 0;
        $orders->save();


        //___________________ 2. Insert Product_Details Table () _______________
        foreach ($cartItems as $item) {
            $order_detail = new order_details;
            $order_detail->order_id = $orders->id;
            $order_detail->product_id = $item->product_id;
            $order_detail->quantity = $item->quantity;
            $order_detail->price = $item->quantity*$item->product_price;
            $order_detail->status = 2;
            $order_detail->save();
        }
        //removeing all products form cart
        foreach ($cartItems as $item) {
            $cart = new cart;
            $cart->destroy($item->id);
        }

        //___________________ 3. Insert Payment Table _______________
        $payment = new payment;
        $payment->order_id = $orders->id;
        $payment->payment_method_id = $req->payment;
        $payment->amount = $req->totalBill;
        // $payment->payment_date = ;
        $payment->paymentStatus	 = 2;
        
        $payment->save();

        //___________________ 4. Insert Delivery Table _______________
        $delvery = new delivery;
        $delvery->order_id = $orders->id;
        $delvery->delivery_type_id = $req->delivery;
        $delvery->deliveryAddress = $req->deliveryAddress;
        $delvery->deliveryStatus =  2;
        // $delvery->deliveryDate= date("");

        $delvery->save();

        //___________________ 5. Insert checkOut Delivery Table _______________
        $check = new checkout;
        $check->name = $req->name;
        $check->email = $req->email;
        $check->address = $req->address;
        $check->phone = $req->phone;
        $check->mobile = $req->mobile;
        $check->order_id = $orders->id;
        $check->user_id = $userId;
        $check->payment_id = $payment->id;
        $check->delivery_id = $delvery->id;
        $check->status = 2;

        $check->save();


        return redirect('/');
    }
    
}
