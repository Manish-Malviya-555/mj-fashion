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
            <h3 style="color:black;">Add Customer</h3>
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
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text"  name="name" class="form-control" placeholder="Enter User Full Name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email"  name="email" class="form-control" placeholder="Enter Email Description">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number"  name="phone" class="form-control" placeholder="Enter Phone Description" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text"  name="address" class="form-control" placeholder="Enter Address Description">
                    </div>

                    <div class="form-group">
                        <label for="photo">User Image:</label>
                        <input type="file"  name="photo" class="form-control" placeholder="Enter User Profile Image" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input  type="password"  name="password" class="form-control" placeholder="Enter Password Description">
                    </div>

                    <div class="form-group">
                        <label for="password">Password-Confirm:</label>
                        <input id="password-confirm"  type="password" name="password_confirmation" class="form-control" placeholder="Re-Enter Password">
                    </div>

                     
                    <a href="/login"><input type="submit" class="btn btn-success" value="ADD"></a>
                    <a href="/user" class="btn btn-primary">Back</a>


                   
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