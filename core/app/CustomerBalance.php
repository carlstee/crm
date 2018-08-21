<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBalance extends Model
{
    protected $fillable = ['customer_id', 'amount', 'note'];

    public function customer()
    {
        return $this->hasOne(Cutomer::class,'id', 'customer_id')->withDefault();
    }
}
