@extends('layouts.adminapp')

@section('content')
&nbsp;&nbsp;
<div class="wrapperdiv">
    @if($product)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">
    <div class="card" style="width: 40rem;">

        <img src="{{ asset('image/product/'.$product->product_image ) }}" style="align:center" width="100" height="300" class="card-img-top">
        <div class="card-body">
        <h3 style="text-align:center">{{ $product->product_name }}</h3>
        <h5 style="text-align:center">{{ $product->product_desc }} | RS = {{ $product->product_price }} | Size ={{ $product->size }} |{{ $product->product_status }} </h5>
        </div>
        <a href="/product" class="btn btn-primary">Back</a>
        </div>
    </div>
    <div class="col-4">
    </div>
</div>
    @endif
</div>
@endsection






