<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    //__________ 1. Get All ____________
    public function Index(){
        $student = Teacher::All();
        return View("Dashboard.Teachers.GetTeacher",compact('student'));
    }

    //__________ 2. Insert _____________
    public function Create(){
        return View("Dashboard.Teachers.InsertTeacher");
    }
    public function CreatePost(Request $req){
        $req->validate([
            'Name' => 'required | max:25',
            'Grade' => 'required | max:25',
            'Gender' => 'required',
            'Email' => 'required | max:25',
            'Status' => 'required',
        ]);
        
        //____ Upload Image ____
        $img= $req->img;
        $imgName = $img->getClientOriginalName();
        $imgName = time()."_".$imgName;
        $img->move("images/Teachers/",$imgName);

        //____ add to object ____
        $teacher = new Teacher;
        $teacher->name = $req->Name;
        $teacher->grade = $req->Grade;
        $teacher->gender = $req->Gender;
        $teacher->email = $req->Email;
        $teacher->img = "/images/Teachers/$imgName";
        $teacher->status = $req->Status;

        //____ Save _____
        $teacher->Save();

        return Redirect("/Teachers/Get");   
    }
}
