<?php

namespace App\Http\Controllers;

use App\Models\ExitNote;
use App\Models\DetailExitNote;
use App\Models\Customer;
use App\Models\Item;
use App\Notifications\NewTransactionNotify;
use App\DataTables\ExitNotesDataTable;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class ExitNotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ExitNotesDataTable $datatable)
    {
        return $datatable->render('admin.transaction.index');
    }

    public function create()
    {
        $id_nota    = Uuid::uuid1()->getHex();

        return view('admin.transaction.form', [
            "id_nota"   => $id_nota,
        ]);
    }

    public function store(Request $request)
    {
        $store = $request->validate([
            'uuid_exit_note'    => 'required',
            'nm_customer'       => 'required',
            'date_exit_note'    => 'required',
            'status_exit_note'  => 'required',
            'total_exit_note'   => 'required|numeric'
        ]);

        $idCustomer = Customer::select('uuid_customer')->where('remember_token', '=', $request->nm_customer)->first();

        if ($idCustomer == null)
        {
            $customer = new Customer;
            $customer->uuid_customer    = Uuid::uuid1()->getHex()->toString();
            $customer->nm_customer      = $request->nm_customer;
            $customer->remember_token   = Str::random(10);
            $customer->id_user          = Auth::id();
            $customer->save();

            $idCustomer = $customer;
        }

        $dataExitNote = [
            "uuid_exit_note"    => $request->uuid_exit_note,
            "date_exit_note"    => $request->date_exit_note,
            "total_exit_note"   => $request->total_exit_note,
            "status_exit_note"  => $request->status_exit_note,
            "uuid_customer"     => $idCustomer->uuid_customer,
            "id_user"           => Auth::id()
        ];

        $insertExitNote     = ExitNote::create($dataExitNote);
        $detail_exit_note   = json_decode($request->detail_exit_note);

        $uuidItem = array();
        foreach ($detail_exit_note as $key => $item)
        {
            array_push($uuidItem, $item->uuid_item_inventory);
        }

        $item = Item::find($uuidItem);
        
        foreach ($item as $key => $i)
        {
            $detail = new DetailExitNote;
            $detail->uuid_detail_exit_note  = Uuid::uuid1()->getHex();
            $detail->uuid_exit_note         = $dataExitNote["uuid_exit_note"];
            $detail->uuid_item_inventory    = $i->uuid_item_inventory;
            $detail->cap_price_exit_notes   = $i->cap_price_item_inventory;
            $detail->sell_price_exit_notes  = $i->selling_price_item_inventory;
            $detail->id_user = Auth::id();
            $detail->save();
            
            $i->is_sold_out = 1;
            $i->save();
        }

        $ExitNote = ExitNote::find($dataExitNote["uuid_exit_note"]);
        $ExitNote->notify(new NewTransactionNotify());

        return response()->json([
            "status" => "success",
            "message" => $ExitNote
        ], 201);
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

    

}
