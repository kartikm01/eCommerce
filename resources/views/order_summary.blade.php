@extends('layouts.app')

@section('content')
    {{$orderDetails}}

    <div class="container">
        <?php $total = 0; ?>
        @foreach ($orderDetails as $item)
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
        <a href="{{url("checkout/place_order")}}" class="place-button btn btn-success">Place Order</a>
        <a href="{{url("/checkout")}}" class="btn btn-warning">Go Back</a>
    </div>
@endsection