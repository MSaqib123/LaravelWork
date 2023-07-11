<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

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
        try{
            $req->validate([
                'Name' => 'required | max:25',
                'Grade' => 'required | max:25',
                'Gender' => 'required',
                'Email' => ['required', 'max:25', Rule::unique('teachers', 'email')],
                'Status' => 'required',
            ]);
            
            //____ Upload Image ____
            if($req->img){
                $img= $req->img;
                $imgName = $img->getClientOriginalName();
                $imgName = time()."_".$imgName;
                $img->move("images/Teachers/",$imgName);
            }
            
            //____ add to object ____
            $teacher = new Teacher;
            $teacher->name = $req->Name;
            $teacher->grade = $req->Grade;
            $teacher->gender = $req->Gender;
            $teacher->email = $req->Email;
            $teacher->img = "images/Teachers/" . $imgName;
            $teacher->status = $req->Status;
    
    
            //____ Save _____
            $teacher->Save();

            //____ Set success message in session ____
            if ($teacher->wasRecentlyCreated) {
                Session::flash('success', 'Added successfully.');
            }
    
            return Redirect("/Teachers/Get");   
        } catch (\Exception $e) {
            // Handle the exception
            return $e->getMessage(); // You can customize the error handling as per your requirement
        }
    }

    //__________ 3. Edit _____________

    public function Edit($id){
        $t = Teacher::find($id);
        return View("Dashboard.Teachers.EditTeacher",compact('t'));
    }
    public function EditPost(Request $req,$id){
        try{
            $teacher = Teacher::find($id);

            $req->validate([
                'Name' => 'required | max:25',
                'Grade' => 'required | max:25',
                'Gender' => 'required',
                Rule::unique('teachers', 'email')->ignore($id),
                'Status' => 'required',
            ]);
            
            //____ Upload Image ____
            $imgName = $req->oldImg;
            if($req->img){
                $img= $req->img;
                $imgName = $img->getClientOriginalName();
                $imgName = time()."_".$imgName;
                $img->move("images/Teachers/",$imgName);
                $imgName = "images/Teachers/$imgName";
            }
    
            //____ add to object ____
            $teacher->name = $req->Name;
            $teacher->grade = $req->Grade;
            $teacher->gender = $req->Gender;
            $teacher->email = $req->Email;
            $teacher->img = $imgName;
            $teacher->status = $req->Status;
    
            //____ Update _____
            $teacher->update();
    
            //____ Set success message in session ____
            if ($teacher->wasChanged()) {
                Session::flash('success', 'Updated successfully.');
            }
            return Redirect("/Teachers/Get");   
        }
        catch (\Exception $e) {
            // Handle the exception
            return $e->getMessage(); // You can customize the error handling as per your requirement
        }
    }


    public function delete($id){
        $t = Teacher::find($id);
        
        if($t){
            // Unlink($t->img);
            $t->delete();
        }
        //____ Set success message in session ____
        Session::flash('success', 'Deleted successfully.');
        return Redirect("/Teachers/Get");   
    }
}
