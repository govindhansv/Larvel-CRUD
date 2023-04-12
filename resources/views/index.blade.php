@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>SKU</td>
          <td>Price</td>
          <td>Image</td>
          <td>Status</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->sku}}</td>
            <td>{{$product->price}}</td>
            <td><img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}" style="max-width:100px;"></td>
            <td>{{$product->status ? 'Active' : 'Inactive' }}</td>
            <td class="text-center">
                <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('products.destroy', $product->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
