<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassedInfoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passed_info_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('passedCount');

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
        Schema::dropIfExists('passed_info_models');
    }
}
