<?php

namespace App\Main\Query;

use Illuminate\Database\Eloquent\Model;
use App\Main\Model\{Curriculum, StudentYear, Course, Semester, Subject, CurriculumCourses, CurriculumSubject, Prerequisites};
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
            'course_code' => $request['course_code'],
            'course_description' => $request['course_description'],
            'status' => $request['status']
        ]);
    }

    public static function createSubject($request){
        Subject::create([
            'title' => $request['title'],
            'subject_code' => $request['subject_code'],
            'description' => $request['description'],
            'total_units' => $request['total_units'],
            'lecture_units' => $request['lecture_units'],
            'lab_units' => $request['lab_units'],
            'status' => $request['status']
        ]);
    }

    public static function createSemester($request){
        Semester::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status']
        ]);
    }

    public static function createCurriculumCourses($request, $title){
        CurriculumCourses::create([
            'title' => $title,
            'status' => $request['status'],
            'course_id' => $request['course_id'],
            'year_id' => $request['year_id'],
            'semester_id' => $request['semester_id'],
            'curriculum_id' => $request['curriculum_id']
        ]);
    }

    public static function createCurriculumSubject($request){
        CurriculumSubject::create([
            'curiculum_courses_id' => $request['curiculum_courses_id'],
            'subject_id' => $request['subject_id'],
            'pre_subject_id' => $request['pre_subject_id'],
            'status' => $request['status']
        ]);
    }

    public static function getAllData($colection, $filter){
        $data = DB::table($colection)
                ->where('status', $filter)
                ->get();

        return $data;
    }

    public static function getCourseData(){
        $data = DB::table('curriculum_courses')
                ->join('courses', 'curriculum_courses.course_id', '=', 'courses.id')
                ->where('curriculum_courses.status', 'active')
                ->select('curriculum_courses.*', 'courses.course_title as course_title')
                ->get();

        return $data;
    }

    public static function getFirst($collection, $to_filter, $filter){
        $data = DB::table($collection)
                ->where($to_filter, $filter)
                ->where('status', 'active')
                ->first();

        return $data;
    }

    public static function getStudentSubject($curriculum_id){

        $data['pre'] = DB::table('curriculum_subjects')
                ->join('curriculum_courses', 'curriculum_courses.id', '=', 'curriculum_subjects.curiculum_courses_id')
                ->join('subjects', 'subjects.id', '=', 'curriculum_subjects.subject_id')
                ->join('courses', 'curriculum_courses.course_id', '=', 'courses.id')
                ->join('curricula', 'curriculum_courses.curriculum_id', '=', 'curricula.id')
                ->join('student_years', 'curriculum_courses.year_id', '=', 'student_years.id')
                ->join('semesters', 'curriculum_courses.semester_id', '=', 'semesters.id')
                ->where('curriculum_subjects.status', 'active')
                ->where('curriculum_courses.id', $curriculum_id)
                ->select(
                    'curriculum_subjects.id as curriculum_subjects_id',
                    'subjects.title as subject_title',
                    'subjects.subject_code as subject_subject_code',
                    'subjects.total_units as subject_total_units',
                    'subjects.lecture_units as subject_lecture_units',
                    'subjects.lab_units as subject_lab_units',
                    'courses.course_title as course_title',
                    'courses.course_code as course_code',
                    'curriculum_subjects.pre_subject_id as preReq_subject_code'
                )
                ->get();

        return $data;
    }

    public static function getFirstStudentSubject($curriculum_id){

        $data = DB::table('curriculum_subjects')
                ->join('curriculum_courses', 'curriculum_courses.id', '=', 'curriculum_subjects.curiculum_courses_id')
                ->join('courses', 'curriculum_courses.course_id', '=', 'courses.id')
                ->join('curricula', 'curriculum_courses.curriculum_id', '=', 'curricula.id')
                ->join('student_years', 'curriculum_courses.year_id', '=', 'student_years.id')
                ->join('semesters', 'curriculum_courses.semester_id', '=', 'semesters.id')
                ->where('curriculum_subjects.status', 'active')
                ->where('curriculum_courses.id', $curriculum_id)
                ->select(
                    'curriculum_courses.id as curriculum_courses_id',
                    'courses.course_title as course_title',
                    'courses.course_code as course_code',
                    'curricula.tittle as course_curriculum_title',
                    'student_years.year_title as student_years_title',
                    'semesters.title as semesters_title',
                )
                ->first();

        return $data;
    }
}
