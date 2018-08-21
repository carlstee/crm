<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    protected $fillable =
        [
          'comapany_id', 'package_id', 'quantity',
            'date', 'invoice_id', 'payment', 'description','due_amount'
        ];

    public function company()
    {
        return $this->hasOne(OfficeDetail::class,'id', 'comapany_id')->withDefault();
    }

    public function package()
    {
        return $this->hasOne(FoodMill::class,'id', 'package_id')->withDefault();
    }
}
