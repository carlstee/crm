<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'bank_name',
        'account_number',
        'branch_name',
        'swift_code',
    ];

    public function bank_trans()
    {
        return $this->belongsTo(BankTransaction::class)->withDefault();
    }

    public function expense_trans()
    {
        return $this->belongsTo(ExpanceTransaction::class)->withDefault();
    }
}
