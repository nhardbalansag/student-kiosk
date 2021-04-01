<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Main\Query\QueryBuilder;
use DB;

class StudentController extends Controller
{
    public function index(){
        return view('components.contents.start');
    }

    public function inputCurriculum(){

        $data['curriculumCourses'] = QueryBuilder::getAllData('curriculum_courses', 'active');

        return view('components.contents.student-credentials', $data);
    }

    public function inputGrades($id, $student_number){

        $data['subjects'] = QueryBuilder::getStudentSubject($id);
        $data['info'] = QueryBuilder::getFirstStudentSubject($id);
        $data['student_number'] = $student_number;

        return view('components.contents.input-grades', $data);
    }
}
