<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yummy | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
@if (Auth::user())
    <div class="wrapper">


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('dashboard') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ '/' }}" class="nav-link">Website</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{-- <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li> --}}


                <!-- Notifications Dropdown Menu -->
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                        <i class="far fa-bell"></i>--}}
{{--                        @if ( Auth::user()->unreadNotifications->count() > 0)--}}
{{--                            <span class="badge badge-warning navbar-badge">{{ Auth::user()->unreadNotifications->count() }}</span>--}}
{{--                        @endif--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                            <span--}}
{{--                                    class="dropdown-item dropdown-header">{{ Auth::user()->unreadNotifications->count() }}--}}
{{--                                Notifications</span>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        @foreach (Auth::user()->unreadNotifications as $unreadNotification)--}}
{{--                            <a href="{{ '/dashboard/bookedTable' }}" class="dropdown-item">--}}
{{--                                <i class="fas fa-envelope mr-2">{{ $unreadNotification->data['created_user'] }}</i>--}}
{{--                                <p> {{ $unreadNotification->data['notification_content'] }} </p>--}}
{{--                                <span--}}
{{--                                        class="float-right text-muted text-sm">{{ $unreadNotification->created_at }}</span>--}}
{{--                            </a>--}}
{{--                        @endforeach--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="/dashboard/bookedTable" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--                    </div>--}}

{{--                </li>--}}

                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="dropdown-item" href="{{route('logout')}}"> Logout </a>

                    </li>
                </ul>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true"
                       href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('dashboard') }}" class="brand-link">
                <img src="{{ asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Yummy Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{url('admin/img/user/', Auth::user()->image )}}"
                             class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                               aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Yummy Pages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item menu">
                                    <a href="#" class="nav-link active">
                                        <p>Book table
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{route('book_table')}}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Booked table </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('ConfirmedBookTable')}}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Confirmed Book table </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item menu">
                                    <a href="#" class="nav-link active">
                                        <p>
                                            Menu
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{route('category')}}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Categories </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('product')}}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Products </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item menu">
                                    <a href="#" class="nav-link active">
                                        <p>
                                            Contact Us
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">

                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Mail </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                @if (Auth::user())
                                    <li class="nav-item menu">
                                        <a href="{{route('user')}}" class="nav-link active">
                                            <p>
                                                Users
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">

                                            <li class="nav-item">
                                                <a href="{{route('user')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Users </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item menu">
                                        <a href="#" class="nav-link active">
                                            <p>
                                                Edit Website
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{route('cover')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Cover </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('chef')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Chefs </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('about')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>About </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('WhyChooseYummy')}}"
                                                   class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Why choose yummy?</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Stats </p>
                                                </a>

                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('testimonial')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Testimonials </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('event')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Events </p>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="{{route('gallery')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Gallery </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('contact')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Contact Details </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif

                                {{--           <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Simple Link
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li> --}}
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Control Sidebar -->
            {{--   <aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
<div class="p-3">
  <h5>Title</h5>
  <p>Sidebar content</p>
</div>
</aside> --}}
            <!-- /.control-sidebar -->
            @yield('content')
            <footer class="main-footer"
                    style="
  bottom: 0;
  left: 0;
  position: fixed;
  right: 0;
  z-index: $zindex-main-footer;">
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0
                </div>
            </footer>
            @elseif (Auth::user())
                <a class="dropdown-item" href="{{route('logout')}}"> Logout </a>
            @endif
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('admin/plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('admin/plugins/moment/moment.min.js')}}"></script>
        <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin/dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('admin/dist/js/demo.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('admin/dist/js/pages/dashboard.js')}}"></script>

    </div>
</body>

</html>
