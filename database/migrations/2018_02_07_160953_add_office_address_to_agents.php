<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfficeAddressToAgents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function($table){
            $table->text('office_address');
            $table->double('lat', 20, 10);
            $table->double('lng', 20, 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('office_address');
        $table->dropColumn('lat', 20, 10);
        $table->dropColumn('lng', 20, 10);
    }
}
