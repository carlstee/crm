<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalePoint extends Model
{
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->hasOne(Cutomer::class, 'id', 'customer_id');
    }
    public function warehouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'warehouse_id');
    }
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
