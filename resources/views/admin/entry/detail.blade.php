@extends('layouts.admin')

@section('title', 'DETAIL ENTRY NOTES')

@section('content_header')
    <h1 class="h1">ENTRY NOTES DETAIL {{ strtoupper($supplier->name_supplier) }} [ {{ strtoupper($entry_note->no_entry_note) }} ]</h1>
    <hr>
@stop

@section('content')

    @include('layouts.components.flash_message')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <img src="{{ asset(($entry_note->picture_entry_note == '' || $entry_note->picture_entry_note == null) ? 'images/entry_notes_dummy.png' : 'storage/nota_masuk/'.$entry_note->picture_entry_note ) }}" alt="entry notes picture" class="mt-1 round dummy">
                        <div class="col ml-3">
                            <table class="table mb-0">
                                <tr>
                                    <td><h5 class="h5">ID NOTA MASUK</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5" id="uuid_entry_note_value">{{ $entry_note->uuid_entry_note }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="h5">Nomor Nota Masuk</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5">{{ $entry_note->no_entry_note }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="h5">Kuantitas Barang</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5">{{ $entry_note->qty_entry_note }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="h5">Total Pembelian</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5">{{ $entry_note->total_entry_note }} {!! ($entry_note->status_entry_note == 'L') ? "<span class='badge badge-success'>Lunas</span>" : "<span class='badge badge-warning'>Hutang</span>" !!}</h5></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Inventaris Barang</div>
                <div class="card-body">
                    <div class="table-responsive pb-3">{!! $dataTable->table() !!}</div>
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
    {!! $dataTable->scripts() !!}
@stop
