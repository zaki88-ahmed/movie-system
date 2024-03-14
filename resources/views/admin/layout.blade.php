<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin/css/fontawesome.all.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/css/adminlte.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  @yield('styles')



</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('admin/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/img/user-profile.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin user</a>
        </div>

          <form   id="logout-form" action="{{ url('logout') }}" method="POST" style="display: block; ></form>
          @csrf
           <div class="info">
                <a href="#" class="d-block">Logout</a>
            </div>
          </form>
      </div>




      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">

            <ul class="nav nav-treeview">

            </ul>
          </li>

            <li class="nav-item ">

            </li>

            <li class="nav-item">
                <a href="{{ url("dashboard/admins")}}" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Admins
                    </p>
                </a>
            </li>
            <li class="nav-item">

          <li class="nav-item">
            <a href="{{ url("dashboard/roles")}}" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
              <p>
                  Roles
              </p>
            </a>
          </li>

            <li class="nav-item">
                <a href="{{ url("dashboard/permissions")}}" class="nav-link">
                    <i class="nav-icon fas fa-lock-open"></i>
                    <p>
                        Permissions
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ url("dashboard/categories")}}" class="nav-link">
                    <i class="nav-icon fas fa-project-diagram"></i>
                    <p>
                        Categories
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ url("dashboard/movies")}}" class="nav-link">
                    <i class="nav-icon fas fa-film"></i>
                    <p>
                        Movies
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url("dashboard/reviews")}}" class="nav-link">
                    <i class="nav-icon fas fa-star"></i>
                    <p>
                        Reviews
                    </p>
                </a>
            </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


@yield('main')


   <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('admin/js/jquery.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.js')}}"></script>

<script>



    $('#logout-link').click(function(e){
        e.preventDefault()
        $('#logout-form').submit()
    })
</script>


@yield('scripts')



</body>
</html>
