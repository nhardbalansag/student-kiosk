<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Admin\AdminController;

// student input information
Route::get('/', [StudentController::class, 'index'])->name('index');

Route::group(['prefix'=>'student','as'=>'student-access.'], function() {

    //student input curriculum
    Route::get('input-curriculum', [StudentController::class, 'inputCurriculum'])->name('curriculum');
    
    //student input grades
    Route::get('input-grades', [StudentController::class, 'inputGrades'])->name('grades');

});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix'=>'admin','as'=>'admin.'], function() {

        //render add curriculum 
        Route::get('add-curriculum', [AdminController::class, 'view_add_curriculum'])->name('add-curriculum');
        Route::post('submit-curriculum', [AdminController::class, 'submit_curriculum'])->name('submit-curriculum');

        //render add year 
        Route::get('add-year-level', [AdminController::class, 'view_add_year_level_curriculum'])->name('add-year-level');
        Route::post('submit-year-level', [AdminController::class, 'submit_year_level'])->name('submit-year-level');

        //render add course 
        Route::get('add-course', [AdminController::class, 'view_add_course'])->name('add-course');
        Route::post('submit-course', [AdminController::class, 'submit_course'])->name('submit-course');

        //render add semester 
        Route::get('add-semester', [AdminController::class, 'view_add_semester'])->name('add-semester');
        Route::post('submit-semester', [AdminController::class, 'submit_semester'])->name('submit-semester');

        //render add subject 
        Route::get('add-subject', [AdminController::class, 'view_add_subject'])->name('add-subject');
        Route::post('submit-subject', [AdminController::class, 'submit_subject'])->name('submit-subject');

        //render add curriculum courses
        Route::get('add-curriculum-courses', [AdminController::class, 'view_add_curriculum_courses'])->name('add-curriculum-courses');
        Route::post('submit-curriculum-courses', [AdminController::class, 'submit_curriculum_courses'])->name('submit-curriculum-courses');

        //render add curriculum subject
        Route::get('add-curriculum-subject', [AdminController::class, 'view_add_curriculum_subject'])->name('add-curriculum-subject');
        Route::post('submit-curriculum-subject', [AdminController::class, 'submit_curriculum_subject'])->name('submit-curriculum-subject');

    });
});

// login, register, forgot password routes here
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
