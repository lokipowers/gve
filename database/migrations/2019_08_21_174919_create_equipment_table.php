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
            $table->integer('equipment_id');
            $table->integer('character_id');
            $table->string('type', 100);
            $table->decimal('cost_dollars', 65, 4)->default(0);
            $table->integer('cost_coin')->default(0);
            $table->decimal('cost_dollars_sale', 65, 4)->nullable();
            $table->integer('cost_coin_sale')->nullable();
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
