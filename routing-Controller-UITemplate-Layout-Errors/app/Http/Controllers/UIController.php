<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIController extends Controller
{
    public function Button(){
        return View("dashboard.ui.button");
    }

    public function Dropdown(){
        return View("dashboard.ui.dropdown");
    }

    public function Typogrphi(){
        return View("dashboard.ui.Typogrphi");
    }
}
