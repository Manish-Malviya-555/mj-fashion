@extends('layouts.adminapp')

@section('content')
&nbsp;&nbsp;
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
      
      <div class="wrapperdiv">
    @if($category)
    <div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">
    <div class="card" style="width: 40rem;">

        <img src="{{ asset('image/category/'.$category->category_image ) }}" style="align:center" width="200" height="300" class="card-img-top">
        <div class="card-body">
        <h3 style="text-align:center">{{ $category->category_name }}</h3>
        <h5 style="text-align:center">{{ $category->category_desc }} | {{ $category->category_status }}</h5>
        </div>
        <a href="/category" class="btn btn-primary">Back</a>
        </div>
    </div>
    <div class="col-4"></div>
    </div>
      @endif
    </div>

      </div>
        <!-- /.row -->
        <!-- Main row -->
       <!-- /.container-fluid -->
</section>
    <!-- /.content -->

@endsection







