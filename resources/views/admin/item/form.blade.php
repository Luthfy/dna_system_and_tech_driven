@extends('layouts.admin')

@section('title', 'ITEM INVENTORIES')

@section('content_header')
    <h1 class="h1">Form Add Item</h1>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.components.flash_message')

            @if (($item->uuid_item ?? '') == '')
                {!! Form::open(['url' => 'admin/items', 'method' => 'post']) !!}
            @else
                {!! Form::model($items, ['url'=>'admin/items/'.$item->uuid_item, 'method' => 'PUT']) !!}    
            @endif

            <div class="card">
                <div class="card-body">
                    @if (count($entry_notes) == 1)
                        <div class="form-group">
                            {!! Form::label('uuid_entry_note', 'ID Nota Masuk') !!}
                            {!! Form::text('', $entry_notes[0]->date_entry_note.' : '.$entry_notes[0]->supplier->name_supplier.' : '.$entry_notes[0]->uuid_entry_note, ['class'=>'form-control', 'readonly'=>true]) !!}
                            {!! Form::hidden('uuid_entry_note', $entry_notes[0]->uuid_entry_note) !!}
                        </div>
                    @else
                        <div class="form-group">
                            @foreach ($entry_notes as $item)
                                @php $list[$item->uuid_entry_note] = $item->date_entry_note.' : '.$item->supplier->name_supplier.' : '.$item->uuid_entry_note @endphp
                            @endforeach

                            {!! Form::label('uuid_entry_note', 'ID Nota Masuk') !!}
                            {!! Form::select('uuid_entry_note', $list, null, ['class'=>'form-control','placeholder'=>'Masukan ID Nota Masuk']) !!}
                        </div>
                    @endif

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    
                    <div class="form-group">
                        {!! Form::label('nm_item_inventory', 'Nama Barang') !!}
                        {!! Form::text('nm_item_inventory', null, ['class'=>'form-control', 'placeholder'=>'Nama Barang']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('stock_price_item_inventory', 'Stok Barang') !!}
                        {!! Form::number('stock_price_item_inventory', null, ['class'=>'form-control', 'placeholder'=>'Masukan Stock Barang', 'min'=>0]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('cap_price_item_inventory', 'Harga Awal') !!}
                        {!! Form::number('cap_price_item_inventory', null, ['class'=>'form-control', 'placeholder'=>'Masukan Harga Awal', 'step'=>'500', 'min'=>0]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('selling_price_item_inventory', 'Harga Jual') !!}
                        {!! Form::number('selling_price_item_inventory', null, ['class'=>'form-control', 'placeholder'=>'Masukan Harga Jual', 'step'=>'500', 'min'=>0]) !!}
                    </div>

                    <div class="form-group">
                        @foreach ($categories as $item)
                            @php $list[$item->id_category] = $item->name_category @endphp
                        @endforeach
                        {!! Form::label('id_category', 'Kategori') !!}
                        {!! Form::select('id_category', ($list ?? null), null, ['class'=>'form-control', 'placeholder'=>'Pilih Kategori']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('picture_item_inventory', 'Foto Barang') !!} <br>
                        {!! Form::file('picture_item_inventory') !!}
                    </div>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-body pb-0">

                <div class="form-group text-right">
                    {!! Form::submit('Simpan Data Supplier', ['class'=>'btn btn-primary']) !!}
                    <input type="reset" value="Reset" class="btn btn-danger">
                </div> 
                    
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop