<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'customer_id', 'document', 'detail'
    ];
    public function customer()
    {
        return $this->hasOne(Cutomer::class, 'id', 'customer_id');
    }
}
