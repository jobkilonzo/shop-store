@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
      <form action="{{route('products.update', ['id'=>$product->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" value="{{$product->name}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="retail_price">Retail price</label>
          <input type="text" name="retail_price" value="{{$product->retail_price}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="wholesale_price">Wholesale price</label>
          <input type="text" name="wholesale_price" value="{{$product->wholesale_price}}" class="form-control">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Update product</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
