<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $table = 'providers';
   public $timestamps = false;
  protected $fillable = [
      'user_id'
  ];
}
