<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_subjects', function (Blueprint $table) {
            $table->id();
            //curriculum subjects
            $table->integer('curiculum_courses_id')->unsigned();
            $table->foreign('curiculum_courses_id')
            ->references('id')
            ->on('curriculum_courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //subjects
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')
            ->references('id')
            ->on('subjects')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //pre subjects
            $table->integer('pre_subject_id')->unsigned()->nullable();
            $table->foreign('pre_subject_id')
            ->references('id')
            ->on('subjects')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('status');
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
        Schema::dropIfExists('curriculum_subjects');
    }
}
