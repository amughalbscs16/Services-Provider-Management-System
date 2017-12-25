<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class ratings extends Model
{
  protected $table = 'ratings';
  public $timestamps = false;
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
