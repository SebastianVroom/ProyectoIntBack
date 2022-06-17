<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosKits extends Model
{
    use HasFactory;
    protected $fillable = [
        'servicioId',
        'kitId',
        'numCitas'
    ];
}
