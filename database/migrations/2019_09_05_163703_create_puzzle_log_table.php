<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuzzleLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puzzle_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('character_id');
            $table->string('unique_id');
            $table->string('name');
            $table->string('difficulty');
            $table->tinyInteger('is_complete')->default(0);
            $table->integer('reward_dollars')->default(0);
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
        Schema::dropIfExists('puzzle_logs');
    }
}
