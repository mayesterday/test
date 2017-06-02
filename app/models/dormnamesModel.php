<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class dormnamesModel extends Model
{
  protected $table = 'dormnames';
  public $primaryKey = 'dn_id';
  public $timestamps = TRUE;
}
