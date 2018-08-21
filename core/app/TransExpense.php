<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransExpense extends Model
{
    protected $table ='trans_expenses';
    protected $fillable = [
        'date', 'expense_id', 'amount', 'note'
    ];

    public function expense(){

        return $this->hasOne(Expense::class, 'id', 'expense_id');

    }




}
