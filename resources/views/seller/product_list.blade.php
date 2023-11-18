@extends('layouts.seller')
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<!-- PPrice Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Product Listing</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href={{route('product.create')}}>Add Product</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Condition</th>
                                            <th>Price</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $product)


                                        <tr>
                                            <td>{{$product->model}}</td>
                                            <td>{{$product->year}}</td>
                                            <td>{{$product->condition}}</td>
                                            <td>{{$product->price}}</td>
                                            <td style="width: 20%">
                                                <a class="btn btn-info" href={{route('product.edit', $product->id)}}>Edit</a>
                                                <a class="btn btn-danger" href={{route('product.delete', $product->id)}}>Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection

