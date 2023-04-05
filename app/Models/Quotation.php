<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $table = 'quotation';

    protected $fillable = [
        'id',
        'Contact_details',
        'TypeRequi',
        'TypeShipping',
        'note',
        'user_id',
        'customer_id',
        'status'
	];
}
