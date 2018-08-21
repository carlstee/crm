<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgeCategory extends Model
{
    protected $table = 'knowledge_categories';
    protected $fillable = [
        'name'
    ];

    public function income()
    {
        return $this->belongsTo(Knowledge::class)->withDefault();
    }
}
