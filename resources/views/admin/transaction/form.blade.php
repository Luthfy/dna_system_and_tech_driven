@extends('layouts.admin')

@section('title', 'Form Nota Penjualan')

@section('content_header')
    <h1 class="h1">Form Nota Penjualan</h1>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.components.flash_message')
            <div class="card">
                <div class="card-body">

                    {!! Form::open(['url'=>'admin/transaction', 'method'=>'post', "autocomplete"=>"off", 'id'=>'form_transaction']) !!}

                    <div class="form-group">
                        {!! Form::label('uuid_exit_note', 'ID Nota Penjualan') !!}
                        {!! Form::text('uuid_exit_note', $id_nota, ['class'=>'form-control', 'placeholder'=>'Nama Supplier', 'readonly'=>true]) !!}
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('nm_customer', 'Nama Customer') !!}
                                {!! Form::text('nm_customer', null, ['class'=>'form-control', 'placeholder'=>'Nama Customer', 'list'=>'list_customer', 'id'=>'nm_customer', 'required'=>true]) !!}
                                <datalist id="list_customer">
                                    
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('date_exit_note', 'Tanggal') !!}
                                {!! Form::date('date_exit_note', \Carbon\Carbon::now(), ['class'=>'form-control', 'placeholder'=>'Tanggal']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('status_exit_note', 'Metode Pembayaran') !!}
                        {!! Form::select('status_exit_note', ["Lunas"=>"Cash", "Hutang"=>"Hutang"], ["Lunas"=>"Lunas"], ['class'=>'form-control', 'placeholder'=>'Metode Pembayaran']) !!}
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('select_item_detail', 'Pilih Barang') !!}
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                               
                                {!! Form::text('item', null, ['class'=>'form-control', 'placeholder'=>'-- Pilih item --', 'list'=>'list_item', 'id'=>'item']) !!}
                                <datalist id="list_item">
                                    
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary btn-block" onclick="addItem()">Tambah</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Satuan</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rows_table">

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-center">Total</th>
                                            <th><span id="total_item"></span></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {!! Form::hidden('total_exit_note', 0, ['class'=>'form-control', 'id'=>'total_exit_note']) !!}
                    </div>
                
                    <div class="form-group text-right">
                        {!! Form::submit('Buat Nota', ['class'=>'btn btn-primary']) !!}
                        <input type="reset" value="Reset" class="btn btn-danger">
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop

@section('js_datatables')

<script>

    let customers   = [];
    let items       = [];
    let carts       = [];

    $('document').ready(function () {
        $.ajax({
            url: '{{route("item.list")}}',
            success : function (e) {
                try {
                    items = JSON.parse(e)
                    writelistItem(items)
                } catch (err) {
                    console.log(err)
                }
            },
            error : function (e) {
                console.log(e)
            }
        });

        $.ajax({
            url: '{{route("customers.list")}}',
            success : function (e) {
                try {
                    customers = JSON.parse(e)
                    writelistCustomer(customers)
                } catch (err) {
                  console.log(err)  
                }
            },
            error : function (e) {
                console.log(e)
            }
        })
        writeTable(carts)


        $("#form_transaction").on('submit', function(event){

            event.preventDefault();

            let data = {
                "_token"            : "{{ csrf_token() }}",
                "uuid_exit_note"    : $("#uuid_exit_note").val(),
                "nm_customer"       : ($("#nm_customer").val().split("-")[1] == undefined ? $("#nm_customer").val().split("-")[0] : $("#nm_customer").val().split("-")[1]).trim(),
                "date_exit_note"    : $("#date_exit_note").val(),
                "status_exit_note"  : $("#status_exit_note").val(),
                "total_exit_note"   : $("#total_exit_note").val(),
                "detail_exit_note"  : JSON.stringify(carts)
            }

            $.ajax({
                url : "{{ route('transaction.store') }}",
                type : "POST",
                data : data,
                success : function (response, statusCode) {
                    if (statusCode = 'success')
                    {
                        window.open('../generate-pdf/exit_note/'+data.uuid_exit_note, '_blank');
                        // location.reload();
                    }
                },
                error : function (response) {

                }
            })
        })
    });

    function addItem()
    {
        var itemRaw     = $("#item").val().split("-");

        var item       = {
            "nm_item_inventory" : itemRaw[0].trim(),
            "uuid_item_inventory" : itemRaw[1].trim(),
            "selling_price_item_inventory": Number(itemRaw[2].trim()),
        }

        carts.push(item) 
        removeItem(items, item)

        writeTable(carts)
        writelistItem(items)

        $("#item").val('')
        
    }

    function removeItem(array, item) {
        console.log(item.uuid_item_inventory)
        for(var i in array){
            if(array[i].uuid_item_inventory == item.uuid_item_inventory){
                array.splice(i,1);
                break;
            }
            
        }
    }

    function writelistItem(items)
    {
        let html = "";
        items.forEach(item => {
            html += "<option>"+item.nm_item_inventory+" - "+item.uuid_item_inventory+" - "+item.selling_price_item_inventory+"</option>"
        });
        $("#list_item").html(html)
    }

    function writelistCustomer(customers)
    {
        let html = "";
        customers.forEach(customer => {
            html += "<option>"+customer.nm_customer+" - "+customer.remember_token+"</option>"
        });
        $("#list_customer").html(html)
    }

    function writeTable(carts)
    {
        let sum_item = 0;
        var html = "";
        if (carts.length == 0)
        {
            html += "<tr><td colspan='5' class='text-center'><i>-- No Item Selected --</i></td></tr>"
            sum_item = Number(0);
            $("#total_item").html(sum_item)
        }
        else
        {
            var price = 0;
            for (const [key, value] of Object.entries(carts))
            {
                html += "<tr>";
                html += "<td>"+ (Number(key) + Number(1)) +"</td>";
                html += "<td>"+ value.uuid_item_inventory +"</td>";
                html += "<td>"+ value.nm_item_inventory +"</td>";
                html += "<td>"+ value.selling_price_item_inventory +"</td>";
                html += "<td><button type='button' class='btn btn-danger btn-sm' onclick=deleteItemCart('"+value.uuid_item_inventory+"')>x</button></td>"
                html += "</tr>";

                price += Number(value.selling_price_item_inventory);
            }
            sum_item = Number(price);
            $("#total_exit_note").val(sum_item)
        }
        $("#rows_table").html(html)
        $("#total_item").html(sum_item)
    }

    function deleteItemCart(uuid)
    {
        console.log("Delete Item : " + uuid)
        
        var item = []

        carts.forEach(cart =>  {
            if (cart.uuid_item_inventory === uuid)
                item = cart
        })

        items.push(item)
        writelistItem(items)

        removeItem(carts, item)
        writeTable(carts)
    }
</script>

@stop