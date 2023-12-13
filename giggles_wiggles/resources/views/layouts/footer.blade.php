

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
          <form action="{{route('home.subscribe')}}" method="post">
            @csrf
            <div class="form-outline form-white mb-4">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email address"/>
            </div>
            <p>
              @error('formsubscribe')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </p>
            <button type="submit" class="btn btn-primary btn-block">Subscribe</button>
          </form>
          
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