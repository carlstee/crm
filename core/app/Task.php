<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'employee_name',
        'employee_Id',
        'task_name',
        'description',
        'start_date',
        'end_date',
    ];
}
