<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypesInItineraries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->time('day1_starttime1')->change();
            $table->time('day1_endtime1')->change();
            $table->time('day1_starttime2')->change();
            $table->time('day1_endtime2')->change();
            $table->time('day1_starttime3')->change();
            $table->time('day1_endtime3')->change();
            $table->time('day1_starttime4')->change();
            $table->time('day1_endtime4')->change();
            $table->time('day1_starttime5')->change();
            $table->time('day1_endtime5')->change();
            $table->time('day2_starttime1')->change();
            $table->time('day2_endtime1')->change();
            $table->time('day2_starttime2')->change();
            $table->time('day2_endtime2')->change();
            $table->time('day2_starttime3')->change();
            $table->time('day2_endtime3')->change();
            $table->time('day2_starttime4')->change();
            $table->time('day2_endtime4')->change();
            $table->time('day2_starttime5')->change();
            $table->time('day2_endtime5')->change();
            $table->time('day3_starttime1')->change();
            $table->time('day3_endtime1')->change();
            $table->time('day3_starttime2')->change();
            $table->time('day3_endtime2')->change();
            $table->time('day3_starttime3')->change();
            $table->time('day3_endtime3')->change();
            $table->time('day3_starttime4')->change();
            $table->time('day3_endtime4')->change();
            $table->time('day3_starttime5')->change();
            $table->time('day3_endtime5')->change();
            $table->time('day4_starttime1')->change();
            $table->time('day4_endtime1')->change();
            $table->time('day4_starttime2')->change();
            $table->time('day4_endtime2')->change();
            $table->time('day4_starttime3')->change();
            $table->time('day4_endtime3')->change();
            $table->time('day4_starttime4')->change();
            $table->time('day4_endtime4')->change();
            $table->time('day4_starttime5')->change();
            $table->time('day4_endtime5')->change();
            $table->time('day5_starttime1')->change();
            $table->time('day5_endtime1')->change();
            $table->time('day5_starttime2')->change();
            $table->time('day5_endtime2')->change();
            $table->time('day5_starttime3')->change();
            $table->time('day5_endtime3')->change();
            $table->time('day5_starttime4')->change();
            $table->time('day5_endtime4')->change();
            $table->time('day5_starttime5')->change();
            $table->time('day5_endtime5')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
