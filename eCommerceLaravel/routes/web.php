<?php

use App\Http\Controllers\AccountControler;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//____________________ frontend __________________
#region frontend routes
Route::get('/', [ClientController::class,"Index"]);
Route::get('/Account/Login', [AccountControler::class,"Login"])->name("loginAccount");
Route::Post('/Account/Login', [AccountControler::class,"LoginPost"]);

Route::get('/Product/Detail/{id}', [ProductController::class,"ProductDetail"]);

Route::get('/Product/search', [ProductController::class,"Search"]);
Route::post('/Product/AddToCart', [ProductController::class,"AddToCart"]);

Route::get('/Account/Logout',function(){
    Session::forget('user');
    return redirect('/');
});


Route::get('/Account/Register', [AccountControler::class,"Register"])->name("registorAccount");
Route::Post('/Account/Register', [AccountControler::class,"RegisterPost"]);

Route::get('/Product/CartList', [ProductController::class,"CartList"]);
Route::get('/Product/Remove/{id}', [ProductController::class,"RemoveCart"]);

Route::get('/Product/UpdateQuantity/{id}', [ProductController::class,"UpdateQuantity"]);

Route::get('/Product/Order', [ProductController::class,"Order"]);
#endregion 

//____________________ dashboard __________________
#region dashbaord routes
Route::get('Dashboard/Index', [DashboardController::class,"Index"]);

#endregion