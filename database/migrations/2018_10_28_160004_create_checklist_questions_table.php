<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('equipament_checklist_id')->unsigned();
            $table->foreign('equipament_checklist_id')->references('id')->on('equipament_checklists');
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
        Schema::dropIfExists('checklist_questions');
    }
}
