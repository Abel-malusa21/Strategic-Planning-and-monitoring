<?php

// app/Models/Scorecard.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scorecard extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'workplan_id',
        'activity_name',
        'progress_q1', // Q1 Progress
        'progress_q2', // Q2 Progress
        'progress_q3', // Q3 Progress
        'progress_q4', // Q4 Progress
        'budgeted_amount',
        'actual_spent',
        'source_of_funds', // Source of Funds
        'comments', // Comments/Assumptions
    ];

    /**
     * Relationship with Workplan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workplan()
    {
        return $this->belongsTo(Workplan::class);
    }
}
