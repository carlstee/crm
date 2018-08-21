<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialManagement extends Model
{
    protected $table ="social_managements";
    protected $fillable = ['name','url'];
}
