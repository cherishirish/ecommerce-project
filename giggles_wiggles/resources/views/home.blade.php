@extends('layouts.frontend')

@section('content')

<!-- Desktop view Slider -->
<div class="d-none d-lg-block">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> 
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="images/banner-1.jpg" alt="First slide">
            <div class="carousel-caption top-36">
                <h2 class="banner-heading text-shadow">Welcome to Giggles Wiggles</h2>
                <a class="btn btn-primary text-dark mt-3" href="{{ route('product.index') }}">Shop Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/banner-2.jpg" alt="Second slide">
            <div class="carousel-caption top-36">
                <h2 class="banner-heading text-shadow">Make Your Own Registry</h2>
                <a class="btn btn-primary text-dark mt-3" href="#">Shop Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/banner-3.jpg" alt="Third slide">
            <div class="carousel-caption top-36">
                <h2 class="banner-heading text-shadow">Get to Know About Us</h2>
                <a class="btn btn-primary text-dark mt-3" href="{{ route('page.about') }}">Shop Now</a>
            </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
</div>

<!-- Tablet view Slider -->
<div class="d-none d-md-block d-lg-none">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> 
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="images/banner-1.jpg" alt="First slide">
            <div class="carousel-caption">
                <h2 class="tablet-banner-heading text-shadow">Welcome to Giggles Wiggles</h2>
                <a class="btn btn-primary text-dark mt-3" href="{{ route('product.index') }}">Shop Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/banner-2.jpg" alt="Second slide">
            <div class="carousel-caption">
                <h2 class="tablet-banner-heading text-shadow">Make Your Own Registry</h2>
                <a class="btn btn-primary text-dark mt-3" href="#">Shop Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/banner-3.jpg" alt="Third slide">
            <div class="carousel-caption">
                <h2 class="tablet-banner-heading text-shadow">Get to Know About Us</h2>
                <a class="btn btn-primary text-dark mt-3" href="{{ route('page.about') }}">Shop Now</a>
            </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
</div>

<!-- Mobile view slider -->
<div class="d-block d-sm-block d-md-none">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/images/mobile-banner-1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="text-dark text-shadow">Welcome to Giggles Wiggles</h5>
          <a class="btn btn-primary text-dark" href="{{ route('product.index') }}">Shop now</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/images/mobile-banner-2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="text-dark text-shadow">Make Your Own Registry</h5>
          <a class="btn btn-primary text-dark" href="#">Shop now</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/images/mobile-banner-3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="text-dark text-shadow">Get to Know About Us</h5>
          <a class="btn btn-primary text-dark" href="{{ route('page.about') }}">Shop now</a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<!-- Full-width black title bar -->
<div id="weekly_deals" class="mb-0 mb-md-4">
  Weekly Deals
</div>


