<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    public function transactions(){

        return $this->hasMany('App\Transaction','account_id','id');
    }

    protected $fillable = [
        'name'
    ];
}
