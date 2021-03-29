<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Main\Query\QueryBuilder;
use Illuminate\Support\Facades\Validator;

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
}


