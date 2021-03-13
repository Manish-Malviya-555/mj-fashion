@extends('layouts.adminapp')

@section('content')
&nbsp;&nbsp;
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
      
    <div class="wrapperdiv">
    @if($user)
    <div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">
    <div class="card" style="width: 40rem;">

        <img src="{{ asset('image/user/'.$user->photo ) }}" style="align:center" width="100" height="300" class="card-img-top">
        <div class="card-body">
        <h3 style="text-align:center">{{ $user->name }}</h3>
        <h5 style="text-align:center">{{ $user->phone }}</h5>
        <h5 style="text-align:center"> {{ $user->address }}</h5>

        </div>
        <a href="/user" class="btn btn-primary">Back</a>
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







