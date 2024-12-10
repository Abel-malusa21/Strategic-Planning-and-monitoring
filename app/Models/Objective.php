<?php

// app/Models/Objective.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $fillable = ['strategic_area_id', 'name', 'description'];

    // Relationship with StrategicArea
    public function strategicArea()
    {
        return $this->belongsTo(StrategicArea::class);
    }
}

