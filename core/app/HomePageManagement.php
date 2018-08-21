<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageManagement extends Model
{
    protected $table = "home_page_managements";
    protected $fillable = [
        'header_section',
        'featured_section',
        'category_section',
        'recent_items',
        'team_section',
        'countdown_section',
        'popular_items'
    ];
}
