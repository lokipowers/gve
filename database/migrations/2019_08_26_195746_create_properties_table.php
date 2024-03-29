<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('side', 255);
            $table->text('description');
            $table->integer('owner_id')->nullable();
            $table->string('type', 255);
            $table->integer('base_salary')->default(0);
            $table->integer('salary_multiplier')->default(1);
            $table->integer('defence')->default(100);
            $table->json('meta')->nullable();
            $table->integer('location_id');
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
        Schema::dropIfExists('properties');
    }
}
