@extends('layouts.admin')

@section('title', 'CATEGORY')

@section('content_header')
    <h1 class="h1">Category Management</h1>
    <hr>
@stop


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('layouts.components.flash_message')
            
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
        #customer_table_info {
            display: inline-block;
        }
        #customer_table_paginate {
            display: inline-block;
            float:right;
        }
        .dt-buttons {
            padding-left: 5px !important;
        }
    </style>
@stop

@section('js_datatables')
    {!! $dataTable->scripts() !!}
@stop
