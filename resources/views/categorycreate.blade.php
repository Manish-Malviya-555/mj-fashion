@extends('layouts.adminapp')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    <div class="container">
        <div class="row">
           
            <div class="col-md-1 col-xs-1 col-sm-1"></div>
            <div class="col-md-10 col-xs-10 col-sm-10">
            &nbsp;&nbsp;
            <h3 style="color:black;">Add Category </h3>
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
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                    <div class="form-group">
                        <label for="brand name">Category Name:</label>
                        <input type="text"  name="category_name" class="form-control" placeholder="Enter Category name">
                    </div>

                    <div class="form-group">
                        <label for="brand description">Brand Description:</label>
                        <input type="text"  name="category_desc" class="form-control" placeholder="Enter Category Description">
                    </div>

                    <div class="form-group">
                        <label for="brand image">Brand Image:</label>
                        <input type="file"  name="category_image" class="form-control" placeholder="Enter Category Image">
                    </div>

                     
                   <input type="submit" class="btn btn-success" value="ADD">
                   <a href="/category" class="btn btn-primary">Back</a>


                   
                   
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