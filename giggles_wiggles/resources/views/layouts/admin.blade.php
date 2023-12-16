<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Giggles Wiggles') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/style.css', 'resources/css/app.css', 'resources/js/app.js'])

    <script>
        function confirmDelete(event)
    {
    
        if(confirm("Are you sure you want to delete this user?")){
            document.getElementById("delete").submit;
            
        }else{
            event.preventDefault()
            return;

        }
    }
        
    </script>
</head>
<body>
    @if(Session::has('success'))
    <div class="alert alert-success" id="success">
    {{Session::pull('success')}}
    </div>
    @endif

    @if(Session::has('danger'))
    <div class="alert alert-danger" id="danger">
    {{Session::pull('danger')}}
    </div>
    @endif
    <div id="app">
        <header class="bg-primary">
               
                <div class="logo">
                    <!-- Left Side: Logo -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logo.png" alt="Logo" class="img-fluid m-3" width="160" height="58"> 
                    </a>
                </div>
                <div class="title">
                    <!-- Middle: Title -->
                    <h2 class="navbar-text px-5">
                        {{ $title }}
                    </h2>
                </div>
                <div class="logout">
                    <!-- Right Side: Authentication Links -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>

           
        </header>


        <main id="main">

            <div id="admin_sidebar">
                <ul id="admin_sidebar" class="pt-4">
                    <li><a class="btn btn-primary" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt px-2"></i> Dashboard</a></li>
                    <li><a class="btn btn-primary" href="{{ route('admin.users') }}"><i class="fas fa-users px-2"></i> Users</a></li>
                    <li><a class="btn btn-primary" href="{{ route('admin.categories') }}"><i class="fas fa-th px-2"></i> Categories</a></li>
                    <li><a class="btn btn-primary" href="{{ route('admin.products') }}"><i class="fas fa-box px-2"></i> Products</a></li>
                    <li><a class="btn btn-primary" href="{{ route('admin.orders') }}"><i class="fas fa-shopping-cart px-2"></i> Orders</a></li>
                    <li><a class="btn btn-primary" href="{{ route('admin.brands') }}"><i class="fas fa-tags px-2"></i> Brands</a></li>
                    <li><a class="btn btn-primary" href="{{ route('admin.tax-rates') }}"><i class="fas fa-percent px-2"></i> Tax Rates</a></li>
                </ul>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
