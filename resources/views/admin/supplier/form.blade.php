@extends('layouts.admin')

@section('title', 'SUPPLIERS')

@section('content_header')
    <h1 class="h1">Form Add Supplier</h1>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.components.flash_message')
            <div class="card">
                <div class="card-body">

                    @if (($supplier ?? '') == '')
                        {!! Form::open(['url' => 'admin/supplier', 'method' => 'post']) !!}
                    @else
                        {!! Form::model($supplier, ['url'=>'admin/supplier/'.$supplier->uuid_supplier, 'method' => 'PUT']) !!}    
                    @endif
                    
                    <div class="form-group">
                        {!! Form::label('nm_supplier', 'Nama Supplier') !!}
                        {!! Form::text('name_supplier', null, ['class'=>'form-control', 'placeholder'=>'Nama Supplier']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address_supplier', 'Alamat Supplier') !!}
                        {!! Form::textarea('address_supplier', null, ['class'=>'form-control','rows'=>'3', 'placeholder'=>'Alamat Supplier']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone_supplier', 'Phone Supplier') !!}
                        {!! Form::text('phone_supplier', null, ['class'=>'form-control', 'placeholder'=>'Telephone']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit('Simpan Data Supplier', ['class'=>'btn btn-primary']) !!}
                        <input type="reset" value="Reset" class="btn btn-danger">
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop