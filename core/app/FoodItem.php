<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $fillable = ['package_id','item'];

    public function food_meal()
    {
        return $this->belongsTo(FoodMill::class)->withDefault();
    }
}
