@extends('layouts.admin')

@section('title', 'Suppliers')

@section('content_header')
    <h1 class="h1">Supplier Management</h1>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.components.flash_message')
            <div class="card py-3">
                <div class="card-body">
                    <div class="table-responsive pb-3">{!! $dataTable->table() !!}</div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <style>
        #exitnotes-table_info {
            display: inline-block;
        }
        #exitnotes-table_paginate {
            display: inline-block;
            float:right;
        }
        .dt-buttons {
            padding-left: 5px !important;
        }
    </style>
@stop

@section('js_datatables')
    <script>
        function deleteSupplier(id)
        {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (confirm("anda yakin ingin menghapus supplier ini?"))
            {
                $.ajax({
                    type : "DELETE",
                    url : "supplier/"+id,
                    success : function(data, status) {
                        alert(data);
                        console.log(data)
                        location.reload()
                    },
                    error : function (xhr) {
                        alert('gagal dihapus')
                    }
                });
            }

            return null;
        }
    </script>
    {!! $dataTable->scripts() !!}
@stop
