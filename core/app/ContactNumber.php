<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactNumber extends Model
{
    protected $fillable = [
      'contact_id',
      'number',
    ];
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
