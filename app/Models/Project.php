<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;

    public function tasks(){
        return $this->hasMany(ProjectTask::class, 'project_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getMeAuthorAttribute(){
        return $this->user_id == Auth::id();
    }
}
