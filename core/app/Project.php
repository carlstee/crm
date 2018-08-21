<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
      'project_name',
      'start_date',
      'end_date',
      'budget',
      'advance',
      'due',
      'description',
    ];

    public function project_file()
    {
        return $this->hasMany(ProjectFile::class, 'project_id', 'id');
    }
}
