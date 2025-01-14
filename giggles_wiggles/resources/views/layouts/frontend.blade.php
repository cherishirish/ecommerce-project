<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  

  @vite(['resources/js/app.js', 'resources/css/style.css'])
  <title>{{ !empty($title) ? $title . ' - ' . config('app.name', 'Giggles Wiggles') : config('app.name', 'Giggles Wiggles') }}</title>


</head>
<body>

<!-- Desktop view -->
@if(Session::has('success'))
<div class="alert alert-success" id="success">
  {{Session::pull('success')}}
</div>
@endif

@if(Session::has('danger'))
<div class="alert alert-danger" id="danger">
  {{Session::pull('danger')}}
</div>
@endif
<header class="bg-primary pt-5 d-none d-lg-block">
  <div class="container">
    <div class="row mt-3" id="header-row-desktop">
      <div class="col-md-3">
        <!-- Logo on the left -->
        <a href="{{ route('home') }}"><img src="/images/logo.png" alt="Logo" class="img-fluid"></a>
        
      </div>
      
      <div class="col-md-6">
        <!-- Search bar in the middle -->
          <form id="header-search-desktop" method="get" action="{{ route('product.search') }}">

            <input class="form-control mr-0" type="search" name="search" 
                  placeholder="Search here" aria-label="Search" 
                  value="{{ request('search') }}">
                 
            <input class=searchButton type="submit" value="Search" hidden />
          </form>
        </div>

      <div class="col-md-3 text-right">
         <!-- Display login and register links if the user is not authenticated -->
          @guest
            <span><a href="{{ route('login') }}" class="text-dark mx-2 text-decoration-none">Login</a> | <a href="{{ route('register') }}" class="text-dark mx-2 text-decoration-none">Register</a></span>
            <span class="pl-2"><a href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart text-dark"></i></a></span>
            @if(session()->has('cart'))
                <?php $itemCount = array_sum(array_column(session('cart'), 'quantity')); ?>
                <span class="cart-badge">{{ $itemCount }}</span>
            @endif
          @else

          
          @if(auth()->user()->is_admin)  

                <span>
                  <span><a href="{{ route('admin.dashboard') }}" class="text-dark mx-2 text-decoration-none">Dashboard</a> |
                  <a href="{{ route('logout') }}" class="text-dark mx-2 text-decoration-none" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> </span>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @else
                  <span><a href="{{ route('page.profile') }}" class="text-dark mx-2 text-decoration-none">Profile</a> | 
                  <a href="{{ route('logout') }}" class="text-dark mx-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> </span>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @endif

            <span class="pl-2"><a href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart text-dark"></i></a></span>
            @if(session()->has('cart'))
                <?php $itemCount = array_sum(array_column(session('cart'), 'quantity')); ?>
                <span class="cart-badge">{{ $itemCount }}</span>
            @endif
          @endguest

      </div>
    </div>
  </div>
</header>

<!-- Tablet view -->
@if(Session::has('success'))
<div class="alert alert-success" id="success">
  {{Session::pull('success')}}
</div>
@endif

@if(Session::has('danger'))
<div class="alert alert-danger" id="danger">
  {{Session::pull('danger')}}
</div>
@endif
<header class="bg-primary pt-5 d-none d-md-block d-lg-none">
  <div class="container">
    <div class="row mt-3" id="header-row-tablet">
      <div class="col-md-3">
        <!-- Logo on the left -->
        <a href="{{ route('home') }}"><img src="/images/logo.png" alt="Logo" class="img-fluid"></a>
      </div>
      
      <div class="col-md-5">
        <!-- Search bar in the middle -->
        <!-- <form id="header-search" class="form-inline "> -->
          <form id="header-search-tablet" method="get" action="{{ route('product.search') }}">

            <input class="form-control mr-0" type="search" name="search" 
                  placeholder="Search here" aria-label="Search" 
                  value="{{ request('search') }}">
                 
            <input class=searchButton type="submit" value="Search" hidden />
          </form>
        </div>

      <div class="col-md-4 text-right">
         <!-- Display login and register links if the user is not authenticated -->
          @guest
            <span><a href="{{ route('login') }}" class="text-dark mx-2 text-decoration-none">Login</a> | <a href="{{ route('register') }}" class="text-dark mx-2 text-decoration-none">Register</a></span>
            <span class="pl-2"><a href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart text-dark"></i></a></span>
            @if(session()->has('cart'))
                <?php $itemCount = array_sum(array_column(session('cart'), 'quantity')); ?>
                <span class="cart-badge">{{ $itemCount }}</span>
            @endif
          @else

          
          @if(auth()->user()->is_admin)  

                <span>
                  <span><a href="{{ route('admin.dashboard') }}" class="text-dark mx-2 text-decoration-none">Dashboard</a> |
                  <a href="{{ route('logout') }}" class="text-dark mx-2 text-decoration-none" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> </span>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @else
                  <span><a href="{{ route('page.profile') }}" class="text-dark mx-2 text-decoration-none">Profile</a> | 
                  <a href="{{ route('logout') }}" class="text-dark mx-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> </span>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @endif

            <span class="pl-2"><a href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart text-dark"></i></a></span>
            @if(session()->has('cart'))
                <?php $itemCount = array_sum(array_column(session('cart'), 'quantity')); ?>
                <span class="cart-badge">{{ $itemCount }}</span>
            @endif
          @endguest

      </div>
    </div>
  </div>
</header>


<!-- Header - mobile view-->
@if(Session::has('success'))
<div class="alert alert-success" id="success">
  {{Session::pull('success')}}
</div>
@endif

@if(Session::has('danger'))
<div class="alert alert-danger" id="danger">
  {{Session::pull('danger')}}
</div>
@endif

<header class="bg-primary pt-5 d-block d-sm-block d-md-none">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}"><img src="/images/logo.png" alt="Logo" class="img-fluid"></a>

          <div class="d-flex align-items-center">
         <!-- Display logout link if the user is authenticated -->
         
         @guest
            <span><a href="{{ route('login') }}" class="text-dark mx-2 text-decoration-none left-padding ">Login</a> | <a href="{{ route('register') }}" class="text-dark mx-2 text-decoration-none">Register</a></span>
            <span class="pl-2"><a href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart text-dark"></i></a></span>
            @if(session()->has('cart'))
                <?php $itemCount = array_sum(array_column(session('cart'), 'quantity')); ?>
                <span class="cart-badge">{{ $itemCount }}</span>
            @endif
          @else

          
          @if(auth()->user()->is_admin)  

                <span>
                  <span><a href="{{ route('admin.dashboard') }}" class="text-dark mx-2 text-decoration-none">Dashboard</a> |
                  <a href="{{ route('logout') }}" class="text-dark mx-2 text-decoration-none" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> </span>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @else
                  <span><a href="{{ route('page.profile') }}" class="text-dark mx-2">Profile</a> | 
                  <a href="{{ route('logout') }}" class="text-dark mx-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> </span>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @endif

            <span class="pl-2"><a href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart text-dark"></i></a></span>
            @if(session()->has('cart'))
                <?php $itemCount = array_sum(array_column(session('cart'), 'quantity')); ?>
                <span class="cart-badge">{{ $itemCount }}</span>
            @endif
          @endguest
          </div>
        </div>
    </div>
  </div>
</header>


  @include('layouts.nav')
 
<main>
    @yield('content')
</main>


@yield('scripts')

@include('layouts.footer')