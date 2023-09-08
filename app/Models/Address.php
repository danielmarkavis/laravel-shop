<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'customer_address';

    protected $fillable = [
        'user_id',
        'street_address_1',
        'street_address_2',
        'town',
        'county',
        'postcode',
        'country'
    ];
}
