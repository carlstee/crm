<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'last_name', 'email'
    ];

    public function number()
    {
        return $this->hasMany(ContactNumber::class, 'contact_id', 'id');
    }
}
