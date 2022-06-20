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
              <li class="breadcrumb-item active">New Product</li>
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
                        <h3 class="card-title">New Product</h3>

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
                           <form action="{{url('/new-product')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" name="name" id="name" >
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price(Actual Price)</label>
                                            <input type="number" class="form-control" name="price" step="0.2" id="price" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_price">Sale Price</label>
                                            <input type="text" class="form-control" name="sale_price" id="sale_price" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Product Image</label>
                                            <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_price">Brand</label>
                                             <select class="form-control" name="brand">
                                                @foreach ($brands as $brand)
                                                   <option value="{{$brand->id}}">{{$brand->name}}</option> 
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_price">Product category</label>
                                             <select class="form-control" name="category">
                                                @foreach ($categories as $c)
                                                   <option value="{{$c->id}}">{{$c->name}}</option> 
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_price">Product Qty(eg. 1 Bottle or 1 Box)</label>
                                             <select class="form-control" name="producttype">
                                               
                                                   <option value="1 Bottle">1 Bottle</option> 
                                                   <option value="1 Box">1 Box</option> 
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Product Description</label>
                                   <textarea class="form-control" name="description"></textarea>
                                </div>
                                
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Product</button>
                                </div>
                            </form>
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