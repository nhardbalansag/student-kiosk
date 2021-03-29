<?php

namespace App\Main\Query;

use Illuminate\Database\Eloquent\Model;
use App\Main\Model\{Curriculum, StudentYear, Course, Semester, Subject};
use Illuminate\Support\Facades\{Validator, DB};

class QueryBuilder extends Model
{
    public static function createCurriculum($request){
        Curriculum::create([
            'year_start_curiculum' => $request['year_start_curiculum'],
            'year_end_curiculum' => $request['year_end_curiculum'],
            'tittle' => $request['tittle'],
            'description' => $request['description'],
            'status' => $request['status']
        ]);
    }

    public static function createYearLevel($request){
        StudentYear::create([
            'year_title' => $request['year_title'],
            'description' => $request['description'],
            'status' => $request['status']
        ]);
    }

    public static function createCourse($request){
        Course::create([
            'course_title' => $request['course_title'],
            'course_description' => $request['course_description'],
            'status' => $request['status']
        ]);
    }

    public static function createSubject($request){
        Subject::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'total_units' => $request['total_units'],
            'lecture_units' => $request['lecture_units'],
            'lab_units' => $request['lab_units'],
            'subject_id' => $request['subject_id'],
            'status' => $request['status']
        ]);
    }

    public static function getAllData($colection, $filter){
        $data = DB::table($colection)
                ->where('status', $filter)
                ->get();

        return $data;
    }
}
