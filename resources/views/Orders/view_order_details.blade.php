@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($product_details as $item)
            <div class="row">
                <div class="col-sm-6">
                    <a href="detail/{{ $item->id }}">
                        <img class="detail-img" src="{{ $item->image }}" alt="image">
                    </a>
                </div>
                <div class="col-sm-6">
                    <h1>{{ $item->name }}</h1>
                    <h2>{{ $item->description }}</h2>
                    <h3>Price: Rs. {{ $item->price }}</h3>
                    <h3>Quantity Ordered: {{ $item->quantity_ordered }}</h3>
                </div>    
            </div>
            <hr>
        @endforeach
    </div>    
@endsection