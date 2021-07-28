@extends('layouts.app')

@section('content')

{{-- {{$user_details}} --}}
<form method="GET" action="{{url("/place_order")}}">
    <div class="checkout-form container">
      <div class="col-md-8">
        <h2>Please check your details here:</h2>
          {{ csrf_field() }}
          <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputName" value="{{ $user_details[0]->name }}" aria-describedby="nameHelp">
          </div>
          <div class="mb-3 mt-3">
            <label for="exampleInputEmail1" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ $user_details[0]->email }}" aria-describedby="emailHelp" disabled>
          </div>
          <div class="mb-3 mt-3">
            <label for="exampleInputNumber" class="form-label">Contact Number</label>
            <input type="text" class="form-control" name="phone_no" id="exampleInputNumber" value="{{ $user_details[0]->phone_no }}" disabled>
          </div>
          <div class="mb-3 mt-3">
            <label for="exampleInputAddress" class="form-label">Delivery Address</label>
            <input type="text" class="form-control" name="delivery_address" id="exampleInputAddress" value="{{ $user_details[0]->address . ", " . $user_details[0]->state . ", " . $user_details[0]->country }}">          </div>
          <div class="mb-3 mt-3">
            <label for="exampleInputPIN" class="form-label">Pincode</label>
            <input type="text" class="form-control" name="pincode" id="exampleInputPIN" value="{{ $user_details[0]->pincode }}">
          </div>
          <div class="mb-3 mt-3">
            <p style="font-weight: bold">Please select the mode of payment:</p>
              <input type="radio" id="exampleInputonline" name="radio" value="online" required>
              <label for="exampleInputonline" >Online Payment (Credit Card, Debit Card, UPI)</label><br>
              <input type="radio" id="exampleInputCOD" name="radio" value="COD" required>
              <label for="exampleInputCOD" class="form-label">Cash On Delivery</label>
          </div>
          {{-- <a id="submit-form" type="hidden" class="btn btn-primary">Submit</a> --}}
        </div> 
      </div>
      
      <div class="order-summary-panel panel-success">
        <div style="font-weight: bold" class="panel-heading">Order Summary</div>
        <div class="panel-body">
          
          <?php $total = 0; ?>
          @foreach ($order_details as $item)
          <div class="row">
            {{-- <div class="col-sm-6"> --}}
              <a href="detail/{{ $item->product_id }}">
                <img class="summary-img" src="{{ $item->image }}" alt="image">
              </a>
              {{-- </div> --}}
              <div class="col-sm-6">
                <h1 style="font-weight: bold" class="item-description">{{ $item->name }}</h1>
                <h2 class="item-description">{{ $item->description }}</h2>
                <h3 class="item-description">Quantity: {{ $item->quantity }}</h3>
                <h4 class="item-description">Net Price: Rs. {{ $item->price * $item->quantity }}</h4>
              </div>    
            </div>
            <hr>
            <?php $total += $item->price * $item->quantity; ?>
            @endforeach
            <h5 style="font-weight: bolder">Order Total: {{$total}}</h5>
            <h5>Delivery Charges: 100</h5>
            <h5>Tax: {{$total * 0.05}}</h5>
            <hr>
            <p style="font-weight: bolder">Net Payable Amount: {{ $bill_amount = 1.05 * $total + 100 }}</p>
          </div>
        </div>
        
        <div class="container">
          <div class="final-checkout-buttons" >
            <a href="{{url("/MyCart")}}" class="btn btn-warning">Go Back to Cart</a>
            <button type="submit" class="place-order-button btn btn-success">Place Order</button>  
          </div>
        </div>
      </form>
      @endsection