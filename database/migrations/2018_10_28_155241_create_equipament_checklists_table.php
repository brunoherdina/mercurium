<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentChecklistsTable extends Migration
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
            $table->string('version');
            $table->integer('equipament_type_id')->unsigned();
            $table->foreign('equipament_type_id')->references('id')->on('equipament_types');
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
        Schema::dropIfExists('equipament_checklists');
    }
}
