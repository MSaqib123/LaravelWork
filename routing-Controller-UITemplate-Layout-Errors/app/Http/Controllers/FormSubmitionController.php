<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FormSubmitionController extends Controller
{
    //______________________ 1. Get  _______________________
    public function FormGet(Request $req){
        // if(isset($req->fatherName)){
        if($req->fatherName){
            print_r($req->toArray());
            echo $req['fatherName'];
            echo "userName is : " . $req->userName;
        }
        return View("dashboard.formSubmit.get");
    }

    //______________________ 2. Post  _______________________
    public function FormPost(){
        return view("dashboard.formSubmit.formPost");
    }
    public function Postt(Request $req){
        // // if(isset($req->fatherName)){
        // if($req->fatherName){
        //     print_r($req->toArray());
        //     echo $req['fatherName'];
        //     echo "userName is : " . $req->userName;
        // }
    
        //__________ 1. on New Page _____________
        // return View("dashboard.formSubmit.postData",['fName'=>$req->fatherName , 'userName'=>$req->userName, 'age'=>$req->age]);

        //__________ 2. on the Same page Where Request Comes _____________
        return View("dashboard.formSubmit.formPost",['fName'=>$req->fatherName , 'userName'=>$req->userName, 'age'=>$req->age]);
    }

    //______________________ 3. Form All Controlelr  _______________________
    public function FormAllControlles(){
        return view("dashboard.formSubmit.FormAllControlles");
    }
    
    public function FormAllControllesPost(Request $req){
        $req->validate([
            'userName'=>'required',
            'fName'=> 'required',
            
        ]);
        return View("dashboard.formSubmit.postData");
    }
}
