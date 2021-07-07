<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sector extends Model
{
  public $table='sectors';
     protected $fillable=['id','name_ar','name_en','active','created_at','updated_at'];

}
