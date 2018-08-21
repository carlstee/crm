<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'income'
    ];

    public function income()
    {
        return $this->belongsTo(TransIncome::class);
    }
}
