<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'nm_customer',
        'address_customer',
        'phone_customer',
        'id_user'
    ];
}
