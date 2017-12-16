<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletedAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('fname');
            $table->string('lname');
            $table->string('job_position');
            $table->string('contact_no');
            $table->string('email');
            $table->string('password');
            $table->string('status');
            $table->rememberToken();
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
        Schema::dropIfExists('deleted_agents');
    }
}
