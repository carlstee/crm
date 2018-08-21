<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalManagement extends Model
{
    protected $fillable = [
      'name',
      'phone',
      'email',
      'amount',
      'date',
      'detail',
    ];
}
