<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_withdrawa extends Model
{
    use HasFactory;

    protected $table = 'customer_withdrawa';

    protected $fillable = [
        'id',
        'day_delay',
        'debit',
        'user_id',
        'customer_id',
        'status'
	];
}
