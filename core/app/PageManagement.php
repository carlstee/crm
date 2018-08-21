<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageManagement extends Model
{
    protected $table = "page_managements";
    protected $fillable = ['name','content'];
}
