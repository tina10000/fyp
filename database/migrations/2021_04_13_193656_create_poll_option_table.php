<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poll_option', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->string('status',10)->default('active');
            $table->unsignedBigInteger('poll_id');
            $table->foreign('poll_id')->references('id')->on('poll')->onDelete('cascade');
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
        Schema::dropIfExists('poll_option');
    }
}
