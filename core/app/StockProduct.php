<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model
{
    protected $fillable = ['product_id', 'quantity', 'warehouse_id'];

    public function warehouse()
    {
        return $this->hasOne(Warehouse::class,'id', 'warehouse_id')->withDefault();
    }
    public function product()
    {
        return $this->hasOne(Product::class,'id', 'product_id')->withDefault();
    }
}
