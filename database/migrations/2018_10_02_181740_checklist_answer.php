<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChecklistAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checklist_id')->unsigned();
            $table->foreign('checklist_id')->references('id')->on('checklists');
            $table->integer('equipament_checklist_id')->unsigned();
            $table->foreign('equipament_checklist_id')->references('id')->on('equipament_checklists');
            $table->integer('checklist_question_id')->unsigned();
            $table->foreign('checklist_question_id')->references('id')->on('checklist_questions');
            $table->string('value');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
