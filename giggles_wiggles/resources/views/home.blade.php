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
<div id="weekly_deals">
  Weekly Deals
</div>
<div id="deals_container">
              <div class="col deal_box">
                <div class="deal_image">
                  <a href="{{ route('product.show', ['id' => $deals[0]->id]) }}">
                    <img class="d-block w-30" src="images/products/{{$deals[0]->image}}" alt="First slide" id="deal_one">
                  </a>
                </div>
                <h2 class="deal_title">{{$deals[0]->product_name}}</h2>
                <div class="deal_info">
                    
                    <p class="old_price">${{$deals[0]->price + 10}}</p>
                    <p class="deal_price">${{$deals[0]->price}}</p>
                </div>
              </div>
              <div class="col deal_box">
              <div class="deal_image">
                  <a href="{{ route('product.show', ['id' => $deals[1]->id]) }}">
                    <img class="d-block w-30" src="images/products/{{$deals[1]->image}}" alt="First slide" id="deal_two">
                  </a>
                </div>
                <h2 class="deal_title">{{$deals[1]->product_name}}</h2>
                <div class="deal_info">
                    
                    <p class="old_price">${{$deals[1]->price + 10}}</p>
                    <p class="deal_price">${{$deals[1]->price}}</p>
                </div>
              </div>
              <div class="col deal_box">
              <div class="deal_image">
                  <a href="{{ route('product.show', ['id' => $deals[2]->id]) }}">
                    <img class="d-block w-30" src="images/products/{{$deals[2]->image}}" alt="First slide" id="deal_three">
                  </a>
                </div>
                <h2 class="deal_title">{{$deals[2]->product_name}}</h2>
                <div class="deal_info">
                    <p class="old_price">${{$deals[2]->price + 10}}</p>
                    <p class="deal_price">${{$deals[2]->price}}</p>
                </div>
              </div>
              <div class="col deal_box">
              <div class="deal_image">
                <a href="{{ route('product.show', ['id' => $deals[3]->id]) }}">
                  <img class="d-block w-30" src="images/products/{{$deals[3]->image}}" alt="First slide" id="deal_four">
                </a>
              </div>
                <h2 class="deal_title">{{$deals[3]->product_name}}</h2>
                <div class="deal_info">
                    
                    <p class="old_price">${{$deals[3]->price + 10}}</p>
                    <p class="deal_price">${{$deals[3]->price}}</p>
                </div>
              </div>
          </div>
      </div>

  
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