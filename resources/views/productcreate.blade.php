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
            <h3 style="color:black;">Add Product</h3>
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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                    <div class="form-group">
                        <label for="product name">Product Name:</label>
                        <input type="text"  name="product_name" class="form-control" placeholder="Enter Product name" required>
                    </div>

                    <div class="form-group">
                        <label for="product description">Product Description:</label>
                        <input type="text"  name="product_desc" class="form-control" placeholder="Enter Product Description" required>
                    </div>

                    <div class="form-group">
                        <label for="product image">Product Image:</label>
                        <input type="file"  name="product_image" class="form-control" placeholder="Enter Product Image" required>
                    </div>

                    <div class="form-group">
                        <label for="product price">Product Price:</label>
                        <input type="number" name="product_price" class="form-control" placeholder="Enter Price Description" required>
                    </div>

                    <div class="form-group">
                        <label for="discount_price">Discount Price:</label>
                        <input type="number" name="discount_price" class="form-control" placeholder="Enter Discount Price Description" required>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Product Quantity:</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity Description" required>
                    </div>

                    <div class="form-group">
                        <label for="size">Product Size:</label>
                        <input type="Text" name="size" class="form-control" placeholder="Enter Size Description" required>
                    </div>

                    <div class="form-group">
                        <label for="uploaded_by">Product Uploaded_by:</label>
                        <input type="number" name="uploaded_by" class="form-control" placeholder="Enter Uploaded_by" required>
                        
                    </div>

                    <div class="form-group">
                        <label for="brand_id">Brand:</label>
                        <input type="number" name="brand_id" class="form-control" placeholder="Enter Brand" required>
                    </div>

                    <div class="form-group">
                        <label for="cat_id">Category:</label>
                        <input type="number" name="cat_id" class="form-control" placeholder="Enter Category" required>
                        
                    </div>

                     
                   <input type="submit" class="btn btn-success" value="ADD">
                   <a href="/product" class="btn btn-primary">Back</a>


                   
                   
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