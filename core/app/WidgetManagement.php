<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WidgetManagement extends Model
{
    protected $table = "widget_managements";
    protected $fillable = [
        'search',
        'category',
        'recent_post',
        'tag',
        'advertisement'
    ];
}
