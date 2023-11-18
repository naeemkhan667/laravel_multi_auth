@extends('layouts.master-buyer')

@section('header')
@include('layouts.common.header')
@endsection

{{--  @section('sidebar')
@include('seller.sidebar')
@endsection  --}}

@section('content')
    @yield('content')
@endsection

@section('footer')
@include('layouts.common.footer')
@endsection

