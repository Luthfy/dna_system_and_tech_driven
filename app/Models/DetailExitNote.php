<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailExitNote extends Model
{
    protected $primaryKey = 'uuid_detail_exit_note';

    public $incrementing = false;

    protected $fillable = [
        "uuid_detail_exit_note",
        "uuid_exit_note",
        "uuid_item_inventory",
        "cap_price_exit_notes",
        "sell_price_exit_notes",
        "id_user"
    ];

    public function item()
    {
        return $this->hasOne('App\Models\Item', 'uuid_item_inventory', 'uuid_item_inventory');
    }
}
