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
            <h3 style="color:black;">Update Product</h3>
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

                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')

                    <div class="form-group">
                        <label for="product name">Product Name:</label>
                        <input type="text" id="product_name" name="product_name" class="form-control" value="{{ $product->product_name}}" >
                    </div>

                    <div class="form-group">
                        <label for="product description">Product Description:</label>
                        <input type="text" id="product_desc" name="product_desc" class="form-control" value="{{ $product->product_desc}}">
                    </div>

                    <div class="form-group">
                        <label for="product image">Product Image:</label>
                        <input type="file" id="product_image" name="product_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="product price">Product Price:</label>
                        <input type="number" name="product_price" class="form-control" value="{{ $product->product_price}}">
                    </div>

                    <div class="form-group">
                        <label for="discount_price">Discount Price:</label>
                        <input type="number"id="discount_price"  name="discount_price" class="form-control" value="{{ $product->discount_price}}">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Product Quantity:</label>
                        <input type="number" id="quantity"name="quantity" class="form-control" value="{{ $product->quantity}}">
                    </div>

                    <div class="form-group">
                        <label for="size">Product Size:</label>
                        <input type="Text" id="size" name="size" class="form-control" value="{{ $product->size}}">
                    </div>

                    <div class="form-group">
                        <label for="uploaded_by">Product Uploaded_by:</label>
                        <input type="number" id="uploaded_by" name="uploaded_by" class="form-control" value="{{ $product->uploaded_by}}">
                        
                    </div>

                    <div class="form-group">
                        <label for="brand_id">Brand:</label>
                        <input type="number" id="brand_id" name="brand_id" class="form-control" value="{{ $product->brand_id}}">
                    </div>

                    <div class="form-group">
                        <label for="cat_id">Category:</label>
                        <input type="number" id="cat_id" name="cat_id" class="form-control" value="{{ $product->cat_id}}">
                        
                    </div>

                    <div class="form-group">
                        <label for="product status">Product Status:</label>
                        <input type="text" id="product_status" name="product_status" class="form-control" value="{{ $product->product_status}}">
                    </div>

                     
                   <input type="submit" class="btn btn-success" value="UPDATE">
                   <a href="/product" class="btn btn-primary">Back</a>


                   
                </form>
                <br>
            </div>
            <div class="col-md-1 col-xs-1 col-sm-1"></div>
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
