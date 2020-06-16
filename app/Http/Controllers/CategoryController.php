<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\DataTables\CategoriesDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(CategoriesDataTable $datatable)
    {
        return $datatable->render('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.form');
    }

    public function store(Request $request)
    {
        $store = $request->validate([
            'id_category' => 'required|unique:categories,id_category|max:3',
            'name_category' => 'required'
        ]);

        $category = new Category;
        $category->id_category      = $request->id_category;
        $category->name_category    = $request->name_category;
        $category->id_user          = Auth::id();
        $category->save();

        return redirect('admin/category')->with('info', $category->name_category." has been added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
