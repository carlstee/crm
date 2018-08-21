<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cutomer extends Authenticatable
{
    use Notifiable;

    protected $table= 'cutomers';

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'password',
        'address',
        'include_word'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customer_balance()
    {
        return $this->belongsTo(CustomerBalance::class)->withDefault();
    }

    public function sale_point()
    {
        return $this->belongsTo(SalePoint::class)->withDefault();
    }

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
