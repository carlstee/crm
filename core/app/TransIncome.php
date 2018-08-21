<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransIncome extends Model
{
    protected $table = 'trans_incomes';
    protected $fillable = [
        'date', 'income_id', 'amount', 'note'
    ];

    public function joinIncome()
    {
        return $this->hasOne(Income::class, 'id', 'income_id');
    }
}
