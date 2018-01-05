<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id');
            $table->integer('traveler_id');
            $table->integer('adult')->nullable();
            $table->integer('child')->nullable();
            $table->integer('infant')->nullable();
            $table->decimal('adult_price', 10, 2)->nullable();
            $table->decimal('child_price', 10, 2)->nullable();
            $table->decimal('infant_price', 10, 2)->nullable();
            $table->integer('pax')->nullable();
            $table->decimal('pax_price', 10, 2)->nullable();
            $table->string('service')->nullable();
            $table->decimal('total_payment', 10,2)->nullable();
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
        Schema::dropIfExists('bills');
    }
}
