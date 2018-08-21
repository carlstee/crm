<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table= "sub_categories";
    protected $fillable =['name','categories_id','icon'];
}
