<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id', 'id');
    }

    //RELACION MUCHOS A MUCHOS
    public function users(){
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }
}
