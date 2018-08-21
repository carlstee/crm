<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table ='transactions';

    protected $fillable = [
      'account_id', 'tr_type', 'amount', 'note'
    ];

    public function account(){

        return $this->belongsTo('App\Account','id');
    }
}
