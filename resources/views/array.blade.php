@extends('layouts.app')

@section('content')

{{$product_data}}<br> <br>
    @foreach ($product_data as $item)
        {{$item}}
    @endforeach
@endsection