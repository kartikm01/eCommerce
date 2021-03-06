<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    
                        <form method="GET" action="{{ url("/search") }}" class="navbar-form navbar-left">
                            <input class="search-box form-control me-3" name="search" type="search" placeholder="Search for a product" aria-label="Search">
                            <button class="btn btn-warning" type="submit">Search</button>
                        </form>
                  
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a class="nav-link" href="{{ url("/orders") }}">Orders</a></li>
                            <li><a class="nav-link" href="{{ url("/MyCart") }}">MyCart</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="nav-link-pro" href="#">
                                            My Profile
                                        </a>
                                        <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
<style>
    body {
        background: #d3d3d3;
    }

    .navbar {
        background-color: #5f788a;
    }

    .navbar-collapse .navbar-nav .nav-link {
        color: #cbd5db;
    }

    .navbar-collapse .navbar-nav .nav-link.active {
        font-weight: 900;
    }

    .navbar-collapse .navbar-nav .nav-link:hover {
        color: #ffffff;
    }

    .navbar-header .navbar-brand {
        color: #cbd5db;
    }

    .navbar-header .navbar-brand.hover {
        color: #ffffff;
    }

    .navbar-collapse .navbar-nav .dropdown .dropdown-toggle {
        color: #cbd5db;
    }

    .navbar-collapse .navbar-nav .dropdown .dropdown-menu .nav-link{
        color: red;
    }

    .navbar-collapse .navbar-nav .dropdown .dropdown-menu .nav-link-pro{
        color: blue;
    }

    img.img-slider{
        height: 400px !important
    }

    .img-trending {
        height: 100px;
    }

    .item-trending {
        float: left;
        width: 20%;
    }

    .register-button {
        padding-top: 10px;
    }

    .detail-img {
        height: 250px; 
    }

    .search-box {
        width: 400px !important
    }

    .cart-button{
        margin-left: 10px;
    }

    .buy-cart {
        display: flex;
    }

    .checkout-form{
        float: left;
    }

    .order-summary-panel{
        float: right;
        margin-right: 150px;
        margin-top: 20px;
        background-color: white;
    }

    .summary-img{
        height: 100px;
        margin-left: 30px;
    }

    .item-description{
        font-size: 15px;
    }

    .checkout-form{
        margin-left: 50px;
    }

    .final-checkout-buttons{
        position: absolute;
        bottom: 300px;
        left: 282px;
        width: 100%;
        display: flex;
    }

    .place-order-button {
        margin-left: 20px;
    }

    .products{
        float: left;
        width: 20%;
    }

    .similar-prod-img{
        height: 150px;
    }

    .similar-products {
        position: absolute;
        bottom: 100px;
    }

    .similar-prod-name{
        font: bolder;
    }
</style>