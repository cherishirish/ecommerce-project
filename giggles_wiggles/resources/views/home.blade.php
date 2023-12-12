@extends('layouts.frontend')

@section('content')
<!-- Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/banner-1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/slider.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/banner-1.jpg" alt="Third slide">
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


<!-- Full-width black title bar -->
<div class="container-fluid bg-dark text-light py-3 mb-3" height="200">
    <div class="container text-center">
    <h3 class="font-weight-bold">Top Offers Now</h3>
    </div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <div class="carousel-item active">
        <div class="row d-flex">
            <div class="col deal_box">
              <img class="d-block w-30" src="{{$deals[0]->image}}" alt="First slide">
              <div class="deal_info">
                <h2 class="deal_title">{{$deals[0]->product_name}}</h2>
                <p class="old_price">${{$deals[0]->price - 20}}</p>
                <p>${{$deals[0]->price}}</p>
              </div>
            </div>
            <div class="col deal_box">
              <img class="d-block w-30" src="{{$deals[1]->image}}" alt="First slide">
              <div class="deal_info">
                <h2 class="deal_title">{{$deals[1]->product_name}}</h2>
                <p class="old_price">${{$deals[1]->price - 20}}</p>
                <p>${{$deals[1]->price}}</p>
              </div>
            </div>
            <div class="col deal_box">
              <img class="d-block w-30" src="{{$deals[2]->image}}" alt="First slide">
              <div class="deal_info">
                <h2 class="deal_title">{{$deals[2]->product_name}}</h2>
                <p class="old_price">${{$deals[2]->price - 20}}</p>
                <p>${{$deals[2]->price}}</p>
              </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="row d-flex">
            <div class="col deal_box">
              <img class="d-block w-30" src="{{$deals[3]->image}}" alt="First slide">
              <div class="deal_info">
                <h2 class="deal_title">{{$deals[3]->product_name}}</h2>
                <p class="old_price">${{$deals[3]->price - 20}}</p>
                <p>${{$deals[3]->price}}</p>
              </div>
            </div>
            <div class="col deal_box">
              <img class="d-block w-30" src="{{$deals[4]->image}}" alt="First slide">
              <div class="deal_info">
                <h2 class="deal_title">{{$deals[4]->product_name}}</h2>
                <p class="old_price">${{$deals[4]->price - 20}}</p>
                <p>${{$deals[4]->price}}</p>
              </div>
            </div>
            <div class="col deal_box">
              <img class="d-block w-30" src="{{$deals[5]->image}}" alt="First slide">
              <div class="deal_info">
                <h2 class="deal_title">{{$deals[5]->product_name}}</h2>
                <p class="old_price">${{$deals[5]->price - 20}}</p>
                <p>${{$deals[5]->price}}</p>
              </div>
            </div>
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

<!-- shop -->
<div class="container mt-5">
    <div class="row">
      <!-- Left column with one big image, title, and button -->
      <div class="col-md-8 position-relative mb-3">
          <img src="/images/grid-apparel.jpg" class="img-fluid" alt="Big Image">
          <div class="image-overlay">
          <h2 class="card-title font-35">Apparel</h2>
          <a href="{{ route('product.index', ['category_id' => 1]) }}" class="btn btn-primary text-dark font-weight-bold">View Details</a>
          </div>
      </div>
  
      <!-- Right column with three images matching the height of the left side image -->
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12 mb-3">
            <img src="/images/grid-small.jpg" class="img-fluid" alt="Small Image 1">
            <div class="image-overlay">
                <h5 class="card-title font-35">Furniture</h5>
                <a href="{{ route('product.index', ['category_id' => 2]) }}" class="btn btn-primary text-dark font-weight-bold">View Details</a>
            </div>
          </div>
          <div class="col-md-12 mb-3">
            <img src="/images/grid-small.jpg" class="img-fluid" alt="Small Image 2">
            <div class="image-overlay">
                <h5 class="card-title font-35">Toys</h5>
                <a href="{{ route('product.index', ['category_id' => 3]) }}" class="btn btn-primary text-dark font-weight-bold">View Details</a>
            
            </div>
          </div>
          <div class="col-md-12">
            <img src="/images/grid-small.jpg" class="img-fluid" alt="Small Image 3">
            <div class="image-overlay">
                <h5 class="card-title font-35">Bedding</h5>
                <a href="{{ route('product.index', ['category_id' => 4]) }}" class="btn btn-primary text-dark font-weight-bold">View Details</a>
            
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
        <h2 class="font-weight-bold text-center mb-4">Our Bestsellers</h2>
        <a href="#" class="btn btn-primary text-dark font-weight-bold">Shop Now</a>
      </div>
  
      <!-- Second column with two cards -->
      <div class="col-md-4 pt-2">
        <div class="card position-relative">
            <img src="/images/bestseller.webp" class="card-img rounded-corner" alt="Card Image 1">
            <div class="card-img-overlay">
              <h5 class="card-title">Card Title 1</h5>
            </div>
        </div>
      </div>
  
      <!-- Third column with two cards -->
      <div class="col-md-4 pt-2">
        <div class="card position-relative">
            <img src="/images/bestseller.webp" class="card-img rounded-corner" alt="Card Image 1">
            <div class="card-img-overlay">
              <h5 class="card-title">Card Title 1</h5>
            </div>
        </div>
      </div>
    </div>
</div>



@endsection