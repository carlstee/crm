<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $fillable = [
        'image', 'title', 'mobile', 'email', 'name', 'currency'
    ];
}
