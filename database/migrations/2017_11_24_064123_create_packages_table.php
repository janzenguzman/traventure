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
            $table->integer('days');
            $table->decimal('adult_price', 10,2)->nullable();
            $table->decimal('child_price', 10,2)->nullable();
            $table->decimal('infant_price', 10,2)->nullable();
            $table->decimal('excess_price', 10,2)->nullable();
            $table->string('type')->nullable();
            $table->integer('pax1')->nullable();
            $table->decimal('pax1_price', 10,2)->nullable();
            $table->integer('pax2')->nullable();
            $table->decimal('pax2_price', 10,2)->nullable();
            $table->integer('pax3')->nullable();
            $table->decimal('pax3_price', 10,2)->nullable();
            $table->text('inclusions')->nullable();
            $table->text('add_info')->nullable();
            $table->text('reminders')->nullable();
            $table->string('categories');
            $table->timestamps();
            $table->integer('agent_id');
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
