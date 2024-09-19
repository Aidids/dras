<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldExpertise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'parent_id', // be null if it is the parent
    ];

    public function parent()
    {
        return $this->belongsTo(FieldExpertise::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(FieldExpertise::class, 'parent_id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
