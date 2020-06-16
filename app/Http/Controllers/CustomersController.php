<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\DataTables\CustomersDataTable;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(CustomersDataTable $dataTable)
    {
        return $dataTable->render("admin.customer.index");
    }

    public function create()
    {
        return view('admin.customer.form');
    }

    public function store(Request $request)
    {
        $store = $request->validate([
            'nm_customer' => 'required'
        ]);

        $customer = new Customer;
        $customer->uuid_customer    = Uuid::uuid1()->getHex()->toString();
        $customer->nm_customer      = $request->nm_customer;
        $customer->address_customer = $request->address_customer;
        $customer->phone_customer   = $request->phone_customer;
        $customer->remember_token   = Str::random(10);
        $customer->id_user          = Auth::id();
        $customer->save();

        return redirect('admin/customer')->with('info', $request->nm_customer.' has been added as customer!');
        
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

    public function getCustomer()
    {
        return Customer::select()->get()->toJson();
    }
}
