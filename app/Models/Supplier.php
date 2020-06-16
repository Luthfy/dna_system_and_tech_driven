<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'uuid_supplier';

    public $incrementing = false;

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'uuid_user');
    }

}
