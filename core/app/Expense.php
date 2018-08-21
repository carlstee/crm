<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'expense'
    ];


    public function trans(){
        return $this->belongsTo(TransExpense::class);
    }

}
