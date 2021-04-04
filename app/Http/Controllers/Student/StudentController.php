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

        $subjects = QueryBuilder::getStudentSubject($id);
        $info = QueryBuilder::getFirstStudentSubject($id);

        $preqArray['data'] = array();

        foreach($subjects['pre'] as $index => $data){
            $datapre = QueryBuilder::getFirst('subjects', 'id', $data->preReq_subject_code);
            array_push(
                $preqArray['data'],
                array(
                    'subject' => array(
                        'subject_title' => $data->subject_title,
                        'subject_subject_code' => $data->subject_subject_code,
                        'subject_total_units' => $data->subject_total_units,
                        'subject_lecture_units' => $data->subject_lecture_units,
                        'subject_lab_units' => $data->subject_lab_units
                    ),
                    'pre' => array(
                        'pre_subj_code' =>  $datapre === null ? 'none' : $datapre->subject_code
                    )
                )
            );
        }

        return view(
            'components.contents.input-grades',
            [
                'info'=> $info,
                'pre' => $preqArray,
                'student_number' => $student_number,
            ]
        );
    }
}
