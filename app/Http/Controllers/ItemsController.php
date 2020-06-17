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
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

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

        if (count($data["entry_notes"]) < 1)
        {
            return redirect('admin/entry-note')->with('warning', 'you dont have entry notes');
        }

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

        if ($request->hasFile('picture_item_inventory'))
        {
            $image      = $request->file('picture_item_inventory');
            $filename   = time().'.'.$image->getClientOriginalExtension();

            $img        = Image::make($image->getRealPath());

            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream();

            Storage::disk('local')->put('public/item_inventory/'.$filename, $img, 'public');
        }

        for ($i=0; $i < ($request->stock_price_item_inventory ?? 1); $i++) { 
            Item::create([
                'uuid_item_inventory'           => Uuid::uuid1()->getHex()->toString(),
                'nm_item_inventory'             => $request->nm_item_inventory,
                'cap_price_item_inventory'      => $request->cap_price_item_inventory,
                'selling_price_item_inventory'  => $request->selling_price_item_inventory,
                'id_category'                   => $request->id_category,
                'uuid_entry_note'               => $request->uuid_entry_note,
                'id_user'                       => Auth::id(),
                'notes_item_inventory'          => $request->notes_item_inventory,
                'picture_item_inventory'        => ($request->file('picture_item_inventory') == null) ? null : $filename 
            ]);
        };

        return redirect()->back()->with('info', $request->nm_item_inventory." has been added! ")->with(['link_action' => 'admin/items']);
    }

    public function show($id)
    {
        $item = Item::find($id);
        return view('admin.inventory.detail', ["item" => $item]);
    }

    public function edit($id)
    {
        $data['item']       = Item::findOrFail($id);
        $data["categories"] = Category::select('id_category', 'name_category')->get();

        return view('admin.item.form', $data);
    }

    public function update(Request $request, $id)
    {
        $store = $request->validate([
            'uuid_entry_note'       => 'required',
            'id_category'           => 'required'
        ]);
        
        $item = Item::find($id);
        $item->nm_item_inventory            = $request->nm_item_inventory;
        $item->cap_price_item_inventory     = $request->cap_price_item_inventory;
        $item->selling_price_item_inventory = $request->selling_price_item_inventory;
        $item->id_category                  = $request->id_category;
        $item->id_user                      = Auth::id();
        $item->notes_item_inventory         = $request->notes_item_inventory;

        if ($request->hasFile('picture_item_inventory'))
        {
            $image      = $request->file('picture_item_inventory');
            $filename   = time().'.'.$image->getClientOriginalExtension();

            $img        = Image::make($image->getRealPath());

            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream();

            Storage::disk('local')->put('public/item_inventory/'.$filename, $img, 'public');

            $item->picture_item_inventory = $filename;   
        }

        $item->save();

        return redirect('admin/inventory/'.$id)->with('info', $request->nm_item_inventory." has been updated! ");
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
