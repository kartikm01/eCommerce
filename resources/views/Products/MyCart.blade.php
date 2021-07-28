@extends('layouts.app')

@section('content')

<div class="container">
    @if (count($cartItems) == 0)
    <h1 class="text-align: center">Cart is Empty!!</h1> 
    @else
        <?php $total = 0; ?>
        @foreach ($cartItems as $item)
        <div class="row">
            <div class="col-sm-6">
                <a href="detail/{{ $item->product_id }}">
                    <img class="detail-img" src="{{ $item->image }}" alt="image">
                </a>
            </div>
            <div class="col-sm-6">
                <h1>{{ $item->name }}</h1>
                <h2>{{ $item->description }}</h2>
                <h3>Quantity: {{ $item->quantity }}</h3>
                <h4>Net Price: Rs. {{ $item->price * $item->quantity }}</h4>
                <div class="remove-cart">
                    <form method="POST" action="{{ url("/remove") }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="current_cart_id" value="{{ $item->id }}">
                        <button type="submit" id="button2" class="remove-button btn btn-danger">Remove</button>
                    </form>
                </div>
            </div>    
        </div>
        <hr>
         <?php $total += $item->price * $item->quantity; ?>
        @endforeach
        <h2>Order Total (excl. of taxes): {{ $total }}</h2>
        <a href="{{ url("/checkout") }}" class="checkout-button btn btn-success">Checkout</a>
    @endif
</div>

@endsection
