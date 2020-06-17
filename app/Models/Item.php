<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{

    protected $table = 'item_inventories';

    protected $primaryKey = 'uuid_item_inventory';

    public $incrementing = false;

    protected $fillable = [
        'uuid_item_inventory',
        'nm_item_inventory',
        'cap_price_item_inventory',
        'selling_price_item_inventory',
        'id_category',
        'uuid_entry_note',
        'id_user',
        'notes_item_inventory',
        'picture_item_inventory'
    ];

    public function get_item_with_stock()
    {
        return $this->select(
            'nm_item_inventory',
            'selling_price_item_inventory',
            DB::raw('count(nm_item_inventory) as stock')
        )
        ->distinct('nm_item_inventory')
        ->groupBy('nm_item_inventory')
        ->groupBy('selling_price_item_inventory');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id_category', 'id_category');
    }

    
}
