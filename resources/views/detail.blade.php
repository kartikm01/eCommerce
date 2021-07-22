@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="detail-img" src="{{ $product_data[0]->image }}" alt="image">
            </div>
            <div class="col-sm-6">
                <h1>{{ $product_data[0]->name }}</h1>
                <h2>{{ $product_data[0]->description }}</h2>
                <h3>Price: Rs. {{ $product_data[0]->price }}</h3><br>
                <div class="buy-cart">
                    <button href="{{ url("/checkout") }}" id="button1" class="buy-button btn btn-success">Buy Now</button>
                    <form method="POST" action="{{ url("/cart") }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="current_product_id" value="{{ $product_data[0]->id }}">
                        <button href="{{ url("/cart") }}" id="button2" class="cart-button btn btn-danger">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection