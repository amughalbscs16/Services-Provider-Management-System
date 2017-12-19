<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceProvider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('service_providers', function (Blueprint $table) {
             $table->increments('id')->index();
             $table->integer('provider_id');
             $table->integer('service_id');
             $table->foreign('provider_id')->references('id')->on('providers');
             $table->foreign('service_id')->references('id')->on('services');
             $table->string('address');
             $table->string('city');
             $table->string('country');
             $table->unique('provider_id','service_id');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('service_providers');
     }
}
