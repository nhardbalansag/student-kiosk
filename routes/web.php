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

        Route::get('add-curriculum', [AdminController::class, 'view_add_curriculum'])->name('add-curriculum');
        Route::post('submit-curriculum', [AdminController::class, 'submit_curriculum'])->name('submit-curriculum');

    });
});

// login, register, forgot password routes here
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
