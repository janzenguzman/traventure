<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatToIntineraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itinerary', function($table){
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
        Schema::table('itinerary', function($table){
            $table->dropColumn('lat', 20, 10);
            $table->dropColumn('lng', 20, 10);;
        });
    }
}
