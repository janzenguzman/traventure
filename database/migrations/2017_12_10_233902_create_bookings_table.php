<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id');
            $table->date('date_from');
            $table->date('date_to');
            $table->string('client_fname');
            $table->string('client_lname');
            $table->bigInteger('contact_num');
            $table->string('client_email');
            $table->integer('adult');
            $table->integer('child');
            $table->integer('infant');
            $table->mediumtext('note');
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
        Schema::dropIfExists('bookings');
    }
}
