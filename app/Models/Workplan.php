<?php

// app/Models/Workplan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workplan extends Model
{
    use HasFactory;

    protected $fillable = ['objective_id', 'department', 'activity', 'quarter', 'due_date', 'budget'];

    // Relationship with Objective
    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    // app/Models/Objective.php
    public function workplans()
    {
        return $this->hasMany(Workplan::class);
    }

    // app/Models/Workplan.php
    public function scorecards()
    {
        return $this->hasMany(Scorecard::class);
    }

}
