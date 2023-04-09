<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigosLogin extends Model
{
    public $timestamps = false;
    protected $primaryKey = null;
     public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigomail',
        'codigomail_verified_at',
        'codigomail_created_at',
        'user_id',
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
        'codigomail_verified_at' => 'datetime',
        'codigomail_created_at' => 'datetime',
    ];
}
