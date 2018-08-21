<?php


namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'employees';

    protected $fillable = [
        'image',
        'name',
        'f_name',
        'b_date',
        'gender',
        'phone',
        'local_add',
        'per_add',
        'email',
        'password',
        'employee_id',
        'dept_id',
        'deg_id',
        'date',
        'salary',
        'ac_name',
        'ac_num',
        'bank_name',
        'code',
        'pan_num',
        'branch',
        'resume',
        'offer_letter',
        'join_letter',
        'con_letter',
        'proof'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class)->withDefault();
    }

    public function office_loan()
    {
        return $this->belongsTo(OfficeLoan::class)->withDefault();
    }
}
