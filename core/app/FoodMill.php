<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodMill extends Model
{
    protected $fillable = ['shift_id', 'package_name', 'package_price'];

    public function shift()
    {
        return $this->hasOne(FoodShift::class,'id', 'shift_id')->withDefault();
    }

    public function food_item()
    {
        return $this->hasMany(FoodItem::class, 'package_id', 'id');
    }

    public function catering()
    {
        return $this->belongsTo(Catering::class)->withDefault();
    }
}
