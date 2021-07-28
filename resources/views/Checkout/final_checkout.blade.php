@extends('layouts.app')

@section('content')
    Your order has been placed successfully. 
    Thank You for shopping with us.
    You can see your order details <a href="{{url("/orders")}}">here</a>.
@endsection