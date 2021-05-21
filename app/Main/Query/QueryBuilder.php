<?php

namespace App\Main\Query;

use Illuminate\Database\Eloquent\Model;
use App\Main\Model\{Curriculum, StudentYear, Course, Semester, Subject, CurriculumCourses, CurriculumSubject, SubjectGrade, LinkCourseProgram, StudentInquiryModel, StudentSubjectResultModel, PassedInfoModel};
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
            'semester_number' => $request['semester_number'],
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

    public static function getInquiryDataGet($colection, $firstColumn, $firstfilter, $secondColumn, $secondfilter){

        $data = DB::table($colection)
                ->where($firstColumn, $firstfilter)
                ->where($secondColumn, $secondfilter)
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

    public static function getFirstLink($collection, $to_filter, $filter){
        $data = DB::table($collection)
                ->where($to_filter, $filter)
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
                    'curriculum_subjects.pre_subject_id as preReq_subject_code',
                    'curriculum_subjects.subject_id as subject_id',
                    'curriculum_subjects.pre_subject_id as preReq_subject_id'
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

    public static function createSubjectGrade($request){
        SubjectGrade::create([
            'final_grade' => $request['final_grade'],
            'curriculum_subject_id' => $request['curriculum_subject_id']
        ]);
    }

    public static function createLinkCourseProgram($request){
        LinkCourseProgram::create([
            'curiculum_courses_id_current' => $request['curiculum_courses_id_current'],
            'curiculum_courses_id_next' => $request['curiculum_courses_id_next']
        ]);
    }


    public static function filterSemester($id){
        $data = DB::table('curriculum_courses')
                ->join('semesters', 'semesters.id', '=', 'curriculum_courses.semester_id')
                ->where('curriculum_courses.id', $id)
                ->select('semesters.*')
                ->first();

        return $data;
    }

    public static function getcourses($id){
        $data = DB::table('curriculum_courses')
                ->join('curriculum_subjects', 'curriculum_courses.id', '=', 'curriculum_subjects.curiculum_courses_id')
                ->join('subjects', 'subjects.id', '=', 'curriculum_subjects.subject_id')
                ->join('courses', 'curriculum_courses.course_id', '=', 'courses.id')
                ->join('curricula', 'curriculum_courses.curriculum_id', '=', 'curricula.id')
                ->join('student_years', 'curriculum_courses.year_id', '=', 'student_years.id')
                ->join('semesters', 'curriculum_courses.semester_id', '=', 'semesters.id')
                ->where('curricula.id', $id)
                ->select(
                    'courses.id as course_id',
                    'courses.course_title as course_title',
                    'courses.course_code as course_code',
                    'courses.status as course_status',
                    'curricula.id as curricula_id'
                )
                ->groupBy(
                    'courses.id',
                    'courses.course_title',
                    'courses.course_code',
                    'courses.status',
                    'curricula.id'
                    )
                ->get();

        return $data;
    }

    public static function getYearlevels($curricula_id, $courses_id){
        $data = DB::table('curriculum_subjects')
                ->join('curriculum_courses', 'curriculum_courses.id', '=', 'curriculum_subjects.curiculum_courses_id')
                ->join('subjects', 'subjects.id', '=', 'curriculum_subjects.subject_id')
                ->join('courses', 'curriculum_courses.course_id', '=', 'courses.id')
                ->join('curricula', 'curriculum_courses.curriculum_id', '=', 'curricula.id')
                ->join('student_years', 'curriculum_courses.year_id', '=', 'student_years.id')
                ->join('semesters', 'curriculum_courses.semester_id', '=', 'semesters.id')
                ->where('curriculum_courses.course_id', $courses_id)
                ->where('curriculum_courses.curriculum_id', $curricula_id)
                ->select(
                    'courses.id as course_id',
                    'student_years.year_title as student_years_title',
                    'student_years.status as student_years_status',
                    'student_years.id as student_years_id',
                    'curricula.id as curricula_id'
                )
                ->groupBy(
                    'courses.id',
                    'student_years.year_title',
                    'student_years.status',
                    'student_years.id',
                    'curricula.id'
                )
                ->get();

        return $data;
    }

    public static function view_semester($course_id, $student_years_id, $curricula_id){

        $data = DB::table('curriculum_courses')
                ->join('courses', 'curriculum_courses.course_id', '=', 'courses.id')
                ->join('curricula', 'curriculum_courses.curriculum_id', '=', 'curricula.id')
                ->join('student_years', 'curriculum_courses.year_id', '=', 'student_years.id')
                ->join('semesters', 'curriculum_courses.semester_id', '=', 'semesters.id')
                ->where('curriculum_courses.course_id', $course_id)
                ->where('curriculum_courses.year_id', $student_years_id)
                ->where('curriculum_courses.curriculum_id', $curricula_id)
                ->select(
                    'semesters.title as title',
                    'semesters.status as status',
                    'curriculum_courses.id as curriculum_courses_id'
                )
                ->groupBy(
                    'semesters.title',
                    'semesters.status',
                    'curriculum_courses.id'
                )
                ->get();

        return $data;

    }


    public static function createStudentInquiry($request){

        $data = StudentInquiryModel::create([
                    'student_number' => $request
                ]);

        return $data;
    }

    public static function createStudentSubjectResultModel(
        $student_inquiry_id,
        $subject_title,
        $subject_prerequites_id,
        $status
    ){

        $data = StudentSubjectResultModel::create([
            'student_inquiry_id' => $student_inquiry_id,
            'subject_title' => $subject_title,
            'subject_prerequites_id' => $subject_prerequites_id,
            'status' => $status
        ]);

        return $data;
    }

    public static function createPassedInfoModel($id, $count){

        $data = PassedInfoModel::create([
            'passedCount' => $count,
            'student_inquiry_id' => $id
        ]);

        return $data;
    }
}
