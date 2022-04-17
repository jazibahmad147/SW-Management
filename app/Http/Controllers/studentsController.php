<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class studentsController extends Controller
{
    function studentRegister(Request $req){
        $valid['success'] = array('success' => false, 'messages' => array());

        $req->validate([
            'date'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'course'=>'required',
            'fee'=>'required',
        ]);
        
        
        $student = new Student;
        $student->date = $req->date;
        $student->name = $req->name;
        $student->email = $req->email;
        $student->phone = $req->phone;
        $student->address = $req->address;
        $student->course = $req->course;
        $student->fee = $req->fee;
        $student->save();
        
        $valid['success'] = true;
        $valid['messages'] = "Your record added successfully!";
        $valid['class'] = "success";
        $valid['title'] = "Congratulations";
    
        return response()->json($valid);

    }

    function viewStudentData($id){
        $record = array();
        $students = Student::all();
        $data = Student::find($id);
        $record = $data;
        return response()->json($record);
    }

    function studentsList(){
        $students = Student::all()->sortByDesc("id");
        return view('students',['students'=>$students]);
    }

    function studentUpdate(Request $req){
        $valid['success'] = array('success' => false, 'messages' => array());

        $req->validate([
            'date'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'course'=>'required',
            'fee'=>'required',
        ]);

        $student = Student::find($req->id);
        $student->date = $req->date;
        $student->name = $req->name;
        $student->email = $req->email;
        $student->phone = $req->phone;
        $student->address = $req->address;
        $student->course = $req->course;
        $student->fee = $req->fee;
        $student->save();

        $valid['success'] = true;
        $valid['messages'] = "Your record updated successfully!";
        $valid['class'] = "success";
        $valid['title'] = "Congratulations";

        return response()->json($valid);
    }

    function deleteStudent($id){
        $valid['success'] = array('success' => false, 'messages' => array());

        $student = Student::all();
        $data = Student::find($id);
        $msg = 'del';
        $data->delete();
        
        $valid['success'] = true;
        $valid['messages'] = "Your record deleted successfully!";
        $valid['class'] = "success";
        $valid['title'] = "Congratulations";

        return response()->json($valid);
    }

}
