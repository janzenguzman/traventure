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
            $table->increments('booking_id');
            $table->integer('package_id');
            $table->integer('traveler_id');
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('client_fname')->nullable();
            $table->string('client_lname')->nullable();
            $table->string('contact_num')->nullable();
            $table->string('client_email')->nullable();
            $table->integer('adult')->nullable();
            $table->integer('child')->nullable();
            $table->integer('infant')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->default('Pending');
            $table->string('expired')->nullable();
            $table->timestamps();
            $table->decimal('total_payment',10,2)->nullable();
            $table->string('service')->nullable();
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
