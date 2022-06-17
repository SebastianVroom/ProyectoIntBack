<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorariosEmpleados extends Model
{
    use HasFactory;
    protected $fillable = [
        'empleadoId',
        'horarioId',
        'fecha'
    ];
}
