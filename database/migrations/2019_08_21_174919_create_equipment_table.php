<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('side', 100);
            $table->string('type', 100);
            $table->integer('parent_id')->nullable();
            $table->integer('thumbnail_id')->nullable();
            $table->integer('attack')->default(0);
            $table->integer('defence')->default(0);
            $table->integer('cost_coin')->default(0);
            $table->integer('cost_diamond')->default(0);
            $table->integer('cost_coin_sale')->default(0);
            $table->integer('cost_diamond_sale')->default(0);
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
        Schema::dropIfExists('equipment');
    }
}
