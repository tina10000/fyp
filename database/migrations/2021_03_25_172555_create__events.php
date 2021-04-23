<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_title');
            $table->string('event_details');
            $table->date('start');
            $table->date('end');
            $table->integer('allDay');
            $table->string('color');
            $table->string('textColor');
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
        Schema::dropIfExists('_events');
    }
}
