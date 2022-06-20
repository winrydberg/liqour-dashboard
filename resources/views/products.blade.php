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
              <li class="breadcrumb-item active">All Products</li>
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
                        <h3 class="card-title">All Products</h3>

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
                              <th>Image</th>
                              <th>Name</th>
                              <th>Price(GHC)</th>
                              <th>Product Type</th>
                              <th>Brand</th>
                              <th>Product Category</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )
                                    <tr>
                                        <td>
                                          <img src="{{asset('storage/images/products/'.$product->images[0])}}" style="height: 50px; width: 50px" />
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->producttype}}</td>
                                        <td>{{$product->brands->name}}</td>
                                        <td>{{$product->product_categories->name}}</td>
                                        <td>
                                            <button class="btn btn-xs btn-danger">Delete</button>
                                            <button class="btn btn-xs btn-primary">Edit</button>
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



@stop