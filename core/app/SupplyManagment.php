<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyManagment extends Model
{
    protected  $fillable = [
        'supplier_id',
        'status',
        'status',
        'form_date',
        'to_date',
        'total_amount',
    ];

    public function supplied_product()
    {
        return $this->hasMany(SuppliedProduct::class, 'supply_table_id', 'id');
    }
    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id')->withDefault();
    }
}
