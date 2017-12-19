<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'address', 'city', 'country'
  ];

  

}
