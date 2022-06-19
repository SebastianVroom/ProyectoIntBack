<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contratoHabitaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'habitacionId',
        'contratoId'
    ];
}
