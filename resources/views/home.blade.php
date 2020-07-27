@extends('layouts.admin')

@section('title', 'DASHBOARD')

@section('content_header')
    <h1 class="h1">DASHBOARD</h1>
    <hr>
@stop

@section('content')
    {{--  Card  --}}
    <div class="row mb-5">
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fas fa-warehouse"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Supplier</span>
                <span class="info-box-number">{{ $total_supplier ?? 0 }} supplier</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-boxes"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Produk</span>
                <span class="info-box-number">{{ $total_product ?? 0 }} ({{ $total_sold_out ?? 0 }} terjual)</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div><!-- /.col -->
  
          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>
  
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fas fa-receipt"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Sales ({{ \Carbon\Carbon::now()->format('yy-m-d') }})</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fas fa-users" style="color: whitesmoke"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Customer Registered</span>
                <span class="info-box-number">{{ $total_customer ?? 0 }} member</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        
    </div>

    
  
@stop

@section('js')
    <script>
        var ctx = document.getElementById('traffic_sales').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@stop
