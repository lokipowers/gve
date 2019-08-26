<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('owner_user_id')->nullable();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('latitude', 255);
            $table->string('longitude', 255);
            $table->string('country', 255);
            $table->integer('population');
            $table->integer('crime_rate')->default(0);
            $table->integer('protection_rate')->default(0);
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
        Schema::dropIfExists('locations');
    }
}
