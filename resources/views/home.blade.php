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
          @for ($i = 0; $i < 4; $i++)
            {{-- <div class="item {{$slider_products[$i]->id == 1?'active' : ''}}"> --}}
              <div class="item {{$slider_products[$i]->id == 1?'active' : ''}}">
                <a href="detail/{{$slider_products[$i]->id}}">
                  <img class="img-slider" src="{{$slider_products[$i]->image}}" alt="image">
                  <div class="carousel-caption">
                    <h3 class="item-details">{{$slider_products[$i]->name}}</h3>
                    <p class="item-details">{{$slider_products[$i]->description}}</p>
                  </div>  
                </a>
              </div>
              @endfor
          </div>  
            
      
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
              <a href="detail/{{$item->id}}">
                <img class="img-trending" src="{{$item->image}}" alt="image">
                <div class="">
                <h3 class="item-details">{{$item->name}}</h3>
                </div>
              </a>
            </div>
        @endforeach
    </div>
  </div>
    <center>{{$data->links()}}</center>

</div>
@endsection