<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\EntryNotes;
use App\DataTables\InventoryDataTable;
use App\DataTables\ItemsDataTable;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ItemsDataTable $datatable)
    {
        return $datatable->render('admin.item.index');
    }

    public function create($uuid_entry_note = '')
    {
        
        $entry = ($uuid_entry_note == '') ? EntryNotes::query()->get() : EntryNotes::query()->where('uuid_entry_note',$uuid_entry_note)->get();

        $data["entry_notes"] = $entry;

        $data["categories"] = Category::select('id_category', 'name_category')->get();

        if (count($data["categories"]) < 1)
        {
            return redirect('admin/category')->with('warning', 'you dont have category');
        }

        return view('admin.item.form', $data);
    }

    public function store(Request $request)
    {
        $store = $request->validate([
            'uuid_entry_note'       => 'required',
            'nm_item_inventory'     => 'required',
            'id_category'           => 'required'
        ]);

        for ($i=0; $i < ($request->stock_price_item_inventory ?? 1); $i++) { 
            Item::create([
                'uuid_item_inventory'           => Uuid::uuid1()->getHex()->toString(),
                'nm_item_inventory'             => $request->nm_item_inventory,
                'cap_price_item_inventory'      => $request->cap_price_item_inventory,
                'selling_price_item_inventory'  => $request->selling_price_item_inventory,
                'id_category'                   => $request->id_category,
                'uuid_entry_note'               => $request->uuid_entry_note,
                'id_user'                       => Auth::id(),
                'picture_item_inventory'        => $request->picture_item_inventory
            ]);
        };

        return redirect()->back()->with('info', $request->nm_item_inventory." has been added! ")->with(['link_action' => 'admin/items']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function inventory(InventoryDataTable $datatable)
    {
        return $datatable->render('admin.inventory.index');
    }

    public function getItem()
    {
        return Item::select('uuid_item_inventory', 'nm_item_inventory', 'selling_price_item_inventory')->where('is_sold_out', 0)->get()->toJson();
    }
}
