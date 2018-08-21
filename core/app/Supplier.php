<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
      'supplier_name',
      'supplier_mobile',
      'supplier_email',
      'supplier_address',
    ];

    public function item()
    {
        return $this->hasMany(SupplierItem::class, 'supplier_id', 'id');
    }

    public function supply_management()
    {
        return $this->belongsTo(SupplyManagment::class)->withDefault();
    }
}
