<<<<<<< HEAD
@extends('layouts.frontend')

@section('content')

<section class="py-5">
    <div class="container px-4 px-lg-5">
        <!-- Main Content Header Image-->
        <div class="main-header mb-5">
            <img src="images/breadcrumb.jpg" alt="">
        </div>
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-12 pt-5 pt-md-0">
                <!-- Contact Form -->
                <div>
                    <h2>Contact Us</h2>
                    <form action="#" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
=======
contact
>>>>>>> 2e0166c729c247bebfee7ca488384fc55d8d0986
