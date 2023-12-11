<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$title}}</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" >
    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <!-- Include Vite assets -->
   
    @vite(['resources/views/admin/css/sb-admin-2.css'])

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                
                <div class="sidebar-brand-text mx-3"><img src="/images/dashboard_logo.png" alt="" width=200 style="margin: 0 20px 20px 0"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
           
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span
                    
                    <?php if(basename($_SERVER['SCRIPT_FILENAME']) == 'index.php') : ?>
                        
                        style="text-decoration:underline;text-underline-position:under"
                    
                     <?php endif ?>>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users')}}"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Categories</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <hr class="sidebar-divider d-none d-md-block">

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
<!--  -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->

                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create User</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <form method="post" action="{{route('admin.users.store')}}" class="form" enctype="multipart/form-data" novalidate style="width:50%">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="emailHelp"
                                value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="emailHelp"
                                value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                            
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input autocomplete="off" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                                value="{{old('email')}}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="email" class="form-control" name="address" id="address" aria-describedby="emailHelp"
                                value="{{old('address')}}">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="email" class="form-control" name="city" id="city" aria-describedby="emailHelp"
                                value="{{old('city')}}">
                                @error('city')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="province">Province</label>
                                <select class="custom-select" id="province" name="province">
                                <option value="MB" >MB</option>
                                <option value="SK" >SK</option>
                                <option value="AB" >AB</option>
                                <option value="BC" >BC</option>
                                <option value="NS" >NS</option>
                                <option value="NB" >NB</option>
                                <option value="QC" >QC</option>
                                <option value="ON" >ON</option>
                                <option value="YT" >YT</option>
                                <option value="NT" >NT</option>
                                <option value="NU" >NU</option>
                                <option value="NL" >NL</option>
                                <option value="PE" >PE</option>
                                </select>
                                @error('province')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="postal_code" class="form-control" name="postal_code" id="postal_code" aria-describedby="emailHelp"
                                value="{{ old('province') }}">
                                @error('postal_code')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                >
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="is_admin">Admin Status</label>
                                <select class="custom-select" id="admin_status" name="is_admin">
                                <option value=0 >Non-Admin</option>
                                <option value="1" >Admin</option>
                                </select>
                                @error('is_admin')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror 
                            </div>
                            <div>
                                <input type="hidden" name="address_type" id="address_type" value="billing">

                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                           
                        </form>
                        
                    </div>

                    <!-- Content Row -->

                    

                        
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>