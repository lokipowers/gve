<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->integer('avatar_id')->nullable();
            $table->string('side', 100);
            $table->integer('rank_id');
            $table->integer('current_location_id');
            $table->integer('experience')->default(0);
            $table->string('status', 100)->default('INACTIVE');
            $table->softDeletes();
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
        Schema::dropIfExists('characters');
    }
}
