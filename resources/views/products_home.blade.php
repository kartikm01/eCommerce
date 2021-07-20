@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          @foreach ($data as $item)
            <div class="item {{$item->id == 1?'active':''}}">
                <img class="img-slider" src="{{$item->image}}" alt="image">
                <div class="carousel-caption">
                <h3 class="item-details">{{$item->name}}</h3>
                <p class="item-details">{{$item->description}}</p>
                </div>
            </div>
          @endforeach
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="trending-wrapper">
        <h3>Trending Products</h3>
        @foreach ($data as $item)
            <div class="item-trending">
                <img class="img-trending" src="{{$item->image}}" alt="image">
                <div class="">
                <h3 class="item-details">{{$item->name}}</h3>
                {{-- <p class="item-details">{{$item->description}}</p> --}}
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
@endsection