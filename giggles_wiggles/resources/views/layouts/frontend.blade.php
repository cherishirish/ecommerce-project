<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  

  @vite(['resources/css/style.css'])
  <title>Giggles Wiggles</title>
</head>
<body>

<!-- Header - mobile view-->
<header class="bg-primary pt-5 d-md-none">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <!-- Logo on the left -->
        <img src="images/logo.png" alt="Logo" class="img-fluid">
      
        <!-- Display login and register links if the user is not authenticated -->
        @guest
           <span><a href="{{ route('login') }}" class="text-dark mx-2 pl-5">Login</a> | <a href="{{ route('register') }}" class="text-dark ml-2">Register</a></span>
        
        @endguest

         <!-- Display logout link if the user is authenticated -->
         @auth
            <span><a href="{{ route('logout') }}" class="text-dark mx-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> | <a href="{{ route('page.profile') }}" class="text-dark mx-2">Profile</a></span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          @endauth
      </div>
    </div>
  </div>
</header>

<header class="bg-primary pt-5 d-none d-sm-none d-md-block">
  <div class="container">
    <div class="row mt-3" id="header-row">
      <div class="col-md-3">
        <!-- Logo on the left -->
        <img src="/images/logo.png" alt="Logo" class="img-fluid">
      </div>
      
      <div class="col-md-6">
        <!-- Search bar in the middle -->
        <!-- <form id="header-search" class="form-inline "> -->
          <form id="header-search" method="get" action="{{ route('product.search') }}">

            <input class="form-control mr-0" type="search" name="search" 
                  placeholder="Search here" aria-label="Search" 
                  value="{{ request('search') }}">
                 
            <input class=searchButton type="submit" value="Search" hidden />
          </form>
        </div>

      <div class="col-md-3 text-right">
         <!-- Display login and register links if the user is not authenticated -->
          @guest
            <span><a href="{{ route('login') }}" class="text-dark mx-2">Login</a> | <a href="{{ route('register') }}" class="text-dark mx-2">Register</a></span>
          @endguest

          <!-- Display logout link if the user is authenticated -->
          @auth
            <span><a href="{{ route('logout') }}" class="text-dark mx-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> | <a href="{{ route('page.profile') }}" class="text-dark mx-2">Profile</a></span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          @endauth

        <span class="pl-2"><a href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart text-dark"></i></a></span>
        @if(session()->has('cart'))
            <?php $itemCount = array_sum(array_column(session('cart'), 'quantity')); ?>
            <span class="cart-badge">{{ $itemCount }}</span>
        @endif
      </a>
      </div>
    </div>
  </div>
</header>

  @include('layouts.nav')
 
<main>
    @yield('content')
</main>





<footer class="text-lg-start border border-white mt-xl-5 pt-4 bg-primary">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <h5 class="text-uppercase mb-4 blue-font font-weight-bold">Useful Links</h5>

          <ul class="list-unstyled">
            <li>
                <a href="{{ route('page.about') }}" class="text-dark nav-link text-dark text-uppercase font-weight-bold pl-0">About us</a>
            </li>
            <li>
                <a href="{{ route('page.contact') }}" class="text-dark nav-link text-dark text-uppercase font-weight-bold pl-0">Contact</a>
            </li>
            <li>
                <a href="{{ route('page.profile') }}" class="text-dark nav-link text-dark text-uppercase font-weight-bold pl-0">Profile</a>
            </li>
            <li>
                <a href="#" class="text-dark nav-link text-dark text-uppercase font-weight-bold pl-0">Registry</a>
            </li>
        </ul>

        </div>
        <!--Grid column-->

       
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <h5 class="text-uppercase mb-4 blue-font font-weight-bold">Categories</h5>

          <ul class="list-unstyled">
            
            @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link text-dark text-uppercase font-weight-bold pl-0" href="{{ route('product.index', ['category_id' => $category->id]) }}">{{ $category->category_name }}</a>
            </li>
            @endforeach
            
          </ul>
        </div>
        <!--Grid column -->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <h5 class="text-uppercase mb-4 blue-font font-weight-bold">Sign up to our newsletter</h5>

          <div class="form-outline form-white mb-4">
            <input type="email" id="formsubscribe" class="form-control" placeholder="Email address"/>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Subscribe</button>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 border-top border-secondary font-weight-bold">
      © 2023 Copyright:
      <a class="text-dark " href="#">CLYK</a>
    </div>
    <!-- Copyright -->
  </footer>
  








<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(".alert").fadeTo(1000, 500).slideUp(500, function(){
            $(this).slideUp(500);
        });
    });
</script>

</body>
</html>
