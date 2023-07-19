<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountControler extends Controller
{
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
}
