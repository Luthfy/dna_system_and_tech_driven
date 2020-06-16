@extends('layouts.admin')

@section('title', 'Suppliers')

@section('content_header')
    <h1 class="h1">SUPPLIER : {{ strtoupper($name_supplier) }}</h1>
    <hr>
@stop

@section('content')

    @include('layouts.components.flash_message')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <img src="{{ asset("images/shop_dummy.png") }}" alt="shop picture" class="mt-1 round dummy">
                        <div class="col ml-3">
                            <table class="table mb-0">
                                <tr>
                                    <td><h5 class="h5">ID Member</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5" id="uuid_supplier_value">{{ $uuid_supplier }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="h5">Nama Supplier</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5">{{ ucwords($name_supplier) }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="h5">Alamat Supplier</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5">{{ $address_supplier }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="h5">Telphone</h5></td>
                                    <td><h5 class="h5">:</h5></td>
                                    <td><h5 class="h5">{{ $phone_supplier }}</h5></td>
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
                <div class="card-header">Daftar Nota Masuk</div>
                <div class="card-body">

                    <div class="table-responsive pb-3">{!! $dataTable->table() !!}</div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        #entry_notes_table_info {
            display: inline-block;
        }
        #entry_notes_table_paginate {
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
