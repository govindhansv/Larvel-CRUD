@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Edit & Update
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.update', $product->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
          </div>
          <div class="form-group">
              <label for="sku">SKU</label>
              <input type="text" class="form-control" name="sku" value="{{ $product->sku }}"/>
          </div>
          <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" name="price" value="{{ $product->price }}"/>
          </div>
          <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" value="{{ $product->image }}"/>
          </div>
          @if ($product->image)
                  <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}" width="200">
          @endif
          <div class="form-group">
              <label for="status">Status</label>
              <select class="form-control" name="status">
                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
              </select>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update Product</button>
      </form>
  </div>
</div>
@endsection
