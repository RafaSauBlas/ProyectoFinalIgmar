<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'id',
        'article',
        'color',
        'scent',
        'price',
        'discount',
        'total',
        'note',
        'req_id',
        'quotation_id',
        'status'
	];
}
