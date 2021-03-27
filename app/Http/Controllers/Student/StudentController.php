<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // public function index(){
    //     return view('components.contents.student-credentials');
    // }

    public function index(){
        return view('components.contents.start');
    }

    public function inputCurriculum(){
        return view('components.contents.student-credentials');
    }

    public function inputGrades(){
        return view('components.contents.input-grades');
    }
}
