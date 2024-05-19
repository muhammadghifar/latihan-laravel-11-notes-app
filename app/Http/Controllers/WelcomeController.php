<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        // 3 cara mengambil data
        // 1. Menggunakan raw query
        // $students = DB::select('select * from students');

        // 2. Menggunakan query builder
        // $students = DB::table('students')->get();
        // $students = DB::table('students')->select()->orderBy('name')->get();

        // 3. Menggunakan Eloquent ORM
        $students = Student::all();
        $students = Student::select(['name', 'email'])->orderBy('name')->get();

        dd($students);
        // return view('welcome');
        // foreach ($students as $student) {
        //     echo $student->name . '<br>';
        // }


        // Menambah data menggunakan eloquent ORM
        // $student = new Student();
        // $student->name = 'new student';
        // $student->email = 'newstuudent@user.com';
        // $student->save();
    }
}
