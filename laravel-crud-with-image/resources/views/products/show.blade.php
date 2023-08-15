@extends('products.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <h2 style="text-align:center;">Show Product</h2>
        <a style="margin-bottom:20px;" class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/images/{{ $product->image }}" width="200px">
            </div>
        </div>
    </div>
@endsection