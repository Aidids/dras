<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'faculty_id',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
