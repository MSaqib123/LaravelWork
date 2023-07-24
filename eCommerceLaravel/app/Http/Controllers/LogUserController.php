<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogUserController extends Controller
{
    public function Index(){
        return View('client.LogUsers.Index');
    }
    public function Profile(){
        return View('');
    }
}
