<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('status');
            //courses
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //year
            $table->integer('year_id')->unsigned();
            $table->foreign('year_id')
            ->references('id')
            ->on('student_years')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //semester
            $table->integer('semester_id')->unsigned();
            $table->foreign('semester_id')
            ->references('id')
            ->on('semesters')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //curriculum
            $table->integer('curriculum_id')->unsigned();
            $table->foreign('curriculum_id')
            ->references('id')
            ->on('curricula')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_courses');
    }
}


