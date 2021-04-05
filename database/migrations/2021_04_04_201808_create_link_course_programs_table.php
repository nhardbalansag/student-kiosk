<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkCourseProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_course_programs', function (Blueprint $table) {
            $table->increments('id');
            //course
            $table->integer('curiculum_courses_id_current')->unsigned();
            $table->foreign('curiculum_courses_id_current')
            ->references('id')
            ->on('curriculum_courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //next course link
            $table->integer('curiculum_courses_id_next')->unsigned();
            $table->foreign('curiculum_courses_id_next')
            ->references('id')
            ->on('curriculum_courses')
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
        Schema::dropIfExists('link_course_programs');
    }
}
