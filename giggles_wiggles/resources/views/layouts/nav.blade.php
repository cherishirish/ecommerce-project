<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <!-- Navbar content -->
    
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link text-dark text-uppercase font-weight-bold" href="{{ route('home') }}">Home</a>
      </li>
      @foreach($categories as $category)
      <li class="nav-item">
        <a class="nav-link text-dark text-uppercase font-weight-bold" href="{{ route('product.index', ['category_id' => $category->id]) }}">{{ $category->category_name }}</a>
      </li>
      @endforeach
    </ul>
  </div>
</nav>