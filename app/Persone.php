<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persone extends Model
{
  protected  $fillable=[
      'First_name','Last_name','phone','email','city'
    ];
}
