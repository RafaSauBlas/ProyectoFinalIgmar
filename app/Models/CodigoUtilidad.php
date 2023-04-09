<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoUtilidad extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = null;
     public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'codigo_created_at',
        'codigo_verified_at',
        'funcion',
        'user_id',
        'user_crea_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'codigo_created_at',
        'codigo_verified_at',
    ];
}
