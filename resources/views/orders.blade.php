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
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Orders</h3>

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

                      @if(Session::has('success'))
                        <p class="alert alert-success">{{Session::get('success')}}</p>
                        @elseif(Session::has('error'))
                        <p class="alert alert-danger">{{Session::get('error')}}</p>
                        @endif
                      <form method="GET">
                          <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_price">Filter By Status</label>
                                             <select class="form-control" name="status">
                                                   <option value="null" >All</option>
                                                   <option value="approved" {{request()->query('status')=='approved'?'selected="selected':''}}>Approved</option>
                                                   <option value="pending" {{request()->query('status')=='pending'?'selected="selected':''}}>Pending</option> 
                                                   <option value="delivered" {{request()->query('status')=='delivered'?'selected="selected':''}}>Delivered</option> 
                                                   <option value="cancelled" {{request()->query('status')=='cancelled'?'selected="selected':''}}>Cancelled</option> 
                                            </select>
                                        </div>
                                  </div>
                          </div>

                                  <div class="form-group">
                                   
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                  </div>
                          
                      </form>
                          <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Order No.</th>
                    <th>Amt(GHC)</th>
                    <th> Charge(GHC)</th>
                    <th>Name</th>
                    <th>Phone No.</th>
                    <th>Status</th>
                    <th>Date <i class="fas fa-caret-square-down    "></i></th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 @foreach ($orders as $order)
                          <tr>
                            <td>{{$order->orderno}}</td>
                            <td>{{$order->amount}}</td>
                            <td>{{$order->delivery_charge}}</td>
                            <td>{{$order->username}}</td>
                            <td>{{$order->phoneno}}</td>
                            <td> 
                                 @if ($order->status=='pending')
                                   <button class="btn btn-xs btn-warning" >Pending</button>
                                 @elseif($order->status=='approved')
                                   <button class="btn btn-xs btn-info" >Approved</button>
                                 @elseif($order->status=='delivered')
                                   <button class="btn btn-xs btn-success" >Delivered</button>
                                 @elseif($order->status=='cancelled')
                                   <button class="btn btn-xs btn-danger" >Cancelled</button>
                                 @else
                                   <button class="btn btn-xs btn-warning" >Pending</button>
                                 @endif


                                
                            </td>
                            <td>{{date('d-m-y H:i A', strtotime($order->created_at))}}</td>

                            <td>
                              <a class="btn btn-primary btn-xs">Details</a>
                              @if($order->status !='delivered')
                              <button class="btn btn-info btn-xs" onclick="approve('{{$order->orderno}}')">Approve Order</button>
                             
                              @endif

                              @if($order->status !='cancelled' && $order->status !='delivered')
                                 <button class="btn btn-danger btn-xs" onclick="cancelOrder('{{$order->orderno}}')">Cancel Order</button>
                                 <button class="btn btn-success btn-xs" onclick="orderDelivered('{{$order->orderno}}')">Delivered</button>
                              @endif
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
    var result = confirm(`Are you sure you want to APPROVE order ${orderno}?`);
    if(result){
       var url = "{{url('/process-order?action=approve')}}"+'&orderno='+orderno
        window.location.href=url;
    }
  }

  function cancelOrder(orderno){
    var result = confirm(`Are you sure you want to CANCEL order ${orderno}?`);
    if(result){
       var url = "{{url('/process-order?action=cancel')}}"+'&orderno='+orderno
        window.location.href=url;
    }
  }

  function orderDelivered(orderno){
    var result = confirm(`Are you sure you want to change order state to DELIVERED? Order No: ${orderno}`);
    if(result){
       var url = "{{url('/process-order?action=delivered')}}"+'&orderno='+orderno
        window.location.href=url;
    }
  }
</script>
@stop