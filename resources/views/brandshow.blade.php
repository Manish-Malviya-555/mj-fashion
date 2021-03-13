@extends('layouts.adminapp')

@section('content')
&nbsp;&nbsp;
<div class="wrapperdiv">
    @if($brand)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">
    <div class="card" style="width: 40rem;">

        <img src="{{ asset('image/brand/'.$brand->brand_image ) }}" style="align:center" width="100" height="300" class="card-img-top">
        <div class="card-body">
        <h3 style="text-align:center">{{ $brand->brand_name }}</h3>
        <h5 style="text-align:center">{{ $brand->brand_desc }} | {{ $brand->brand_status }}</h5>
        </div>
        <a href="/brand" class="btn btn-primary">Back</a>
        </div>
    </div>
    <div class="col-4">
    </div>
</div>
    @endif
</div>
@endsection






