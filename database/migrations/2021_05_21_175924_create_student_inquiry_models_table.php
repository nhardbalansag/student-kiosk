<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInquiryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_inquiry_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_number');
            $table->string('student_firstname');
            $table->string('student_middlename')->nullable();
            $table->string('student_lastname');

            // foreign
            $table->integer('curriculumId')->unsigned();
            $table->foreign('curriculumId')
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
        Schema::dropIfExists('student_inquiry_models');
    }
}
