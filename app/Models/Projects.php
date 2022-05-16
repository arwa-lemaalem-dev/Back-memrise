<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_project', 'deadline', 'logo', 'url', 'status', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function task()
    {
        return $this->hasOne(Tasks::class,  'project_id', 'id')->where('current_task', 1);
    }
}