<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class roomtypeModel extends Model
{
  protected $table = 'roomtype';
  public $primaryKey = 'rt_id';
  public $timestamps = FALSE;
}
