@extends('layouts.admin')

@section('title', 'CATEGORY')

@section('content_header')
    <h1 class="h1">Add Category</h1>
    <hr>
@stop


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.components.flash_message')
            <div class="card">

                <div class="card-body">

                    {!! Form::open(['url'=>'admin/category']) !!}
                        <div class="form-group">
                            {!! Form::label('id_category', 'ID Kategori') !!}
                            {!! Form::text('id_category', null, ['placeholder'=>'ID Kategori', 'class'=>'form-control', 'maxlength'=>'3', 'required'=>true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name_category', 'Nama Kategori') !!}
                            {!! Form::text('name_category', null, ['placeholder'=>'Nama Kategori', 'class'=>'form-control', 'required'=>true]) !!}
                        </div>
                        <div class="form-group text-right">
                            {!! Form::submit('Save New Category', ['class'=>'btn btn-primary']) !!}
                            <button type="reset" class="btn btn-danger">Reset and Cancel</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>

    </style>
@stop

@section('js_datatables')
    
@stop
