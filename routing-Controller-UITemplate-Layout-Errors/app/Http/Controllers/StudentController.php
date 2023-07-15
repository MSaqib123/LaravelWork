<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    //________ Index _________
    public function index()
    {
        $students = DB::table('students')->get();
        return view('/dashboard/student/index', compact('students'));
    }

    //________ Create _________
    public function create()
    {
        return view('/dashboard/student/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'gender' => 'required',
            'class' => 'required',
            'active' => 'required',
        ]);

        //___________ Bad way _________
        // $studentId = DB::table('students')->insertGetId([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'gender' => $request->input('gender'),
        //     'class' => $request->input('class'),
        //     'active' => $request->input('active'),
        // ]);
        
        $email = $request->input('email');

        if (DB::table('students')->where('email', $email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email already exists.'])->withInput();
        } else {
            $data = [
                'name' => $request->input('name'),
                'email' => $email,
                'gender' => $request->input('gender'),
                'class' => $request->input('class'),
                'active' => $request->input('active'),
            ];
    
            DB::table('students')->insert($data);
    
            return redirect()->route('students.index')->with('success', 'Student created successfully.');
        }
    }

    //________ Single Record _________
    public function show($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('students.show', compact('student'));
    }

    //________ Edit _________
    public function edit($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('dashboard.student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore($id),
            ],
            'gender' => 'required',
            'class' => 'required',
            'active' => 'required',
        ]);

        $affectedRows = DB::table('students')->where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'class' => $request->input('class'),
            'active' => $request->input('active'),
        ]);

        if ($affectedRows === 0) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    //________ delete _________
    public function destroy($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
    
}
