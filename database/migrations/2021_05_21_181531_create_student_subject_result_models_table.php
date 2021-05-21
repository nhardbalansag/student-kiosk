<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSubjectResultModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subject_result_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject_title');
            $table->string('subject_prerequites_id')->nullable();
            $table->string('status');

            // foreign
            $table->integer('student_inquiry_id')->unsigned();
            $table->foreign('student_inquiry_id')
            ->references('id')
            ->on('student_inquiry_models')
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
        Schema::dropIfExists('student_subject_result_models');
    }
}
