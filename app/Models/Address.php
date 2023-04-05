<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'id',
        'street',
        'cologne',
        'outdoor_number',
        'interior_number',
        'city',
        'state',
        'contact',
        'postal_code',
        'reference',
        'phone_contact',
        'customer_id',
        'status'
	];

    /**
     * Get the user that owns the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'foreign_key', 'other_key');
    }

}
