<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntryNotes extends Model
{

    protected $primaryKey = 'uuid_entry_note';

    public $incrementing = false;

    public function supplier()
    {
        return $this->hasOne('App\Models\Supplier', 'uuid_supplier', 'uuid_supplier');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }

}
