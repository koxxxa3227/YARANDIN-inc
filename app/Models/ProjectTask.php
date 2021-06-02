<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProjectTask extends Model
{
    const STATUS_DONE = 1;
    const STATUS_IN_PROCESS = 2;
    const STATUS_NEW = 3;

    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function file(){
        return $this->hasOne(ProjectTaskFile::class);
    }

    public function getMeAuthorAttribute()
    {
        return $this->project->user_id == Auth::id();
    }
}
