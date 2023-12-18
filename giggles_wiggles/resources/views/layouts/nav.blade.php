<!-- Navbar -->

<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <!-- Collapse button -->
    <button class="navbar-toggler third-button ml-auto border-0" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <div class="animated-icon">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- Links -->
      <ul class="navbar-nav mr-auto pt-3 pt-sm-0">
        <li class="nav-item">
          <a class="nav-link text-dark text-uppercase font-weight-bold" href="{{ route('home') }}">Home</a>
        </li>
        @foreach($categories->where('is_nav', 1) as $category)
    <li class="nav-item">
        <a class="nav-link text-dark text-uppercase font-weight-bold" href="{{ route('product.index', ['category_id' => $category->id]) }}">{{ $category->category_name }}</a>
    </li>
@endforeach
        <li class="nav-item">
          <a class="nav-link text-dark text-uppercase font-weight-bold" href="{{ route('registry.index') }}">Registry</a>
        </li>
      </ul>
      <!-- Links -->
    
    </div>
</nav>

<!-- jQuery and Bootstrap JS  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function () {
    $('.third-button').on('click', function () {
      $('.animated-icon').toggleClass('open');
    });

    // Handle click event on the close (X) button
    $('.navbar-toggler').on('click', function () {
      // Toggle the visibility of the navbar
      $('#navbarNav').toggle();
    });
  });
</script>
