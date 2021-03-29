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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Error adding data');

        }else{

            unset($request['_token']);

            if(!QueryBuilder::createSemester($request)){
                return redirect()->back()->with('message', 'Data successfully added');
            }else{
                return redirect()->back()->with('error', 'Error adding data');
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'numeric'],
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

            if(!QueryBuilder::createCurriculumCourses($request)){
                return redirect()->back()->with('message', 'Data successfully added');
            }else{
                return redirect()->back()->with('error', 'Error adding data');
            }
        }
    }

    public function view_add_curriculum_subject(){

        $data['curriculumCourses'] = QueryBuilder::getAllData('curriculum_courses', 'active');
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
}








