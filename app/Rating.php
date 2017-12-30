<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Rating extends Model
{
  protected $table = 'ratings';
  public $timestamps = false;
  protected $fillable = [
   'people_id', 'sp_id','rating'
 ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
}
