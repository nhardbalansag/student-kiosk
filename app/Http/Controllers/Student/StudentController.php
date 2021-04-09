<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Main\Query\QueryBuilder;

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
                        'curriculum_subjects_id' => $data->curriculum_subjects_id,
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

    public function subjectOutput($id){

        if($data['course_current_id'] = QueryBuilder::getFirstLink('link_course_programs', 'curiculum_courses_id_current', $id)){
            $subjects = QueryBuilder::getStudentSubject($data['course_current_id']->curiculum_courses_id_next);

            $preqArray['data'] = array();

            foreach($subjects['pre'] as $index => $data){
                array_push(
                    $preqArray['data'],
                    array(
                        'subject' => array(
                            'subject_title' => $data->subject_title
                        )
                    )
                );
            }
        }else{
            return redirect()->back();
        }

        return view('components.contents.final-output', ["data_ouput" => $preqArray]);
    }

    public function submit_grade_input(Request $request){

        $comply = array();
        $retake = array();
        $failed = array();
        $nextAvailableSubject = array();
        $preqArray = array();
        $next_subject_array_data['data'] = array();
        $increment = 0;
        $passed = 0;

        $curriculum_course_id = $request['curriculum_course_id'];
        $data['course_current_id'] = QueryBuilder::getFirstLink('link_course_programs', 'curiculum_courses_id_current', $curriculum_course_id);

        if($data['course_current_id']){
            $subjects = QueryBuilder::getStudentSubject($data['course_current_id']->curiculum_courses_id_next);

            foreach($subjects['pre'] as $index => $data){
                array_push(
                    $next_subject_array_data['data'],
                    array(
                        'subject' => array(
                            'subject_title' => $data->subject_title,
                            'pre_subj' => $data->preReq_subject_id
                        )
                    )
                );
            }
        }

        unset($request['_token']);
        unset($request['curriculum_course_id']);

        $subjects = QueryBuilder::getStudentSubject($curriculum_course_id);

        foreach($subjects['pre'] as $index => $data){
            $datapre = QueryBuilder::getFirst('subjects', 'id', $data->preReq_subject_code);
            array_push(
                $preqArray,
                array(
                    'subject' => array(
                        'subject_title' => $data->subject_title
                    ),
                    'pre' => array(
                        'subject_id' => $data->subject_id
                    )
                )
            );
        }

        foreach ($request->all() as $key => $value) {
            switch ($value) {
                case 'inc':
                    array_push(
                        $comply,
                        array(
                            "subject" => array(
                                'subject_title' => $preqArray[$increment]['subject']['subject_title']
                            )
                        )
                    );
                    array_push($failed, $preqArray[$increment]['pre']['subject_id']);
                break;
                case 'hna':
                    array_push(
                        $retake,
                        array(
                            "subject" => array(
                                'subject_title' => $preqArray[$increment]['subject']['subject_title']
                            )
                        )
                    );
                    array_push($failed, $preqArray[$increment]['pre']['subject_id']);
                break;
                case 'w':
                    array_push(
                        $retake,
                        array(
                            "subject" => array(
                                'subject_title' => $preqArray[$increment]['subject']['subject_title']
                            )
                        )
                    );
                    array_push($failed, $preqArray[$increment]['pre']['subject_id']);
                break;
                case '5':
                    array_push(
                        $retake,
                        array(
                            "subject" => array(
                                'subject_title' => $preqArray[$increment]['subject']['subject_title']
                            )
                        )
                    );
                    array_push($failed, $preqArray[$increment]['pre']['subject_id']);
                break;
                default:
                    $passed++;
                break;
            }

            $increment++;
        }

        for ($i = 0; $i < count($next_subject_array_data['data']); $i++) {
            if(count($failed) > 0){
                for ($j = 0; $j  < count($failed); $j ++) {
                    if($next_subject_array_data['data'][$i]['subject']['pre_subj'] === $failed[$j]){
                        array_push($nextAvailableSubject, $next_subject_array_data['data'][$i]['subject']['subject_title']);
                        array_splice($next_subject_array_data['data'], $i, 1);
                    }
                }
            }else{
                array_push($nextAvailableSubject, $next_subject_array_data['data'][$i]['subject']['subject_title']);
                break;
            }
        }

        $data_output_subject['output'] = array(
            "comply" => $comply,
            "retake" => $retake,
            "passed" => $passed,
            "next_subject" => $next_subject_array_data
        );

        return view('components.contents.final-output', $data_output_subject);

    }

}
