<!-- Footer -->
<footer class="text-center bg-primary">

<!-- Grid container -->
<div class="container">
  <!-- Section: Form -->
  <section class="">
    <form action="">
      <!--Grid row-->
      <div class="row d-flex justify-content-center">
        <!--Grid column-->
        <div class="col-md-3">
          <p class="pt-2">
            <strong>Subscribe to newsletter</strong>
          </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-7 col-12">
          <!-- Email input -->
          <div class="form-outline form-white mb-4">
            <input type="email" id="form5Example2" class="form-control" />
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-2">
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary mb-4">
            Subscribe
          </button>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </form>
  </section>
  <hr />
  <!-- Section: Form -->
</div>
<!-- Grid container -->



  <!-- Grid container -->
  <div class="container">
    <!-- Section: Links -->
    <section>
      <!-- Grid row-->
      <div class="row text-center d-flex justify-content-center pt-5">
      <a class="nav-link text-dark text-uppercase font-weight-bold" href="{{ route('home') }}">Home</a>
        @foreach($categories as $category)
          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
            <a class="nav-link text-dark text-uppercase font-weight-bold" href="{{ route('product.index', ['category_id' => $category->id]) }}">{{ $category->category_name }}</a>
            </h6>
          </div>
          <!-- Grid column -->
        @endforeach
      </div>
      <!-- Grid row-->
    </section>
    <!-- Section: Links -->

    

  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.1)">
    © 2023 Copyright:
    <a class="text-dark" href="#">CLYK</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
