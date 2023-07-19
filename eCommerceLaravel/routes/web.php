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

Route::get('/', [ClientController::class,"Index"]);
Route::get('Dashboard/Index', [DashboardController::class,"Index"]);

Route::get('/Account/Login', [AccountControler::class,"Login"]);
