<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
// use DataTables;
class TabledataController extends Controller
{
     function index1()
    {
     return view('Tabledata');

    }
    function index()
    {
         $stu=Student::all();
         
         return $stu;
    }
    function get(Request $request)
    {
     // $students = Student::select('firstname', 'lastname');
     // return Datatables::of($students)->make(true);
     // $students=Student::all();
    // return response ($students);


     $students=Student::select('*')
     ->where('firstname','like','%'.$request['name'].'%')
     ->get();
     return $students;
    }
    function edit(Request $request)
    {
     // print_r($id);exit();
  $id=$request['id'];
          // print_r($id);exit();

     $student=Student::find($id);

     return $student;
    }
}
