<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeDetail extends Model
{
    protected $fillable = [
         'office_name', 'owner_name', 'phone', 'email','location',
    ];

    public function catering()
    {
        return $this->belongsTo(Catering::class)->withDefault();
    }
}
