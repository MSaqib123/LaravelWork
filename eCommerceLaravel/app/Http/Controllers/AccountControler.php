<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountControler extends Controller
{
    //_________________ 1. Login __________________
    public function Login(){
        return View("account.login");
    }

    public function LoginPost(Request $req){
        $user= User::Where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password , $user->password)){
            $match = "UserNot Match";
            return View("login",compact('user'));
        }
        //___ 1. Add session  ____
        $req->session()->put('user',$user);

        //___ 2. Add Midlware  ____
        //php artisan make:middleware UserAuth
        //registor this middlware in  kernel.php
        //add  session  as well as in  kernal.php

        return Redirect("/");
    }
    
    //_________________ 2. Register __________________
    public function Register(){
        return View("account.register");
    }

    public function RegisterPost(Request $req){
        // 'email' => [
        //     'required',
        //     'email',
        //     Rule::unique('students')->ignore($id),
        // ],
        $req->validate([
            'name' => 'required|max:20|min:3',
            'email' => 'required|email|unique:users', //User Model
            'password' => 'required|min:8',
            'conPassword' => 'required|same:password',
        ], [
            'name' => 'The user name field is required.',
            'email.required' => 'The email field is required.',
            'email.max' => 'The email may not be greater than :max characters.',
            'email.min' => 'The email must be at least :min characters.',
            'email.email' => 'Please enter a valid email address.',

            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters.',

            'conPassword.required' => 'The confirm password field is required.',
            'conPassword.same' => 'The confirm password and password must match.',
        ]);   

        //_________ hash password _________
        $hashedPassword = Hash::make($req->password);
        
        //_________ Adding Account _________
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $hashedPassword;
        $user->Save();

        //_________ checking Account _________
        $user= User::Where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password , $user->password)){
            $match = "UserNot Match";
            return View("login",compact('user'));
        }        
        
        $req->session()->put('user',$user);
        return Redirect("/");
    }


}
