<!DOCTYPE html>

<html>

<head>
    <title>Nota Keluar {{ $title }}</title>
    <style>
        @page { 
            margin: 10px; 
        }
        body {
            font-family: sans-serif;
        }
        .border {
            padding : 10px;
            border: 1px solid #aeaeae;
            border-collapse: collapse;
        }
        .row {
            margin-bottom: 10px;
        }
        .table {
            border-left: 0.01em solid #333;
            border-right: 0;
            border-top: 0.01em solid #333;
            border-bottom: 0;
            border-collapse: collapse;
        }
        .table td,
        .table th {
            border-left: 0;
            border-right: 0.01em solid #333;
            border-top: 0;
            border-bottom: 0.01em solid #333;
        }

        .text-center {
            text-align: "center";
        }

        .text-right {
            text-align: "right";
        }
    </style>
</head>

<body>
    <div class="border">
        <h2>DNA KOMPUTER - NOTA KELUAR</h2>
        <div class="row">
            <table width="100%" cellpadding="2">
                <tr>
                    <td><p>ID Nota : {{ $exit_note->uuid_exit_note }}</p></td>
                    <td class="text-right"><p>Tanggal : {{ $exit_note->date_exit_note }}</p></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive mb-4">
                    <table class="table" width="100%" cellpadding="2">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th width="40%">ID</th>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>
                            </tr>
                        </thead>
                        <tbody id="rows_table">
                            @foreach ($detail as $key => $item)
                                <tr class="text-center" align="center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->uuid_item_inventory }}</td>
                                    <td>{{ $item->item->nm_item_inventory }}</td>
                                    <td>{{ $item->item->selling_price_item_inventory }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-center">Total</th>
                                <th><span id="total_item">{{ $exit_note->total_exit_note }}</span></th>
                            </tr>
                        </tfoot>
                    </table>

                    <table width="100%">
                        <tr>
                            <th>
                                <p>Yang Menerima,</p>
                                <br><br>
                                <p>{{ $exit_note->customer->nm_customer }} ({{ $exit_note->customer->remember_token }})</p>
                            </th>
                            <th>
                                <p>Penjual,</p>
                                <br><br>
                                {{ $exit_note->user->name }}
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>