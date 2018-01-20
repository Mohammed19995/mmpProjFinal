<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('admin/css/fontastic.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    @yield('css')
</head>

<body>

<div class="page home-page">
    <!-- Main Navbar-->
    <header class="header">
        <nav class="navbar">
            <!-- Search Box-->
            <div class="search-box">
                <button class="dismiss"><i class="icon-close"></i></button>
                <form id="searchForm" action="#" role="search">
                    <input type="search" placeholder="What are you looking for..." class="form-control">
                </form>
            </div>
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <!-- Navbar Header-->
                    <div class="navbar-header">
                        <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                            <div class="brand-text brand-big"><span>Admin </span><strong>Dashboard</strong></div>
                        </a>
                        <!-- Toggle Button--><a id="toggle-btn" href="#"
                                                class="menu-btn active"><span></span><span></span><span></span></a>
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Search-->
                        <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i
                                        class="icon-search"></i></a></li>
                        <!-- Notifications-->
                        <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#"
                                                         data-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false" class="nav-link"><i
                                        class="fa fa-bell-o"></i><span class="badge bg-red">12</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                        <div class="notification">
                                            <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You
                                                have 6 new messages
                                            </div>
                                            <div class="notification-time">
                                                <small>4 minutes ago</small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                        <div class="notification">
                                            <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You
                                                have 2 followers
                                            </div>
                                            <div class="notification-time">
                                                <small>4 minutes ago</small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                        <div class="notification">
                                            <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server
                                                Rebooted
                                            </div>
                                            <div class="notification-time">
                                                <small>4 minutes ago</small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                        <div class="notification">
                                            <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You
                                                have 2 followers
                                            </div>
                                            <div class="notification-time">
                                                <small>10 minutes ago</small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">
                                        <strong>view all notifications </strong></a></li>
                            </ul>
                        </li>
                        <!-- Messages                        -->
                        <li class="nav-item dropdown"><a id="messages" rel="nofollow" data-target="#" href="#"
                                                         data-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false" class="nav-link"><i
                                        class="fa fa-envelope-o"></i><span class="badge bg-orange">10</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"><img src="{{asset('admin/img/avatar-1.jpg')}}"
                                                                      alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                                        </div>
                                    </a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"><img src="{{asset('admin/img/avatar-2.jpg')}}"
                                                                      alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                                        </div>
                                    </a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"><img src="{{asset('admin/img/avatar-3.jpg')}}"
                                                                      alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                                        </div>
                                    </a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">
                                        <strong>Read all messages </strong></a></li>
                            </ul>
                        </li>
                        <!-- Logout    -->
                        <li class="nav-item"><a href="login.html" class="nav-link logout">Logout<i
                                        class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="{{asset('admin/img/avatar-1.jpg')}}" alt="..."
                                         class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h4">Mark Stephen</h1>
                    <p>Web Designer</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class="active"><a href="{{url('adminApp/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i
                                class="fa fa-book"></i>Library </a>
                    <ul id="dashvariants" class="collapse list-unstyled">
                        <li><a href="{{url('adminApp/lib/cat')}}"><i class="fa fa-tags"></i> Category</a></li>
                        <li><a href="{{url('adminApp/lib/addBook')}}"><i class="fa fa-plus-circle"></i> Add Book</a>
                        </li>
                        <li><a href="{{url('adminApp/lib/viewBook')}}"><i class="fa fa-eye"></i> View Books</a></li>


                    </ul>
                </li>
                <li><a href="#dashvariants2" aria-expanded="false" data-toggle="collapse"> <i
                                class="icon-mail"></i>Advisory opinion </a>
                    <ul id="dashvariants2" class="collapse list-unstyled">
                        <li><a href="{{url('adminApp/fatawi/cat')}}"><i class="fa fa-tags"></i> Category</a></li>
                        <li><a href="{{url('adminApp/addFatwa')}}"><i class="fa fa-plus-circle"></i> Add Advisory</a></li>
                        <li><a href="{{url('adminApp/showNotAnswer')}}"><i class="fa fa-eye"></i> View Not Answer</a></li>
                        <li><a href="{{url('adminApp/showAnswer')}}"><i class="fa fa-eye"></i> View  Answered</a></li>



                    </ul>
                </li>

            </ul>

            </li>

            </ul>

            <span class="heading">Extras</span>
            <ul class="list-unstyled">
                <li><a href="#"> <i class="icon-flask"></i>Demo </a></li>
                <li><a href="#"> <i class="icon-screen"></i>Demo </a></li>
                <li><a href="#"> <i class="icon-mail"></i>Demo </a></li>
                <li><a href="#"> <i class="icon-picture"></i>Demo </a></li>
            </ul>
        </nav>

        <div class="content-inner">
            <!-- Page Header-->

            @yield('content')

        </div>
    </div>
</div>
<!-- Javascript files-->
<i class="fa fa-minus"></i>
<script src="{{asset('admin/js/jquery3.min.js')}}"></script>
<script src="{{asset('admin/vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('admin/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="{{asset('admin/js/charts-home.js')}}"></script>
<script src="{{asset('admin/js/front.js')}}"></script>
@yield('script')
</body>
</html>