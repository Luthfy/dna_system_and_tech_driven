<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id_category';

    public $incrementing = false;

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
