<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

// student input information
Route::get('/', [StudentController::class, 'index'])->name('index');

Route::group(['prefix'=>'student','as'=>'student-access.'], function() {

    //student input grades
    Route::get('input-grades', [StudentController::class, 'inputGrades'])->name('grades');

});

Route::group(['middleware' => 'auth'], function () {

});

// login, register, forgot password routes here
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
