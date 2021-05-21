<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Main\Query\QueryBuilder;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        return view('components.contents.start');
    }

    public function inputCurriculum(){

        $data['curriculumCourses'] = QueryBuilder::getAllData('curriculum_courses', 'active');

        return view('components.contents.student-credentials', $data);
    }

    public function inputGrades(Request $request){

        $rules = [
            'studentNumberInfo' => ['required', 'string', 'max:255'],
            'student_firstname' => ['required', 'string', 'max:255'],
            'student_lastname' => ['required', 'string', 'max:255'],
            'curriculuminfo' => ['required', 'numeric']
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Error processinf your request');

        }else{

            unset($request['_token']);

            $subjects = QueryBuilder::getStudentSubject($request['curriculuminfo']);
            $info = QueryBuilder::getFirstStudentSubject($request['curriculuminfo']);

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

            $student_number = $request['studentNumberInfo'];
            $student_firstname = $request['student_firstname'];
            $student_middlename = $request['student_middlename'];
            $student_lastname = $request['student_lastname'];
            $curriculumId = $request['curriculuminfo'];

            $studentInquiry = QueryBuilder::createStudentInquiry($student_number, $student_firstname, $student_middlename, $student_lastname, $curriculumId);

            return view(
                'components.contents.input-grades',
                [
                    'info'=> $info,
                    'pre' => $preqArray,
                    'student_number' => $request['studentNumberInfo'],
                    'student_firstname' => $request['student_firstname'],
                    'student_middlename' => $request['student_middlename'],
                    'student_lastname' => $request['student_lastname'],
                    'studentNumber' => $studentInquiry->id
                ]
            );

        }

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

        $getVars = array_keys($_GET);

        if($getVars[0] === 'studentNumber'){

            $comply = array();
            $retake = array();
            $failed = array();
            $nextAvailableSubject = array();
            $preqArray = array();
            $next_subject_array_data['data'] = array();
            $increment = 0;
            $passed = 0;

            $studentInquiry = $_GET['studentNumber'];

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

                        //create
                        $student_inquiry_id = $studentInquiry;
                        $subject_title = $preqArray[$increment]['subject']['subject_title'];
                        $subject_prerequites_id = $preqArray[$increment]['pre']['subject_id'];
                        $status = "comply";

                        QueryBuilder::createStudentSubjectResultModel(
                            $student_inquiry_id,
                            $subject_title,
                            $subject_prerequites_id,
                            $status
                        );

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

                        //create
                        $student_inquiry_id = $studentInquiry;
                        $subject_title = $preqArray[$increment]['subject']['subject_title'];
                        $subject_prerequites_id = $preqArray[$increment]['pre']['subject_id'];
                        $status = "retake";

                        QueryBuilder::createStudentSubjectResultModel(
                            $student_inquiry_id,
                            $subject_title,
                            $subject_prerequites_id,
                            $status
                        );

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

                        //create
                        $student_inquiry_id = $studentInquiry;
                        $subject_title = $preqArray[$increment]['subject']['subject_title'];
                        $subject_prerequites_id = $preqArray[$increment]['pre']['subject_id'];
                        $status = "retake";

                        QueryBuilder::createStudentSubjectResultModel(
                            $student_inquiry_id,
                            $subject_title,
                            $subject_prerequites_id,
                            $status
                        );

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

                        //create
                        $student_inquiry_id = $studentInquiry;
                        $subject_title = $preqArray[$increment]['subject']['subject_title'];
                        $subject_prerequites_id = $preqArray[$increment]['pre']['subject_id'];
                        $status = "retake";

                        QueryBuilder::createStudentSubjectResultModel(
                            $student_inquiry_id,
                            $subject_title,
                            $subject_prerequites_id,
                            $status
                        );

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

                            //create
                            $student_inquiry_id = $studentInquiry;
                            $subject_title = $next_subject_array_data['data'][$i]['subject']['subject_title'];
                            $subject_prerequites_id = null;
                            $status = "next";

                            QueryBuilder::createStudentSubjectResultModel(
                                $student_inquiry_id,
                                $subject_title,
                                $subject_prerequites_id,
                                $status
                            );

                            array_splice($next_subject_array_data['data'], $i, 1);
                        }
                    }
                }else{
                    array_push($nextAvailableSubject, $next_subject_array_data['data'][$i]['subject']['subject_title']);

                    //create
                    $student_inquiry_id = $studentInquiry;
                    $subject_title = $next_subject_array_data['data'][$i]['subject']['subject_title'];
                    $subject_prerequites_id = null;
                    $status = "next";

                    $id = QueryBuilder::createStudentSubjectResultModel(
                        $student_inquiry_id,
                        $subject_title,
                        $subject_prerequites_id,
                        $status
                    );
                }
            }

            QueryBuilder::createPassedInfoModel($studentInquiry, $passed);

            $studentInfo = QueryBuilder::getFirstLink('student_inquiry_models', 'id', $studentInquiry);
            $info = QueryBuilder::getFirstStudentSubject($studentInfo->curriculumId);

            $data_output_subject['output'] = array(
                "comply" => $comply,
                "retake" => $retake,
                "passed" => $passed,
                "inquiryId" => $studentInquiry,
                "next_subject" => $next_subject_array_data,
                "student_number" => $studentInfo->student_number,
                "student_firstname" => $studentInfo->student_firstname,
                "student_middlename" => $studentInfo->student_middlename,
                "student_lastname" => $studentInfo->student_lastname,

                "course_title" => $info->course_title,
                "course_code" => $info->course_code,
                "course_curriculum_title" => $info->course_curriculum_title,
                "student_years_title" => $info->student_years_title,
                "semesters_title" => $info->semesters_title
            );

            return view('components.contents.final-output', $data_output_subject);

        }else{

            return redirect()->back();
        }
    }

    public function printdata(){

        $getVars = array_keys($_GET);


        if($getVars[0] === 'inquiryId'){

            $inquiryId = $_GET['inquiryId'];
            $data['next_subject'] = null;
            $data['comply'] = QueryBuilder::getInquiryDataGet('student_subject_result_models', 'status', 'comply', 'student_inquiry_id', $inquiryId);
            $data['retake'] = QueryBuilder::getInquiryDataGet('student_subject_result_models', 'status', 'retake', 'student_inquiry_id', $inquiryId);
            $data['next_subject'] = QueryBuilder::getInquiryDataGet('student_subject_result_models', 'status', 'next', 'student_inquiry_id', $inquiryId);

            $data['passed'] = QueryBuilder::getFirstLink('passed_info_models', 'student_inquiry_id', $inquiryId);

            $data['studentInfo'] = QueryBuilder::getFirstLink('student_inquiry_models', 'id', $inquiryId);

            $data['curriculum'] = QueryBuilder::getFirstStudentSubject( $data['studentInfo']->curriculumId);

            return view('components.contents.print', $data);

        }else{
            return redirect()->back();
        }
    }
}
