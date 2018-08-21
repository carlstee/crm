<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $table = 'knowledge';
    protected $fillable = [
        'category_id',
        'title',
        'detail',
    ];

    public function know_category()
    {
        return $this->hasOne(KnowledgeCategory::class, 'id', 'category_id')->withDefault();
    }
}
