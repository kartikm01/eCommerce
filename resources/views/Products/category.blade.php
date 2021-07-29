@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @if (count($data_of_cat) == 0) 
        <h1 class="text-align: center">No Results Available!!</h1>
    @endif --}}
    @foreach ($data_of_cat as $item)
        <div class="row">
            <div class="col-sm-6">
                <a href="detail/{{ $item->id }}">
                    <img class="detail-img" src="{{ $item->image }}" alt="image">
                </a>
            </div>
            <div class="col-sm-6">
                <h1>{{ $item->name }}</h1>
                <h2>{{ $item->description }}</h2>
                <h3>Price: Rs. {{ $item->price }}</h3><br>
                <div class="buy-cart">
                    <a href="{{ url("/checkout") }}" id="button1" class="buy-button btn btn-success">Buy Now</a>
                    <form method="POST" action="{{ url("/cart") }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="current_product_id" value="{{ $item->id }}">
                        <button type="submit" id="button2" class="cart-button btn btn-danger">Add To Cart</button>
                    </form>
                </div>
            </div>    
        </div>
        <hr>
        @endforeach
        {{$data_of_cat->links()}}
</div>    
@endsection

