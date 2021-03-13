@extends('layouts.adminapp')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h7 class="m-0">Listing All The Customers.</h7>
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
     <h2>Mj-Fashion | Customers </h2>
    </div> 

    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

    <div>
     <a href="/user/create" button type="button" class="btn btn-primary" class="right"><span class="fa fa-plus-square"> Add New Customer</span></a>
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
             <th>Email</th>
             <th>Phone_Number</th>
             <th>Address</th>
             <th>Status</th>
             <th>Action</th>
             
             
      </tr>
    </thead>
    @if($users)
    <tbody>
         @foreach($users as $user)
        <tr>
        <td class="align-middle">{{$loop->iteration}}</td>
        <td class="align-middle">{{ $user->id }}</td>
        <td class="align-middle">{{ $user->name }}</td>
        <td class="align-middle"><img src="{{ asset('image/user/'.$user->photo ) }} " style="align:center" width="100" height="200" class="img-thumbnail" /></td>
        <td class="align-middle">{{ $user->email }}</td>
        <td class="align-middle">{{ $user->phone }}</td>
        <td class="align-middle">{{ $user->address }}</td>
        <td class="align-middle">{{ $user->status }}</td>


        <form action="{{ route('user.destroy', $user->id) }}" method="post">
        <td class="align-middle">
        <a href="{{ route('user.show', $user->id)}}" class="btn btn-success"><span class="fas fa-eye" style="font-size:18px;"></span></a>
        <a href="{{ route('user.edit', $user->id)}}" class="btn btn-warning"><span class="fas fa-edit" style="font-size:18px;"></span></a>
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
        {!! $users->links() !!}
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
