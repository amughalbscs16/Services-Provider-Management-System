<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_provider extends Model
{
  protected $table = 'service_providers';
  public $timestamps = false;
  protected $fillable = [
     'provider_id', 'service_id','address','city','country'
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
