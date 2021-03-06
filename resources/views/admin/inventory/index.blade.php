@extends('layouts.admin')

@section('title', 'ITEM INVENTARIES')

@section('content_header')
    <h1 class="h1">ITEM INVENTARIES MANAGEMENT</h1>
    <hr>
@stop

@section('content')

    @include('layouts.components.flash_message')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
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
