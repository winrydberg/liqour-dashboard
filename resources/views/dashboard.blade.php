@extends('includes.master')

@section('content')
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @if(Session::has('success'))
                        <p class="alert alert-success">{{Session::get('success')}}</p>
        @elseif(Session::has('error'))
                        <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif
        <!-- Small boxes (Stat box) -->
         <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$pending}}</h3>

                <p>Pending Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('/orders?status=pending')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$delivered}}</h3>

                <p>Delivered This Week</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('/orders?status=delivered')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$cancelled}}</h3>

                <p>Cancelled Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{url('/orders?status=cancelled')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
                <div class="col-md-8">
                    <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Pending Orders</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Order No.</th>
                    <th>Amt(GHC)</th>
                    <th>Name</th>
                    <th>Phone No.</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                    @foreach ($orders as $o)
                          <tr>
                            <td>{{$o->orderno}}</td>
                            <td>{{$o->amount}}</td>
                            <td>{{$o->username}}</td>
                            <td>{{$o->phoneno}}</td>
                            <td>
                              <a class="btn btn-primary btn-xs">Details</a>
                              <button class="btn btn-success btn-xs" onclick="approve('{{$o->orderno}}')">Approve Order</button>
                              <button class="btn btn-danger btn-xs" onclick="cancelOrder('{{$o->orderno, $o->id}}')">Cancel Order</button>
                            </td>
                          </tr>
                    @endforeach                 
                  </tbody>
                  <tfoot>
                 
                  </tfoot>
                </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Highest Ordering Users</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                         <div class="table-responsive">
                           <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>Amt(GHC)</th>
                            </tr>
                            </thead>
                            <tbody>
                          
                              @foreach ($highOrders as $theOrder)
                                    <tr>
                                      <td>{{$theOrder->username}}</td>
                                      <td>{{$theOrder->phoneno}}</td>
                                      <td>{{$theOrder->totalamount}}</td>
                                    </tr>
                              @endforeach
                            
                          
                            </tbody>
                            <tfoot>
                          
                            </tfoot>
                          </table>
                         </div>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
        </div>
        <!-- /.row (main row) -->

  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@stop

@section('scripts')

{{-- <script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script> --}}

<!--DATATBLES -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script>
  function approve(orderno){
    var result = confirm(`Are you sure to APPROVE order ${orderno}?`);
    if(result){
       var url = "{{url('/process-order?action=approve')}}"+'&orderno='+orderno
        window.location.href=url;
    }
  }

  function cancelOrder(orderno){
    var result = confirm(`Are you sure to CANCEL order ${orderno}?`);
    if(result){
       var url = "{{url('/process-order?action=cancel')}}"+'&orderno='+orderno
        window.location.href=url;
    }
  }

  // function cancelOrder(orderno, id){
  //   var result = confirm(`Are you sure to CANCEL order ${orderno}?`);
  //   if(result){
  //       var url = {{url('/process-order?orderid=')}}+id
  //       window.location.href=url;
  //   }
  // }
</script>

@stop