<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tenantModel extends Model
{
  protected $table = 'tenant';
  public $primaryKey = 'ten_id';
  public $timestamps = TRUE;
}
