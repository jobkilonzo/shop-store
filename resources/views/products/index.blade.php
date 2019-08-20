@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Products
    </div>
    <div class="card-body">
      @if($products->count() ==0)
      <div class="text-center">
        <h1>No products. Please add products</h1>
      </div>
      @else
      <table class="table">
        <thead>
          <th>#</th>
          <th>Name</th>
          <th>Retail price</th>
          <th>Wholesale price</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>Date</th>
        </thead>
        <tbody>
          @foreach($products as $product)

          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>Ksh.{{ $product->retail_price }}</td>
            <td>Ksh.{{ $product->wholesale_price }}</td>
            <td>
              <a href="{{route('products.edit', ['id'=> $product->id])}}" class="btn btn-xs btn-info">Edit</a>
            </td>
            <td>
              <form action="{{route('products.destroy', $product->id)}}" method="post">
                @csrf

                @method('DELETE')
                <button class="btn btn-danger btn-xs">Delete</button>
              </form>
            </td>
            <td>{{ $product->updated_at}}</td>
          </tr>


          @endforeach
        </tbody>
      </table>

      @endif
    </div>
  </div>
  {{$products->links()}}
</div>

@include('layouts.footer')
@endsection
