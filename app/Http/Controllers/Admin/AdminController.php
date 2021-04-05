<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Main\Query\QueryBuilder;
use Illuminate\Support\Facades\Validator;
use DB;

class AdminController extends Controller
{
    public function view_add_curriculum(){
        return view('components.contents.add-curriculum');
    }

    public function submit_curriculum(Request $request){

         $rules = [
			'year_start_curiculum' => ['required', 'date'],
            'year_end_curiculum' => ['required', 'date'],
            'tittle' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
		];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

			return redirect()->back()->with('error', 'Error adding data');

		}else{

            unset($request['_token']);

            if(!QueryBuilder::createCurriculum($request)){
                return redirect()->back()->with('message', 'Data successfully added');
            }else{
                return redirect()->back()->with('error', 'Error adding data');
            }
        }
    }

    public function view_add_year_level_curriculum(){
        return view('components.contents.add-year-level');
    }

    public function submit_year_level(Request $request){

        $rules = [
           'year_title' => ['required', 'string', 'max:255'],
           'description' => ['required', 'string', 'max:255'],
           'status' => ['required', 'string', 'max:255']
       ];

       $validator = Validator::make($request->all(),$rules);

       if ($validator->fails()) {

           return redirect()->back()->with('error', 'Error adding data');

       }else{

           unset($request['_token']);

           if(!QueryBuilder::createYearLevel($request)){
               return redirect()->back()->with('message', 'Data successfully added');
           }else{
               return redirect()->back()->with('error', 'Error adding data');
           }
       }
   }

   public function view_add_course(){
        return view('components.contents.add-course');
    }

    public function submit_course(Request $request){

        $rules = [
            'course_title' => ['required', 'string', 'max:255'],
            'course_code' => ['required', 'string', 'max:255'],
            'course_description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Error adding data');

        }else{

            unset($request['_token']);

            if(!QueryBuilder::createCourse($request)){
                return redirect()->back()->with('message', 'Data successfully added');
            }else{
                return redirect()->back()->with('error', 'Error adding data');
            }
        }
    }

    public function view_add_semester(){
        return view('components.contents.add-semester');
    }

    public function submit_semester(Request $request){

        $rules = [
            'semester_number' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Error adding data');

        }else{

            unset($request['_token']);

            if(QueryBuilder::getFirst('semesters', 'semester_number', $request['semester_number'])){
                return redirect()->back()->with('error', 'Semester already exist');
            }else{
                if(!QueryBuilder::createSemester($request)){
                    return redirect()->back()->with('message', 'Data successfully added');
                }else{
                    return redirect()->back()->with('error', 'Error adding data');
                }
            }
        }
    }

    public function view_add_subject(){

        $data['subjectList'] = QueryBuilder::getAllData('subjects', 'active');

        return view('components.contents.add-subject', $data);
    }

    public function submit_subject(Request $request){

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'subject_code' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'total_units' => ['required', 'numeric'],
            'lecture_units' => ['required', 'numeric'],
            'lab_units' => ['required', 'numeric'],
            'status' => ['required', 'string', 'max:255']
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Error adding data');

        }else{

            unset($request['_token']);

            if(!QueryBuilder::createSubject($request)){
                return redirect()->back()->with('message', 'Data successfully added');
            }else{
                return redirect()->back()->with('error', 'Error adding data');
            }
        }
    }

    public function view_add_curriculum_courses(){

        $data['course'] = QueryBuilder::getAllData('courses', 'active');
        $data['year'] = QueryBuilder::getAllData('student_years', 'active');
        $data['semester'] = QueryBuilder::getAllData('semesters', 'active');
        $data['curriculum'] = QueryBuilder::getAllData('curricula', 'active');

        return view('components.contents.add-curriculum-courses', $data);
    }

    public function submit_curriculum_courses(Request $request){

        $rules = [
            'status' => ['required', 'string'],
            'course_id' => ['required', 'numeric'],
            'year_id' => ['required', 'numeric'],
            'semester_id' => ['required', 'numeric'],
            'curriculum_id' => ['required', 'numeric']
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Error adding data');

        }else{

            unset($request['_token']);

            $data['courseData'] = QueryBuilder::getFirst('courses', 'id', $request['course_id']);//course
            $data['yearData'] = QueryBuilder::getFirst('student_years', 'id', $request['year_id']);// year
            $data['semesterData'] = QueryBuilder::getFirst('semesters', 'id', $request['semester_id']);// semester
            $data['curriculumData'] = QueryBuilder::getFirst('curricula', 'id', $request['curriculum_id']);// curriculum

            // 2nd year BSIT, 1st Semester, SY 2017-2018
            $title =  $data['yearData']->year_title . " " .  $data['courseData']->course_title . ", " . $data['semesterData']->title . ", " . $data['curriculumData']->tittle;

            if(!QueryBuilder::createCurriculumCourses($request, $title)){
                return redirect()->back()->with('message', 'Data successfully added');
            }else{
                return redirect()->back()->with('error', 'Error adding data');
            }
        }
    }

    public function view_add_curriculum_subject(){

        $data['curriculumCourses'] = QueryBuilder::getCourseData();
        $data['subject'] = QueryBuilder::getAllData('subjects', 'active');

        return view('components.contents.add-curriculum-subject', $data);
    }

    public function submit_curriculum_subject(Request $request){

        $rules = [
            'curiculum_courses_id' => ['required', 'numeric'],
            'subject_id' => ['required', 'numeric'],
            'status' => ['required', 'string']
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Error adding data');

        }else{

            unset($request['_token']);

            if(!QueryBuilder::createCurriculumSubject($request)){
                return redirect()->back()->with('message', 'Data successfully added');
            }else{
                return redirect()->back()->with('error', 'Error adding data');
            }
        }
    }

    public function view_createLinkCourseProgram(){

        $data['curriculumCourses'] = QueryBuilder::getCourseData();

        return view('components.contents.add-link-course-program', $data);
    }

    public function createLinkCourseProgram(Request $request){

        $rules = [
            'curiculum_courses_id_current' => ['required', 'numeric'],
            'curiculum_courses_id_next' => ['required', 'numeric']
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Error adding data');

        }else{

            unset($request['_token']);

            //get first data
            $filterData = QueryBuilder::getFirst('curriculum_courses', 'id', $request['curiculum_courses_id_current']);
            $filter_semester = QueryBuilder::getFirst('semesters', 'id', $filterData->semester_id); // semester
            $filter_schoolYear = QueryBuilder::getFirst('student_years', 'id', $filterData->year_id); // semester
            $filter_course = QueryBuilder::getFirst('courses', 'id', $filterData->course_id); // course

            //get second data
            $filterData_second = QueryBuilder::getFirst('curriculum_courses', 'id', $request['curiculum_courses_id_next']);
            $filter_semester_second = QueryBuilder::getFirst('semesters', 'id', $filterData_second->semester_id); // semester
            $filter_schoolYear_second = QueryBuilder::getFirst('student_years', 'id', $filterData_second->year_id); // semester
            $filter_course_second = QueryBuilder::getFirst('courses', 'id', $filterData_second->course_id); // course

            // if($filter_semester->semester_number > $filter_semester_second->semester_number && $filter_schoolYear->id === $filter_schoolYear_second->id){
            //     return redirect()->back()->with('error', 'Error adding data');
            // }else{
                if(!$filter = QueryBuilder::getFirstLink('link_course_programs', 'curiculum_courses_id_current', $request['curiculum_courses_id_current'])){
                    if($request['curiculum_courses_id_current'] !== $request['curiculum_courses_id_next']){

                        if($filter_course->id !== $filter_course_second->id){
                            return redirect()->back()->with('error', 'Course must be same');
                        }else{
                            //create
                            if(!QueryBuilder::createLinkCourseProgram($request)){
                                return redirect()->back()->with('message', 'Data successfully added');
                            }else{
                                return redirect()->back()->with('error', 'Error adding data');
                            }
                        }
                    }
                }else{
                    return redirect()->back()->with('error', 'Error adding data');
                }
            // }
        }
    }
}








