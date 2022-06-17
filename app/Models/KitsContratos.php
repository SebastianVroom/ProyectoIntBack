<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitsContratos extends Model
{
    use HasFactory;
    protected $fillable = [
        'contratoId',
        'kitId'
    ];
}
