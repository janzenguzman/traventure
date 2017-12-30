<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('package_id');
            $table->string('package_name')->nullable();
            $table->integer('days')->nullable();
            $table->float('adult_price')->nullable();
            $table->float('child_price')->nullable();
            $table->float('infant_price')->nullable();
            $table->float('excess_price')->nullable();
            $table->string('type')->nullable();
            $table->integer('pax1')->nullable();
            $table->float('pax1_price')->nullable();
            $table->integer('pax2')->nullable();
            $table->float('pax2_price')->nullable();
            $table->integer('pax3')->nullable();
            $table->float('pax3_price')->nullable();
            $table->string('inclusions')->nullable();
            $table->string('add_info')->nullable();
            $table->string('reminders')->nullable();
            $table->string('categories')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
