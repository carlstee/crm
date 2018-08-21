<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'ticket',
        'subject',
        'detail',
        'customer_id',
        'status',
    ];

    public function ticket_comment()
    {
        return $this->hasMany(TicketComment::class, 'ticket_id', 'ticket');
    }

    public function customer()
    {
        return $this->hasOne(Cutomer::class, 'id', 'customer_id')->withDefault();
    }
}
