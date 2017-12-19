<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Schema::create('ratings', function (Blueprint $table) {
    $table->integer('people_id');
    $table->integer('sp_id');
    $table->foreign('people_id')->references('id')->on('users');
    $table->foreign('sp_id')->references('id')->on('service_providers');
});
class ratings extends Model
{
  protected $fillable = [
     'people_id', 'sp_id'
 ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 protected $hidden = [
 ];

 protected $guarded = [
 ];
}
