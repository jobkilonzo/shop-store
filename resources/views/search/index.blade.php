@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Product
    </div>
    <div class="card-body">
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
              <form action="{{route('products.destroy', ['id', $product->id])}}" method="post">
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
    </div>
  </div>
</div>

@endsection
