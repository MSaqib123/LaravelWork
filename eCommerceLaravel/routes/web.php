<?php

use App\Http\Controllers\AccountControler;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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
Route::get('/Account/Login', [AccountControler::class,"Login"]);
Route::Post('/Account/Login', [AccountControler::class,"LoginPost"]);
#endregion 

//____________________ dashboard __________________
#region dashbaord routes
Route::get('Dashboard/Index', [DashboardController::class,"Index"]);

#endregion