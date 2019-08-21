<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('character_id');
            $table->integer('equipment_id');
            $table->integer('health');
            $table->integer('max_health');
            $table->integer('base_attack');
            $table->integer('base_defence');
            $table->integer('current_attack');
            $table->integer('current_defence');
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
        Schema::dropIfExists('character_equipment');
    }
}
