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
            <h3 style="color:black;">Update User</h3>
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

                <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text"  id="name" name="name" class="form-control" value="{{ $user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email"  id="email"  name="email" class="form-control" value="{{ $user->email}}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number" id="phone"  name="phone" class="form-control" value="{{ $user->phone}}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address"  name="address" class="form-control" value="{{ $user->address}}">
                    </div>

                    <div class="form-group">
                        <label for="photo">User Image:</label>
                        <input type="file" id="photo"  name="photo" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password"  name="password"  class="form-control" value="{{ $user->password}}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password-Confirm:</label>
                        <input id="password-confirm"  type="password" name="password_confirmation" class="form-control" value="{{ $user->password}}">
                    </div>

                                        
                   <input type="submit" class="btn btn-success" value="UPDATE">
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