<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paypal extends Model
{
    protected $table ="paypals";
    protected $fillable = ['display_name','paypal_email','status','picture','payment_picture'];
}
