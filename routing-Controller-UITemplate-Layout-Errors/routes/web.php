<?php

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
Route::get('/', function () {
    return view('welcome');
});

//__________________ 1. Simple View  ______________________
Route::get('/class1/_1_SimpleView',function(){
    return view('Class_1_RouteWebFile_Works._1_File');
});


//__________________ 2. Passing Data  ______________________
Route::get('/class1/_2_PassingData',function(){
    //________ 1. Key Pair Form (Asso_Array) ___________
    $a = 10;
    $b = 10;
    $sum = $a+$b;
    // return view(
    //     'Class_1_RouteWebFile_Works._2_PassingValueToView_inWebFile',
    //     ['sum'=>$sum,'name'=>'Saqib','email'=>'m43577535@gmail.com' , 'age' => 25],
    //     compact('sum')
    // );
    
    //_________ 2. By Compact __________
    //without key
    return view(
        'Class_1_RouteWebFile_Works._2_PassingValueToView_inWebFile',
        ['sum'=>$sum,'name'=>'Saqib','email'=>'m43577535@gmail.com' , 'age' => 25],
        compact('a')
    );

    //_________ 3. With __________
    // return view(
    //     'Class_1_RouteWebFile_Works._2_PassingValueToView_inWebFile',
    // )->with('xyz',$sum);

});


Route::get('/class1/_3_parametrize/{id}/{name}',function($id,$name){
    return View(
        "Class_1_RouteWebFile_Works._3_parameterizeValues",
        compact('id','name')
    );
});