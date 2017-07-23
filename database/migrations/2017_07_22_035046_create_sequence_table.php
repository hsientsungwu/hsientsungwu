<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSequenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sequences', function (Blueprint $table) {
            $table->increments('sequenceId');
            $table->integer('sequenceStopSequence');
            $table->string('sequenceStopId');
            $table->string('sequenceStopName');
            $table->timestamp('sequenceArrivalTime')->nullable();
            $table->timestamp('sequenceDepartureTime')->nullable();
            $table->string('tripId');

            $table->foreign('tripId')->references('tripId')->on('trips');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sequences');
    }
}
