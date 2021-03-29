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
}


