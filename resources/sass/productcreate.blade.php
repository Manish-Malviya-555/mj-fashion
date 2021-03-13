@extends('layouts.adminapp')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

    <div class="container">
        <div class="row">
           
            <div class="col-md-1 col-xs-1 col-sm-1"></div>
            <div class="col-md-10 col-xs-10 col-sm-10">
            &nbsp;&nbsp;
            <h3 style="color:black;">Add Brand</h3>
            @if($errors->any())
              <div class="alert alert-danger">
              <strong>Oops! There were some problems with your input.</strong>
              <ul>
                 @foreach($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
             </div>
            @endif
                <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                    <div class="form-group">
                        <label for="brand name">Brand Name:</label>
                        <input type="text"  name="brand_name" class="form-control" placeholder="Enter Brand name" required>
                    </div>

                    <div class="form-group">
                        <label for="brand description">Brand Description:</label>
                        <input type="text"  name="brand_desc" class="form-control" placeholder="Enter Brand Description" required>
                    </div>

                    <div class="form-group">
                        <label for="brand image">Brand Image:</label>
                        <input type="file"  name="brand_image" class="form-control" placeholder="Enter Brand Image" required>
                    </div>

                     
                   <input type="submit" class="btn btn-success" value="ADD">
                   <a href="/brand" class="btn btn-primary">Back</a>


                   
                   
                   </form>
                <br>
            </div>
            <div class="col-md-1 col-xs-1 col-sm-1"></div>
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