<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ExitNote extends Model
{
    use Notifiable;
    
    protected $primaryKey = 'uuid_exit_note';

    public $incrementing = false;

    protected $fillable = [
        "uuid_exit_note",
        "date_exit_note",
        "status_exit_note",
        "total_exit_note",
        "uuid_customer",
        "id_user"
    ];

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'uuid_customer', 'uuid_customer');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }


}
