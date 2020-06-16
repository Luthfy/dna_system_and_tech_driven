@extends('layouts.admin')

@section('title', 'ENTRY NOTES')

@section('content_header')
    <h1 class="h1">Form Entry Notes</h1>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.components.flash_message')
            <div class="card">
                <div class="card-body">

                    @if (($entrynote->uuid_entry_note ?? '') == '')
                        {!! Form::open(['url' => 'admin/entry-note', 'method' => 'post', 'files'=>'true']) !!}
                    @else
                        {!! Form::model($supplier, ['url'=>'admin/entry-note/'.$entrynote->uuid_entry_note, 'method' => 'PUT']) !!}    
                    @endif
                    
                    @if (is_string($uuid_supplier))
                    <div class="form-group">
                        {!! Form::label('uuid_supplier', 'ID Member Supplier') !!}
                        {!! Form::text('uuid_supplier', $uuid_supplier, ['class'=>'form-control', 'placeholder'=>'ID Supplier', 'readonly'=>true]) !!}
                    </div>
                    @else
                        @foreach ($uuid_supplier as $item)
                            @php $list[$item->uuid_supplier] = $item->uuid_supplier.' - '.$item->name_supplier; @endphp
                        @endforeach
                        <div class="form-group">
                            {!! Form::label('uuid_supplier', 'ID Member Supplier') !!}
                            {!! Form::select('uuid_supplier', $list, null, ['class'=>'form-control', 'placeholder'=>'ID Supplier']) !!}
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('no_entry_note', 'No Nota') !!}
                        {!! Form::text('no_entry_note', null, ['class'=>'form-control', 'placeholder'=>'No Nota Pada Resi Nota', 'required'=>true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('date_entry_note', 'Tanggal Nota Masuk') !!}
                        {!! Form::date('date_entry_note', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('qty_entry_note', 'Jumlah Barang Pada Nota Masuk') !!}
                        {!! Form::number('qty_entry_note', null, ['class'=>'form-control', 'placeholder'=>'Jumlah Barang Pada Nota Masuk', 'min'=>0, 'required'=>true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('total_entry_note', 'Total Biaya Nota Masuk') !!}
                        {!! Form::number('total_entry_note', null, ['class'=>'form-control', 'placeholder'=>'Total Biaya Nota Masuk', 'step'=>500, 'min'=>0, 'required'=>true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status_entry_note', 'Status Pembayaran') !!}
                        {!! Form::select('status_entry_note', ['L' => 'Lunas', 'K' => 'Kredit'], null, ['class'=>'form-control', 'placeholder' => 'Pilih status pembayaran', 'required'=>true]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('picture_entry_note', 'Foto Nota Masuk') !!} <br>
                        {!! Form::file('picture_entry_note') !!}
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