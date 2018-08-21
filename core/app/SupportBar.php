<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportBar extends Model
{
    protected $table = "support_bars";
    protected $fillable = [
        'contact_icon',
        'phone_number',
        'service_time_icon',
        'service_time',
        'facebook_url',
        'twitter_link',
        'linkedin_link',
        'pinterest_link',
        'status'
    ];
}
