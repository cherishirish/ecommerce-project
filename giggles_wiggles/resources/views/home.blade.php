@extends('layouts.frontend')

@section('content')
<!-- Slider -->
<div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="images/banner-1.jpg" class="d-block w-100" alt="Banner 1">
    </div>
    <div class="carousel-item">
        <img src="images/banner-1.jpg" class="d-block w-100" alt="Banner 2">
    </div>
    </div>
    
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
      <i class="fas fa-arrow-left text-dark"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <i class="fas fa-arrow-right text-dark"></i>
        <span class="sr-only">Next</span>
    </a>
</div> 

<!-- Full-width black title bar -->
<div class="container-fluid bg-dark text-light py-3" style="margin: 30px 0" height="200">
    <div class="container text-center">
    <h3 class="font-weight-bold">Top Offer Now</h3>
    </div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <div class="carousel-item active">
        <div class="row d-flex">
            <div class="col"><img class="d-block w-30" src="images/product_fake.jpg" alt="First slide"></div>
            <div class="col"><img class="d-block w-30" src="images/product_fake.jpg" alt="First slide"></div>
            <div class="col"><img class="d-block w-30" src="images/product_fake.jpg" alt="First slide"></div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="row d-flex">
            <div class="col"><img class="d-block w-30" src="images/product_fake.jpg" alt="First slide"></div>
            <div class="col"><img class="d-block w-30" src="images/product_fake.jpg" alt="First slide"></div>
            <div class="col"><img class="d-block w-30" src="images/product_fake.jpg" alt="First slide"></div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="row d-flex">
            <div class="col"><img class="d-block w-30" src="images/product_fake.jpg" alt="First slide"></div>
            <div class="col"><img class="d-block w-30" src="images/product_fake.jpg" alt="First slide"></div>
            <div class="col"><img class="d-block w-30" src="images/product_fake.jpg" alt="First slide"></div>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  
<!-- weekly offer -->
<!-- <div class="container">
    <div id="featuredCarousel" class="carousel slide mt-5" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-3 py-3">
                        <img src="images/product-1.jpg" class="d-block w-100" alt="Product 1">
                        <div class="carousel-caption">
                        <h5>Product 1</h5>
                        <p>Description goes here</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <img src="images/product-1.jpg" class="d-block w-100" alt="Product 1">
                        <div class="carousel-caption">
                        <h5>Product 1</h5>
                        <p>Description goes here</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <img src="images/product-1.jpg" class="d-block w-100" alt="Product 1">
                        <div class="carousel-caption">
                        <h5>Product 1</h5>
                        <p>Description goes here</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <img src="images/product-1.jpg" class="d-block w-100" alt="Product 1">
                        <div class="carousel-caption">
                        <h5>Product 1</h5>
                        <p>Description goes here</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
            <div class="col-6 text-left">
              <a class="btn btn-primary mb-3 mr-1" href="#featuredCarousel" role="button" data-slide="prev">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
            <div class="col-6 text-right">
              <a class="btn btn-primary mb-3 " href="#featuredCarousel" role="button" data-slide="next">
                <i class="fa fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
    </div>
</div> -->

<!-- shop -->
<div class="container mt-5">
    <div class="row">
      <!-- Left column with one big image, title, and button -->
        <div class="col-md-8 position-relative mb-3">
            <img src="images/grid-big.webp" class="img-fluid" alt="Big Image">
            <div class="image-overlay">
            <h5 class="card-title">Big Image Title</h5>
            <a href="#" class="btn btn-primary">View Details</a>
            </div>
        </div>
  
      <!-- Right column with three images matching the height of the left side image -->
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12 mb-3">
            <img src="images/grid-small.jpg" class="img-fluid" alt="Small Image 1">
            <div class="image-overlay">
                <h5 class="card-title">Big Image Title</h5>
                <a href="#" class="btn btn-primary">View Details</a>
            </div>
          </div>
          <div class="col-md-12 mb-3">
            <img src="images/grid-small.jpg" class="img-fluid" alt="Small Image 2">
            <div class="image-overlay">
                <h5 class="card-title">Big Image Title</h5>
                <a href="#" class="btn btn-primary">View Details</a>
            </div>
          </div>
          <div class="col-md-12">
            <img src="images/grid-small.jpg" class="img-fluid" alt="Small Image 3">
            <div class="image-overlay">
                <h5 class="card-title">Big Image Title</h5>
                <a href="#" class="btn btn-primary">View Details</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr class="custom-hr">

<!-- Bestsellers - Three-Column Layout -->
<div class="container my-5">
    <div class="row">
      <!-- First column with a big title, centered and left-aligned, and a "Shop Now" button -->
      <div class="col-md-4 d-flex flex-column align-items-start justify-content-center">
        <h2 class="font-weight-bold text-center mb-4">Big Title</h2>
        <a href="#" class="btn btn-primary">Shop Now</a>
      </div>
  
      <!-- Second column with two cards -->
      <div class="col-md-4 pt-2">
        <div class="card position-relative">
            <img src="images/bestseller.webp" class="card-img rounded-corner" alt="Card Image 1">
            <div class="card-img-overlay">
              <h5 class="card-title">Card Title 1</h5>
            </div>
        </div>
      </div>
  
      <!-- Third column with two cards -->
      <div class="col-md-4 pt-2">
        <div class="card position-relative">
            <img src="images/bestseller.webp" class="card-img rounded-corner" alt="Card Image 1">
            <div class="card-img-overlay">
              <h5 class="card-title">Card Title 1</h5>
            </div>
        </div>
      </div>
    </div>
</div>

  <!-- Parallax Container -->
<div class="parallax-container" style="background-image: url('images/parallax.jpg');">
    <div class="overlay"></div>
    <div class="parallax-text">Subscribe to Newsletter</div>
  </div>


<!-- Footer -->
<footer class="bg-primary text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- Logo on the left in the footer -->
        <img src="images/logo.png" alt="Logo" class="img-fluid">
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
