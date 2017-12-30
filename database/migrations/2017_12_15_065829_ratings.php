<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ratings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('ratings', function (Blueprint $table) {
             $table->increments('id')->index();
             $table->integer('people_id');
             $table->integer('sp_id');
             $table->foreign('people_id')->references('id')->on('users');
             $table->foreign('sp_id')->references('id')->on('service_providers');
             $table->integer('rating')->default(0);
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('ratings');
     }
}
