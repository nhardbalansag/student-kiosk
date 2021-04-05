<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('final_grade');
            //curriculum subject
            $table->integer('curriculum_subject_id')->unsigned();
            $table->foreign('curriculum_subject_id')
            ->references('id')
            ->on('curriculum_subjects')
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
        Schema::dropIfExists('subject_grades');
    }
}
