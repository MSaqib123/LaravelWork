<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountControler extends Controller
{
    public function Login(){
        return View("account.login");
    }
}
