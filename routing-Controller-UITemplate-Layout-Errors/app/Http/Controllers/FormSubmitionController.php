<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


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
        //________________________ 1. Validation _____________________
        $req->validate([
            'userName' => 'required|max:20|min:3',
            'fatherName' => 'required',
            'email' => 'required|max:20|min:3|email',
            'age' => 'required',
           // 'Gender' => 'required',
            'country' => 'required',
            'Subject' => 'required',
            'password' => 'required|min:8',
            'conPassword' => 'required|same:password',
        ], [
            'userName.required' => 'The user name field is required.',
            'userName.max' => 'The user name may not be greater than :max characters.',
            'userName.min' => 'The user name must be at least :min characters.',

            'fatherName.required' => 'The father name field is required.',

            'email.required' => 'The email field is required.',
            'email.max' => 'The email may not be greater than :max characters.',
            'email.min' => 'The email must be at least :min characters.',
            'email.email' => 'Please enter a valid email address.',

            'age.required' => 'The age field is required.',

            //'Gender.required' => 'The gender field is required.',

            'country.required' => 'The country field is required.',

            'Subject.required' => 'The subject field is required.',

            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters.',

            'conPassword.required' => 'The confirm password field is required.',
            'conPassword.same' => 'The confirm password and password must match.',
        ]);        

        //________________________ 2. Shwoing for  Understanding ________________
        echo $req->UserName . "<br>";
        echo $req->fatherName . "<br>";
        echo $req->age . "<br>";
        echo $req->email. "<br>";
        echo $req->Gender . "<br>";
        echo $req->country . "<br>";
        print_r($req->Subject)  . "<br>";

        //_________ basice password _________
        // echo $req->password . "<br>";
        // echo $req->conPassword . "<br>";

        //_________ md5 password _________
        echo md5($req->password) . "<br>";
        echo md5($req->conPassword) . "<br><br>";
        //we can not get real password

        //_________ encr, dec password _________
        $encryptString = Crypt::encryptString($req->password);
        echo "EncryptString : " . $encryptString ."<br>";

        $deCryptString = Crypt::decryptString($encryptString);
        echo "DeCryptString : " . $deCryptString ."<br>";


        //_________ has password _________
        //For secure password hashing in Laravel, it is recommended to use the built-in Hash facade 
        $hashedPassword = Hash::make($req->password);
        echo "Has Password " . $hashedPassword . "</br>";
        
        //==== to check  has with database ====
        // $user = User::where('email', $req->email)->first(); // Assuming 'User' is your user model
        // if ($user && Hash::check($req->password, $user->password)) {
        //     // Passwords match, proceed with authentication
        // } else {
        //     // Invalid credentials
        // }

        //_________________________ Image Uploading ________________
        echo $req->img . "<br>";

        //________________________ 3. After Clearing all Concepts //________________________ 
        // return View("dashboard.formSubmit.postData");
    }
}
