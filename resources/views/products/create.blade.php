@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
      <form action="{{route('products.store')}}" method="post">
        @csrf

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" placeholder="Enter product name" class="form-control">
        </div>
        <div class="form-group">
          <label for="retail_price">Retail price</label>
          <input type="text" name="retail_price" placeholder="Enter reatil price" class="form-control">
        </div>
        <div class="form-group">
          <label for="wholesale_price">Wholesale price</label>
          <input type="text" name="wholesale_price" placeholder="Enter wholesale price" class="form-control">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Create new product</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
