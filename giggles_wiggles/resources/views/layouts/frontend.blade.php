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
      <div class="col-sm-4">
        <!-- Logo on the left -->
        <img src="images/logo.png" alt="Logo" class="img-fluid">
      </div>
     
      <div class="col-sm-8 text-right">
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
      </div>
    </div>
  </div>
</header>

<!-- Header - tablet and desktop view-->
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
      </div>
    </div>
  </div>
</header>

  @include('layouts.nav')


<main>
    @yield('content')
</main>


<!-- Footer -->
<!-- Parallax Container -->
<div class="parallax-container" style="background-image: url('images/parallax.jpg');">
    <div class="overlay"></div>
    <div class="parallax-text">Subscribe to Newsletter</div>
  </div>
<footer class="bg-primary text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- Logo on the left in the footer -->
        <img src="/images/logo.png" alt="Logo" class="img-fluid">
      </div>
      <div class="col-md-3">
        <!-- Column 1 with links -->
        <h5 class="text-dark">Column 1</h5>
        <ul class="list-unstyled">
          <li><a href="#">Link 1</a></li>
          <li><a href="#">Link 2</a></li>
          <li><a href="#">Link 3</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <!-- Column 2 with links -->
        <h5 class="text-dark">Column 2</h5>
        <ul class="list-unstyled">
          <li><a href="#">Link 4</a></li>
          <li><a href="#">Link 5</a></li>
          <li><a href="#">Link 6</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <!-- Column 3 with links -->
        <h5 class="text-dark">Column 3</h5>
        <ul class="list-unstyled">
          <li><a href="#">Link 7</a></li>
          <li><a href="#">Link 8</a></li>
          <li><a href="#">Link 9</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
