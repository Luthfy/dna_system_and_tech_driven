<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sum_supplier = Supplier::all()->count();
        $sum_customer = Customer::all()->count();
        $sum_product  = Item::all()->count();
        $sum_stock    = Item::where('is_sold_out', 0)->count();
        $sum_is_sold_out = Item::where('is_sold_out', 1)->count();

        $data = [
            "total_supplier" => $sum_supplier,
            "total_customer" => $sum_customer,
            "total_product"  => $sum_product,
            "total_stock"    => $sum_stock,
            "total_sold_out" => $sum_is_sold_out
        ];
        
        return view('home', $data);
    }
}
