<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
		'categoria' => 'required',
		'cantante' => 'required',
		'precio' => 'required',
    'archivo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','categoria','cantante','precio','archivo'];



}
