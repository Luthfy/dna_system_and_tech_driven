@extends('layouts.admin')

@section('title', 'DETAIL ITEM')

@section('content_header')
    <h1 class="h1">{{ $item->nm_item_inventory ?? '' }}</h1>
    <hr>
@stop

@section('content')

    @include('layouts.components.flash_message')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <img src="{{ asset(($item->picture_item_inventory == '' || $item->picture_item_inventory == null) ? 'images/entry_notes_dummy.png' : asset('storage/item_inventory/'.$item->picture_item_inventory) ) }}" alt="item picture" class="mt-1 round dummy">
                        <div class="col ml-3">
                            <table class="table mb-0">
                                <tr>
                                    <td><h5 class="h5">ID PRODUK</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5" id="uuid_entry_note_value">{{ $item->uuid_item_inventory }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="h5">Nama Produk</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5">{{ $item->nm_item_inventory }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="h5">Harga Jual</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5">{{ $item->selling_price_item_inventory }} {!! ($item->is_sold_out == 0) ? "<span class='text-success'>(ready)</span>" : "<span class='text-danger'>(out of stock)</span>" !!} </h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="h5">No Nota Masuk</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5"><a href="{!! route('entrynote.show', ['id' => $item->uuid_entry_note]) !!}">{{ $item->uuid_entry_note }}</a></h5></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <h5 class="h3">Keterangan Produk</h5> 
                    </div>
                    <div class="row mb-2">
                        <p class="p">{{ $item->notes_item_inventory }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        #inventory-table_info {
            display: inline-block;
        }
        #inventory-table_paginate {
            display: inline-block;
            float:right;
        }
        .dt-buttons {
            padding-left: 5px !important;
        }

        .dummy {
            box-shadow: 0px 0px 2px grey;
            height: 34vh;
            padding: 10px;
        }
    </style>
@stop

@section('js_datatables')
    
@stop
