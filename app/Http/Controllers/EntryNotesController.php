<?php

namespace App\Http\Controllers;

use App\DataTables\EntryNotesDataTable;
use App\DataTables\InventoryDataTable;
use App\Models\EntryNotes;
use App\Models\Supplier;
use App\Models\Item;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EntryNotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(EntryNotesDataTable $datatable)
    {
        return $datatable->render('admin.entry.index');
    }

    public function create($id = null)
    {
        if (is_null($id))
        {
            $data = [
                "uuid_supplier" => Supplier::all()
            ];
        }
        else
        {
            $data = [
                "uuid_supplier" => $id
            ];
        }
        
        return view('admin.entry.form', $data);
    }

    public function store(Request $request)
    {
        $store = $request->validate([
            'uuid_supplier'     => 'required',
            'no_entry_note'     => 'required',
            'qty_entry_note'    => 'required|numeric',
            'total_entry_note'  => 'required|numeric',
            'status_entry_note' => 'required'
        ]);

        $entryNote = new EntryNotes;
        $entryNote->uuid_entry_note     = Uuid::uuid1()->getHex();
        $entryNote->no_entry_note       = $request->no_entry_note;
        $entryNote->date_entry_note     = $request->date_entry_note;
        $entryNote->qty_entry_note      = $request->qty_entry_note;
        $entryNote->total_entry_note    = $request->total_entry_note;
        $entryNote->status_entry_note   = $request->status_entry_note;
        $entryNote->uuid_supplier       = $request->uuid_supplier;
        $entryNote->id_user             = Auth::id();
        $entryNote->save();

        return redirect('admin/items/create/'.$entryNote->uuid_entry_note)->with('info', 'Entry Note has been created!');
    }

    public function show($id)
    {
        $entry_note = EntryNotes::findOrFail($id);
        $supplier   = Supplier::findOrFail($entry_note->uuid_supplier);
        $dt_item    = new InventoryDataTable();

        return $dt_item->render('admin.entry.detail', [
            "supplier"      => $supplier,
            "entry_note"    => $entry_note
        ]);
    }

    public function edit($id)
    {
        $entry_note   = EntryNotes::findOrFail($id);
        return view('admin.entry.form', [ 'entry_note' => $entry_note ]);
    }
}
