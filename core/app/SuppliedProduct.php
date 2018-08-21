<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuppliedProduct extends Model
{
    protected $fillable = [
        'item_id',
        'service_price',
        'service_quantity',
        'service_amount',
        'supplier_id',
        'invoice_id',
        'supply_table_id',
        'form_date',
        'to_date',
    ];

    public function supply_management()
    {
        return $this->belongsTo(SupplyManagment::class);
    }

    public function item()
    {
        return $this->hasOne(SupplierItem::class, 'id', 'item_id')->withDefault();
    }


}
