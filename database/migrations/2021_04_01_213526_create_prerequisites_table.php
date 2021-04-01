<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrerequisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prerequisites', function (Blueprint $table) {
            $table->id();
            $table->string('prerequisites_title');
            $table->string('prerequisites_subject_code');
            $table->integer('prerequisites_subject_id')->unsigned()->nullable();
            $table->foreign('prerequisites_subject_id')
            ->references('id')
            ->on('subjects')
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
        Schema::dropIfExists('prerequisites');
    }
}
