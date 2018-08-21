<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'employee_id',
        'attend',
        'salary',
        'from_date',
        'to_date'
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'employee_id', 'employee_id')->withDefault();
    }
}
