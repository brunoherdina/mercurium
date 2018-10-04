<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EquipamentChecklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipament_checklists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checklist_question_id')->unsigned();
            $table->foreign('checklist_question_id')->references('id')->on('checklist_questions');
            $table->integer('equipament_id')->unsigned();
            $table->foreign('equipament_id')->references('id')->on('equipaments');
            $table->engine = 'InnoDB';
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
