@extends('layouts.adminapp')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h7 class="m-0">Listing All The Products.</h7>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
              <li class="breadcrumb-item active">Admin | Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="form-inline">
  <form action="/search" method="get" role="search">
    {{ csrf_field() }}
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
  </form>
  </div>

      &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;

    <div>
     <h2>Mj-Fashion | Products </h2>
    </div> 

    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp;&nbsp;
    <div>
     <a href="/product/create" button type="button" class="btn btn-primary" class="right"><span class="fa fa-plus-square" > Add Product</span></a>
    </div>
    
  </div>
  

  
  
  &nbsp;
    @if($messge = Session::get('success'))
        <div class="alert alert-success text-center">{{ $messge }}</div>
    @endif
    &nbsp;
    <table class="table table-bordered table table-striped">
    <thead>
      <tr>
             <th>SR No</th>
             <th>ID</th>
             <th>Name</th>
             <th>Image</th>
             <th>Description</th>
             <th>Price</th>
             <th>Discount</th>
             <th>Size</th>
             <th>Quantity</th>
             <th>Brand</th>
             <th>Category</th>
             <th>Status</th>
             <th>Action</th>
             
             
      </tr>
    </thead>
    @if($products)
    <tbody>
         @foreach($products as $product)
        <tr>
        <td class="align-middle">{{$loop->iteration}}</td>
        <td class="align-middle">{{ $product->id }}</td>
        <td class="align-middle">{{ $product->product_name }}</td>
        <td class="align-middle"><img src="{{ asset('image/product/'.$product->product_image ) }} " style="align:center" width="100" height="200" class="img-thumbnail" /></td>
        <td class="align-middle">{{ $product->product_desc }}</td>
        <td class="align-middle">{{ $product->product_price }}</td>
        <td class="align-middle">{{ $product->discount_price }}</td>
        <td class="align-middle">{{ $product->size }}</td>
        <td class="align-middle">{{ $product->quantity }}</td>
        <td class="align-middle">{{ $product->brand_id }}</td>
        <td class="align-middle">{{ $product->cat_id }}</td>
        <td class="align-middle">{{ $product->product_status }}</td>

        <form action="{{ route('product.destroy', $product->id) }}" method="post">
        <td class="align-middle">
        <a href="{{ route('product.show', $product->id)}}" class="btn btn-success"><span class="fas fa-eye" style="font-size:18px;"></span></a>
        <a href="{{ route('product.edit', $product->id)}}" class="btn btn-warning"><span class="fas fa-edit" style="font-size:18px;"></span></a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')"><span class="fas fa-trash-alt" style="font-size:18px;"></span></a></button>
        </form>
        </td>

        </tr>
        @endforeach

    </tbody>
    @endif
  </table>
  <div class="d-flex">
    <div class="mx-auto">
        {!! $products->links() !!}
    </div>
</div>
</div>

      
        </div>
      </div>
        <!-- /.row -->
        <!-- Main row -->
       <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
