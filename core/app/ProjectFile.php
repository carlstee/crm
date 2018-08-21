<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $fillable = [
        'project_id', 'file'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