<div class="container">
    <div class="row deals_container">
        <div class="col-lg-3 col-md-6 col-sm-6 my-5">
            <div class="card">
                <a href="{{ route('product.show', ['id' => $deals[0]->id]) }}">
                  <img class="card-img-top" src="images/products/{{$deals[0]->image}}" alt="Weekly deal 1">
                </a>
                <div class="card-body w-100">
                    <h5 class="weekly-deal-title text-center">{{$deals[0]->product_name}}</h5>
                    <div class="deal_info">
                        <p class="old_price">${{$deals[0]->price + 10}}</p>
                        <p class="deal_price">${{$deals[0]->price}}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 my-5">
            <div class="card">
                <a href="{{ route('product.show', ['id' => $deals[1]->id]) }}">
                  <img class="card-img-top" src="images/products/{{$deals[1]->image}}" alt="Weekly deal 2">
                </a>
                <div class="card-body w-100">
                    <h5 class="weekly-deal-title text-center">{{$deals[1]->product_name}}</h5>
                    <div class="deal_info">
                        <p class="old_price">${{$deals[1]->price + 10}}</p>
                        <p class="deal_price">${{$deals[1]->price}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 my-5">
            <div class="card">
                <a href="{{ route('product.show', ['id' => $deals[2]->id]) }}">
                  <img class="card-img-top" src="images/products/{{$deals[2]->image}}" alt="Weekly deal 3">
                </a>
                <div class="card-body w-100">
                    <h5 class="weekly-deal-title text-center">{{$deals[2]->product_name}}</h5>
                    <div class="deal_info">
                        <p class="old_price">${{$deals[2]->price + 10}}</p>
                        <p class="deal_price">${{$deals[2]->price}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 my-5">
            <div class="card">
                <a href="{{ route('product.show', ['id' => $deals[3]->id]) }}">
                  <img class="card-img-top" src="images/products/{{$deals[3]->image}}" alt="Weekly deal 4">
                </a>    
                <div class="card-body w-100">
                    <h5 class="weekly-deal-title text-center">{{$deals[3]->product_name}}</h5>
                    <div class="deal_info">
                        <p class="old_price">${{$deals[3]->price + 10}}</p>
                        <p class="deal_price">${{$deals[3]->price}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- shop -->
<div class="container mt-5 px-3 px-md-0 section-animation">
    <div class="row">
      <!-- Left column with one big image, title, and button -->
      <div class="col-md-8 position-relative mb-3">
          <img src="/images/grid-apparel.jpg" class="img-fluid" alt="Big Image">
          <div class="image-overlay">
          <h2 class="card-title font-35 mb-3">Apparel</h2>
          <a href="{{ route('product.index', ['category_id' => 1]) }}" class="btn btn-primary text-dark font-weight-bold">View Details</a>
          </div>
      </div>
  
      <!-- Right column with three images matching the height of the left side image -->
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12 mb-3">
            <img src="/images/grid-small-furniture.jpg" class="img-fluid" alt="Small Image 1">
            <div class="image-overlay">
                <h5 class="card-title font-35 mb-3">Furniture</h5>
                <a href="{{ route('product.index', ['category_id' => 2]) }}" class="btn btn-primary text-dark font-weight-bold">View Details</a>
            </div>
          </div>
          <div class="col-md-12 mb-3">
            <img src="/images/grid-small-toy.jpg" class="img-fluid" alt="Small Image 2">
            <div class="image-overlay">
                <h5 class="card-title font-35 mb-3">Toys</h5>
                <a href="{{ route('product.index', ['category_id' => 3]) }}" class="btn btn-primary text-dark font-weight-bold">View Details</a>
            
            </div>
          </div>
          <div class="col-md-12">
            <img src="/images/grid-small-bedding.jpg" class="img-fluid" alt="Small Image 3">
            <div class="image-overlay">
                <h5 class="card-title font-35 mb-3">Bedding</h5>
                <a href="{{ route('product.index', ['category_id' => 4]) }}" class="btn btn-primary text-dark font-weight-bold">View Details</a>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr class="custom-hr">


<!-- Bestsellers - Three-Column Layout -->
<div class="container my-5 px-3 px-md-0 section-animation">
    <div class="row">
      <!-- First column with a big title, centered and left-aligned, and a "Shop Now" button -->
      <div class="col-md-4 d-flex flex-column align-items-start justify-content-center">
        <h2 class="font-weight-bold text-center mb-4">Our Bestsellers</h2>
        <a href="{{ route('product.index') }}" class="btn btn-primary text-dark font-weight-bold mb-2">Shop Now</a>
      </div>
  
      <!-- Second column with two cards -->
      <div class="col-md-4 py-2">
          <div class="card position-relative">
              <img src="/images/bestseller-winterjacket.jpg" class="card-img rounded-corner" alt="Best Winter Jacket">
              <div class="card-img-overlay overlay">
                  <div class="overlay-content">
                      <h4 class="card-title text-dark">Winter Jacket</h4>
                      <a href="{{ route('product.index', ['category_id' => 1]) }}" class="btn btn-primary">Shop Now</a>
                  </div>
              </div>
          </div>
      </div>

      <!-- Third column with two cards -->
      <div class="col-md-4 py-2">
          <div class="card position-relative">
              <img src="/images/bestseller-stroller.jpg" class="card-img rounded-corner" alt="Baby Stroller">
              <div class="card-img-overlay overlay">
                  <div class="overlay-content">
                      <h4 class="card-title text-dark">Baby Stroller</h4>
                      <a href="{{ route('product.index', ['category_id' => 6]) }}" class="btn btn-primary">Shop Now</a>
                  </div>
              </div>
          </div>
      </div>

    </div>
</div>



@endsection