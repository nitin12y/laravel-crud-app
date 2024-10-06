<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; // Corrected namespace

class StudentController extends Controller
{
    public function create(){
        return view('Students.create');
    }
    
    public function store(Request $request){        
        $student = new Student();
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->mobilenumber = $request->mobilenumber;
        $student->age = $request->age;
        
        $student->save(); 
        return redirect('/students');
    }

    public function index(){
        $students = Student::all(); // All student records fetch karna
        return view('Students.index', compact('students')); // Students ko view mein pass karna
    }
    // Method to show the edit form
    public function edit($id){
        $student = Student::findOrFail($id); // Fetch the student by ID
        return view('Students.edit', compact('student')); // Pass student data to the view
    }

    // Method to update student information
    public function update(Request $request, $id){
        $student = Student::findOrFail($id); // Fetch the student by ID
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->mobilenumber = $request->mobilenumber;
        $student->age = $request->age;

        $student->save();
        return redirect('/students'); // Redirect to the index after updating
    }

    // Method to delete a student
    public function destroy($id){
        $student = Student::findOrFail($id); // Fetch the student by ID
        $student->delete(); // Delete the student record
        return redirect('/students'); // Redirect to the index after deleting
    }
}