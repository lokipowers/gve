<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('send_to_email', 255);
            $table->string('send_to_name', 255);
            $table->string('send_from_email', 255);
            $table->string('send_from_name', 255);
            $table->text('content');
            $table->integer('is_sending')->default(0);
            $table->integer('is_sent')->default(0);
            $table->integer('is_failed')->default(0);
            $table->text('response')->nullable();
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
        Schema::dropIfExists('emails');
    }
}
