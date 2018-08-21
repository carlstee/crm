<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierItem extends Model
{
    protected $fillable = [
      'supplier_id' , 'item'
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class)->withDefault();
    }

    public function supplied_product()
    {
        return $this->belongsTo(SuppliedProduct::class)->withDefault();
    }
}
