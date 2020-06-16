@extends('layouts.admin')

@section('title', 'CUSTOMER ADD')

@section('content_header')
    <h1 class="h1">Form Customer</h1>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.components.flash_message')
            <div class="card">
                <div class="card-body">

                    @if (($customer_id->uuid_entry_note ?? '') == '')
                        {!! Form::open(['url' => 'admin/customer', 'method' => 'post', 'files'=>'true']) !!}
                    @else
                        {!! Form::model($customer, ['url'=>'admin/customer/'.$customer_id->uuid_customer, 'method' => 'PUT']) !!}    
                    @endif

                    <div class="form-group">
                        {!! Form::label('nm_customer', 'Nama Pelanggan') !!}
                        {!! Form::text('nm_customer', null, ['class'=>'form-control', 'placeholder'=>'Nama Pelanggan', 'required'=>true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address_customer', 'Alamat Pelanggan') !!}
                        {!! Form::textarea('address_customer', null, ['class'=>'form-control', 'placeholder'=>'Alamat Pelanggan', 'rows'=>3]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone_customer', 'No Hp Pelanggan') !!}
                        {!! Form::text('phone_customer', null, ['class'=>'form-control', 'placeholder'=>'No HP Pelanggan']) !!}
                    </div>
                    
                    <div class="form-group text-right">
                        {!! Form::submit('Simpan Nota Masuk', ['class'=>'btn btn-primary']) !!}
                        <input type="reset" value="Reset" class="btn btn-danger">
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop