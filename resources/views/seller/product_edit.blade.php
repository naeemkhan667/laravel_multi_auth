@extends('layouts.seller')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Add Product</h1>
<form action="{{route('product.store')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="model" class="form-label">Model</label>
      <input type="text" class="form-control" id="model" name="model" aria-describedby="emailHelp" value="{{$product->model}}" >
    </div>

    <div class="mb-3">
      <label for="year" class="form-label">Year</label>
      <input type="text" class="form-control" name="year" id="year" value="{{$product->year}}">
    </div>

    <div class="mb-3">
        <label for="condition" class="form-label">Condition</label>
        <input type="text" class="form-control" name="condition" id="condition" value="{{$product->condition}}" >
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

