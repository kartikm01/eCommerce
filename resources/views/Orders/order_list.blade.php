@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($orderHistory) == 0) 
            <h1 class="text-align: center">You haven't made any orders till now.</h1>
        @endif
        @foreach ($orderHistory as $item)
            <div class="row">
                {{-- <div class="col-sm-6">
                    <a href="detail/{{ $item->id }}">
                        <img class="detail-img" src="{{ $item->image }}" alt="image">
                    </a>
                </div> --}}
                <div class="col-sm-6">
                    <h3>Order Date and Time: {{ $item->created_at }}</h3>
                    <h2>Order ID: {{ $item->id }}</h2>
                    <h3>Amount Paid: Rs. {{ $item->bill_amount }} via Payment Mode: {{ $item->payment_mode }}</h3><br>
                    <div class="view-more-button">
                        <form method="GET" action="{{ url("/view_order_details") }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="current_order_id" value="{{ $item->id }}">
                            <button type="submit" class="view-more btn btn-primary">View More Details</button>
                        </form>
                    </div>
                </div>    
            </div>
            <hr>
        @endforeach
    </div>    
@endsection