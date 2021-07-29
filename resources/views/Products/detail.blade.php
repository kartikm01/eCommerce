@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="detail-img" src="{{ $product_detail[0]->image }}" alt="image">
            </div>
            <div class="col-sm-6">
                <h1>{{ $product_detail[0]->name }}</h1>
                <h2>{{ $product_detail[0]->description }}</h2>
                <h3>Price: Rs. {{ $product_detail[0]->price }}</h3><br>
                <div class="buy-cart">
                    <a type="submit" href="/checkout" id="button1" class="buy-button btn btn-success">Buy Now</a>
                    <form method="POST" action="{{ url("/cart") }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="current_product_id" value="{{ $product_detail[0]->id }}">
                        <button href="{{ url("/cart") }}" id="button2" class="cart-button btn btn-danger">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="similar-products">
            <h1>Other {{ $product_detail[0]->category }}s you may like:</h1>
            @foreach ($similar_products as $item)
                <div class="products">
                    <a href="{{$item->id}}">
                        <img class="similar-prod-img" src="{{ $item->image }}" alt="image">
                    </a>
                    <h4 class="similar-prod-name">{{ $item->name }}</h4>
                </div>
            @endforeach
            {{$similar_products}}
        </div>
    </div>    
@endsection