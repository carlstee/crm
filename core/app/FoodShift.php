<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodShift extends Model
{
    protected $fillable = ['shift_name', 'time'];

    public function meal()
    {
        return $this->belongsTo(FoodMill::class)->withDefault();
    }
}
