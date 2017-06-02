<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class buildingsModel extends Model
{
  protected $table = 'buildings';
  public $primaryKey = 'building_id';
  public $timestamps = TRUE;
}
