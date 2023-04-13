<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticiones extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'usuario_id',
        'accion',
        'fechasolicita',
        'aprobada',
        'fechaaprueba',
        'usuario_autoriza',
    ];
}
