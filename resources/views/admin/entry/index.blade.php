@extends('layouts.admin')

@section('title', 'ENTRY NOTES')

@section('content_header')
    <h1 class="h1">ENTRY NOTES MANAGEMENT</h1>
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
<script>
    function deleteEntryNote(id)
    {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (confirm("anda yakin ingin menghapus nota masuk ini?"))
        {
            $.ajax({
                type : "DELETE",
                url : "entry-note/"+id,
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
