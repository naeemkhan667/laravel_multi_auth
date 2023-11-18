@extends('layouts.seller')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Add Product</h1>

<!-- -->


@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
<!-- -->

<form action="{{route('product.store')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="model" class="form-label">Model</label>
      <input type="text" class="form-control" id="model" name="model" aria-describedby="emailHelp" value="{{old('model')}}" >
    </div>

    <div class="mb-3">
      <label for="year" class="form-label">Year</label>
      <input type="text" class="form-control" name="year" id="year" value="{{old('year')}}" >
    </div>

    <div class="mb-3">
        <label for="condition" class="form-label">Condition</label>
        <input type="text" class="form-control" name="condition" id="condition" value="{{old('condition')}}">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

