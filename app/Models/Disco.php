<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Disco
 *
 * @property $id
 * @property $nombre
 * @property $categoria
 * @property $cantante
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Disco extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'categoria' => 'required',
		'cantante' => 'required',
		'precio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','categoria','cantante','precio'];



}
