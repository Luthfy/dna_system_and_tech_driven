<?php

namespace App\Http\Controllers;

use App\DataTables\EntryNotesDataTable;
use App\DataTables\SuppliersDataTable;
use App\Models\EntryNotes;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(SuppliersDataTable $dataTable)
    {
        return $dataTable->render('admin.supplier.index');
    }

    public function create()
    {
        return view('admin.supplier.form');
    }

    public function store(Request $request)
    {
        $store = $request->validate([
            'name_supplier' => 'required|unique:suppliers',
        ]);

        $supplier = new Supplier;
        $supplier->uuid_supplier    = Uuid::uuid1()->getHex();
        $supplier->name_supplier    = $request->name_supplier;
        $supplier->address_supplier = $request->address_supplier;
        $supplier->phone_supplier   = $request->phone_supplier;
        $supplier->uuid_user        = Auth::id();
        $supplier->save();

        return redirect('admin/supplier/'.$supplier->uuid_supplier)->with('info', $supplier->name_supplier.' has been saved!');
    }

    public function show($id)
    {
        $supplier   = Supplier::findOrFail($id);
        $dataTable  = new EntryNotesDataTable();
        return $dataTable->with('uuid_supplier', $id)->render('admin.supplier.detail', $supplier);
    }

    public function edit($id)
    {
        $supplier   = Supplier::findOrFail($id);
        return view('admin.supplier.form', [ 'supplier' => $supplier ]);
    }

    public function update(Request $request, $id)
    {
        $store = $request->validate([
            'name_supplier' => 'required|unique:suppliers',
        ]);

        $supplier = Supplier::find($id);
        $supplier->name_supplier    = $request->name_supplier;
        $supplier->address_supplier = $request->address_supplier;
        $supplier->phone_supplier   = $request->phone_supplier;
        $supplier->save();

        return redirect('admin/supplier')->with('info', $supplier->name_supplier.' has been updated!');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if ($supplier->delete())
        {
            return "supplier has been deleted!";
        }
        else
        {
            return "supplier has failed to delete!";
        }
    }
}
