<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $table = 'awards';
    protected $fillable = [
        'award_name','gift','price','employee_name','month','year'
    ];
}
