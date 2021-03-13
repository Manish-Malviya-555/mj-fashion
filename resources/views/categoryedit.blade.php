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
            <h3 style="color:black;">Update Category</h3>
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

                <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')

                    <div class="form-group">
                        <label for="category name">Category Name:</label>
                        <input type="text" id="categoryname" name="category_name" class="form-control" value="{{ $category->category_name}}" >
                    </div>

                    <div class="form-group">
                        <label for="category description">Category Description:</label>
                        <input type="text" id="category_desc" name="category_desc" class="form-control" value="{{ $category->category_desc}}">
                    </div>

                    <div class="form-group">
                        <label for="category image">Category Image:</label>
                        <input type="file" id="category_image" name="category_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="category status">Category Status:</label>
                        <input type="text" id="category_status" name="category_status" class="form-control" value="{{ $category->category_status}}">
                    </div>

                     
                   <input type="submit" class="btn btn-success" value="UPDATE">
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
