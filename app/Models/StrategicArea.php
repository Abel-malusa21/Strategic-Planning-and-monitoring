<?php
// app/Models/StrategicArea.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategicArea extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
    public function objectives()
{
    return $this->hasMany(Objective::class);
}
}
