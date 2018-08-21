<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Btc extends Model
{
    protected $table = "btcs";
    protected $fillable= ['display_name','api_key','xpub_code','status','btc_picture'];
}
