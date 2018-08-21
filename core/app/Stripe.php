<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stripe extends Model
{
    protected $table = "stripes";
    protected $fillable = ['display_name','secret_key','publisher_key','status','stripe_picture'];
}
