<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register'=>false
    ]
);

Route::group(['prefix' => 'admin'], function () {

    /* ROUTE DASHBOARD */
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');

    /* ROUTE SUPPLIER */
    Route::resource('/supplier', 'SuppliersController')->names('supplier');

    /* ROUTE ENTRY NOTE */
    Route::get('/entry-note', 'EntryNotesController@index')->name('entrynote');
    Route::get('/entry-note/create/{id_supplier?}', 'EntryNotesController@create')->name('entrynote.create');
    Route::get('entry-note/{id}', 'EntryNotesController@show')->name('entrynote.show');
    Route::get('entry-note/{id}/edit', 'EntryNotesController@edit')->name('entrynote.edit');
    Route::post('/entry-note', 'EntryNotesController@store')->name('entrynote.store');
    Route::put('/entry-note/{id}', 'EntryNotesController@update')->name('entrynote.update');
    Route::delete('/entry-note/{id}', 'EntryNotesController@destroy')->name('entrynote.destroy');

    /* ROUTE ITEM ITEMS */
    Route::get('/items', 'ItemsController@index')->name('item');
    Route::get('/items/create/{id?}', 'ItemsController@create')->name('item.create');
    Route::get('/items/get_item_list', 'ItemsController@getItem')->name('item.list');
    Route::post('/items', 'ItemsController@store')->name('item.store');

    /* ROUTE ITEM INVENTORY */
    Route::get('/inventory', 'ItemsController@inventory')->name('inventory');
    Route::get('/inventory/{id}', 'ItemsController@show')->name('item.show');
    Route::get('/inventory/{id}/edit', 'ItemsController@edit')->name('item.edit');
    Route::put('/inventory/{id}', 'ItemsController@update')->name('item.update');

    /* ROUTE CATEGORY */
    Route::resource('/category', 'CategoryController')->names('category');

    /* ROUTE CUSTOMER */
    Route::get('/customer/get_customer_list', 'CustomersController@getCustomer')->name('customers.list');
    Route::resource('/customer', 'CustomersController')->names('customers');

    /* ROUTE TRANSACTION */
    Route::resource('/transaction', 'ExitNotesController')->names('transaction');

    /* ROUTE GENERATE PDF */
    Route::get('generate-pdf/exit_note/{id}', 'PDFController@generate_exit_note')->name('pdf.exitnote');
    
});


