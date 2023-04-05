<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'id',
		'name',
        'lastname',
        'phone',
        'email',
        'alias',
        'social_reason',
        'tax_situation',
        'source',
        'sale_commission',
        'rent_commission',
        'user_id',
        'status'
	];

    /**
     * Get all of the comments for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function address(): HasMany
    {
        return $this->hasMany(Address::class, 'foreign_key', 'local_key');
    }




}
