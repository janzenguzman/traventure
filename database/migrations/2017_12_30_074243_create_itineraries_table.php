<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->increments('itinerary_id');
            $table->integer('package_id');
            $table->string('day1_starttime1')->nullable();
            $table->string('day1_endtime1')->nullable();
            $table->string('day1_destination1')->nullable();
            $table->string('day1_starttime2')->nullable();
            $table->string('day1_endtime2')->nullable();
            $table->string('day1_destination2')->nullable();
            $table->string('day1_starttime3')->nullable();
            $table->string('day1_endtime3')->nullable();
            $table->string('day1_destination3')->nullable();
            $table->string('day1_starttime4')->nullable();
            $table->string('day1_endtime4')->nullable();
            $table->string('day1_destination4')->nullable();
            $table->string('day1_starttime5')->nullable();
            $table->string('day1_endtime5')->nullable();
            $table->string('day1_destination5')->nullable();
            $table->string('day1_photo')->nullable();
            $table->string('day2_starttime1')->nullable();
            $table->string('day2_endtime1')->nullable();
            $table->string('day2_destination1')->nullable();
            $table->string('day2_starttime2')->nullable();
            $table->string('day2_endtime2')->nullable();
            $table->string('day2_destination2')->nullable();
            $table->string('day2_starttime3')->nullable();
            $table->string('day2_endtime3')->nullable();
            $table->string('day2_destination3')->nullable();
            $table->string('day2_starttime4')->nullable();
            $table->string('day2_endtime4')->nullable();
            $table->string('day2_destination4')->nullable();
            $table->string('day2_starttime5')->nullable();
            $table->string('day2_endtime5')->nullable();
            $table->string('day2_destination5')->nullable();
            $table->string('day2_photo')->nullable();
            $table->string('day3_starttime1')->nullable();
            $table->string('day3_endtime1')->nullable();
            $table->string('day3_destination1')->nullable();
            $table->string('day3_starttime2')->nullable();
            $table->string('day3_endtime2')->nullable();
            $table->string('day3_destination2')->nullable();
            $table->string('day3_starttime3')->nullable();
            $table->string('day3_endtime3')->nullable();
            $table->string('day3_destination3')->nullable();
            $table->string('day3_starttime4')->nullable();
            $table->string('day3_endtime4')->nullable();
            $table->string('day3_destination4')->nullable();
            $table->string('day3_starttime5')->nullable();
            $table->string('day3_endtime5')->nullable();
            $table->string('day3_destination5')->nullable();
            $table->string('day3_photo')->nullable();
            $table->string('day4_starttime1')->nullable();
            $table->string('day4_endtime1')->nullable();
            $table->string('day4_destination1')->nullable();
            $table->string('day4_starttime2')->nullable();
            $table->string('day4_endtime2')->nullable();
            $table->string('day4_destination2')->nullable();
            $table->string('day4_starttime3')->nullable();
            $table->string('day4_endtime3')->nullable();
            $table->string('day4_destination3')->nullable();
            $table->string('day4_starttime4')->nullable();
            $table->string('day4_endtime4')->nullable();
            $table->string('day4_destination4')->nullable();
            $table->string('day4_starttime5')->nullable();
            $table->string('day4_endtime5')->nullable();
            $table->string('day4_destination5')->nullable();
            $table->string('day4_photo')->nullable();
            $table->string('day5_starttime1')->nullable();
            $table->string('day5_endtime1')->nullable();
            $table->string('day5_destination1')->nullable();
            $table->string('day5_starttime2')->nullable();
            $table->string('day5_endtime2')->nullable();
            $table->string('day5_destination2')->nullable();
            $table->string('day5_starttime3')->nullable();
            $table->string('day5_endtime3')->nullable();
            $table->string('day5_destination3')->nullable();
            $table->string('day5_starttime4')->nullable();
            $table->string('day5_endtime4')->nullable();
            $table->string('day5_destination4')->nullable();
            $table->string('day5_starttime5')->nullable();
            $table->string('day5_endtime5')->nullable();
            $table->string('day5_destination5')->nullable();
            $table->string('day5_photo')->nullable();
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
        Schema::dropIfExists('itineraries');
    }
}
