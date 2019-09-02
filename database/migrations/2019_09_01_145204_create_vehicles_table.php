<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->decimal('cost_price', 20,4);
            $table->decimal('sale_price', 20, 4);
            $table->decimal('performance', 2,1)->default(0);
            $table->decimal('safety', 2,1)->default(0);
            $table->decimal('handling', 2, 1)->default(0);
            $table->integer('top_speed')->default(0);
            $table->decimal('0_62', 2,1)->default(0);
            $table->integer('bhp')->default(1);
            $table->json('images')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
