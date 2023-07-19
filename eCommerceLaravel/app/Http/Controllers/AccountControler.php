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
        if($user && Hash::check($req->password , $user->password)){
            return Redirect("/");
        }
        else{
            $match = "UserNot Match";
            return View("login",compact('user'));
        }
    }
}
