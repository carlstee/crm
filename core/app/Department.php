<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function designation()
    {
        return $this->hasMany(Designation::class, 'dept_id', 'id');
    }
}
