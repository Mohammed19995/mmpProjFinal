<!DOCTYPE html>
<html class="wide wow-animation smoothscroll scrollTo" lang="en">
<head>
    <!-- Site Title-->
    <title>@yield('title' , "home")</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="keywords" content="intense web design multipurpose template">
    <meta name="date" content="Dec 26">

    <link rel="icon" href="https://livedemo00.template-help.com/wt_58977_v2/images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Hind:400,300,700%7CMontserrat:400,700">

    <link rel="shortcut icon" type="image/x-icon" href="images/fav_touch_icons/favicon.ico"/>
    <link rel="apple-touch-icon" href="images/fav_touch_icons/apple-touch-icon.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="images/fav_touch_icons/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="images/fav_touch_icons/apple-touch-icon-114x114.png"/>

    <!-- IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Google Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,600%7COpen+Sans:400,700,400italic"
          rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{asset('mmp/css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!-- Revolution Slider CSS settings -->
    <link rel="stylesheet" type="text/css" href="{{asset('mmp/js/revolution/css/settings.css')}}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{asset('mmp/js/revolution/css/navigation.css')}}">

    <!-- Owl Carousel CSS -->
    <link href="{{asset('mmp/css/owl.carousel.min.css')}}" rel="stylesheet"/>

    <!-- Template CSS -->

    <link href="{{asset('mmp/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('mmp/test3.css')}}" rel="stylesheet"/>
    <!-- Modernizr -->
    <script src="{{asset('mmp/js/modernizr-3.3.1.min.js')}}"></script>
    <!--
        <link rel="stylesheet" href="https://livedemo00.template-help.com/wt_58977_v2/css/style.css">
    -->
    <style>
        .services .item {
            margin: 0;
            padding: 0;
        }

        .no-padding-bottom-section {
            padding-bottom: 0 !important;
        }

        .no-padding-top-section {
            padding-top: 0 !important;
        }

        .mar-top .item {
            margin-top: -45px;
        }

        .padding-top {
            padding-top: 25px;
        }

        .services .item:hover img {

        }

    </style>

    @yield('css')
</head>
<body>


<!-- BEGIN WRAPPER -->
<div id="wrapper">

    <header class="page-head header-panel-absolute">

        <!-- RD Navbar Transparent-->

        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                 data-sm-device-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed"
                 data-md-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed"
                 data-lg-layout="rd-navbar-static" data-stick-up-offset="95" data-stick-up="true"
                 data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-lg-auto-height="true"
                 data-auto-height="false">
                <div class="rd-navbar-inner">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">

                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap">
                            <span></span></button>

                        <!-- RD Navbar Right Side Toggle-->
                        <button class="rd-navbar-right-side-toggle veil-md" data-rd-navbar-toggle=".right-side">
                            <span></span></button>
                        <div class="shell">
                            <div class="range range-md-middle range-lg-top">
                                <div class="cell-md-3 left-side">
                                    <div class="clearfix text-lg-left text-center">
                                        <!--Navbar Brand-->
                                        <!-- https://livedemo00.template-help.com/wt_58977_v2/images/logo-light-165x76.png-->
                                        <div class="rd-navbar-brand"><a href="index.html"><img width='165' height='76'
                                                                                               src='http://placehold.it/165x76'
                                                                                               alt=''/></a></div>
                                    </div>
                                </div>
                                @if(auth()->check())
                                    <div class="info col-sm-9 text-md-right right-side">


                                        <ul style="list-style-type: none;">
                                            <li>
                                                <a href="{{url('userProfile')}}" style="margin-right: 20px;"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
                                                <a href="{{ url('/logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out"></i>  Logout
                                                </a>


                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @else

                                <div class="cell-md-9 text-md-right right-side">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <span><a href="{{asset('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a> </span>

                                            <span style="padding-left: 10px;"><a href="{{asset('login')}}"><i
                                                            class="fa fa-sign-in"></i> login </a></span>
                                        </div>
                                    </div>

                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="rd-navbar-menu-wrap">
                        <div class="rd-navbar-nav-wrap">
                            <div class="rd-navbar-mobile-scroll">
                                <div class="rd-navbar-mobile-header-wrap">
                                    <!--Navbar Brand Mobile-->
                                    <div class="rd-navbar-mobile-brand"><a href="{{url('index')}}"><img width='165'
                                                                                                  height='76'
                                                                                                  src='http://placehold.it/165x76'
                                                                                                  alt=''/></a><a
                                                class="rd-navbar-mobile-search-toggle mdi"
                                                data-custom-toggle="rd-navbar-search-mobile" href="#"><span></span></a>
                                    </div>
                                    <!--RD Navbar Mobile Search-->
                                    <div class="rd-navbar-search-mobile" id="rd-navbar-search-mobile">
                                        <form class="rd-navbar-search-form search-form-icon-right rd-search"
                                              action="search-results.html" method="GET">
                                            <div class="form-group">
                                                <label class="form-label" for="rd-navbar-mobile-search-form-input">Search</label>
                                                <input class="rd-navbar-search-form-input form-control form-control-gray-lightest"
                                                       id="rd-navbar-mobile-search-form-input" type="text" name="s"
                                                       autocomplete="off"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <li class="active"><a href="{{url('home')}}">Home</a>
                                    </li>

                                    <li class="mosque"><a href="{{asset('mosque')}}">Mosque</a>

                                    </li>

                                    <li class="library"><a href="{{url('library')}}">Library</a>
                                    </li>

                                    <li><a href="#">Courses</a>
                                    </li>

                                    <li class="fatwa"><a href="{{asset('Fatwa')}}">Fatwa </a>

                                    </li>
                                    <li class="gallery"><a href="#">Activity</a>
                                        <ul class="rd-navbar-dropdown">
                                            <li><a href="{{url('gallery')}}">Gallery</a>
                                            </li>
                                            <li><a href="blog-2-columns-layout.html">videos</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a href="contacts.html">Contacts</a>

                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!--RD Navbar Search-->
                        <div class="rd-navbar-search"><a class="rd-navbar-search-toggle mdi"
                                                         data-rd-navbar-toggle=".rd-navbar-search"
                                                         href="#"><span></span></a>
                            <form class="rd-navbar-search-form search-form-icon-right rd-search"
                                  action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                                <div class="form-group">
                                    <label class="form-label" for="rd-navbar-search-form-input">Search</label>
                                    <input class="rd-navbar-search-form-input form-control form-control-gray-lightest"
                                           id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                                    <div class="rd-search-results-live" id="rd-search-results-live"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </header>

@yield('content')
<!-- BEGIN FOOTER -->
    <footer id="footer">
        <div id="footer-top" class="container">
            <div class="row">
                <div class="block col-sm-6">
                    <a href="index.html" class="footer-logo"><img src="http://placehold.it/165x76"
                                                                  alt="mmp Logo"/></a>

                    <p>mmp is a simple clean and modern HTML template perfect to promote any business. This template
                        has a lot of useful features and it's highly customizable so you can turn it into your own
                        awesome website.</p>

                    <!-- BEGIN SOCIAL NETWORKS -->
                    <ul class="social-networks">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                    <!-- END SOCIAL NETWORKS -->
                </div>

                <div class="block col-sm-6">
                    <h4>Get in Touch</h4>
                    <p>mmp is a simple clean and modern HTML template perfect to promote any business.</p>
                    <ul class="footer-contacts">
                        <li><label><i class="fa fa-phone"></i> Phone Number:</label> +351 123 456 789</li>
                        <li><label><i class="fa fa-envelope-o"></i> E-mail:</label> <a
                                    href="mailto:email@yourbusiness.com">email@yourbusiness.com</a></li>
                        <li><label><i class="fa fa-clock-o"></i> Business Hours:</label> Monday - Friday 10AM - 7PM</li>
                    </ul>
                </div>
                <!--
                               <div class="block col-sm-4">
                                    <h4>Latest Posts</h4>
                                    <ul class="footer-latest-posts">
                                        <li>
                                            <div class="image">
                                                <a href="blog-detail.html"><img src="http://placehold.it/60x60" alt=""/></a>
                                            </div>
                                            <div class="title">
                                                <a href="blog-detail.html">5 Ways to Make Your Website Stand Out. <span class="date">April 15, 2017</span><i
                                                            class="fa fa-angle-right"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <a href="blog-detail.html"><img src="http://placehold.it/60x60" alt=""/></a>
                                            </div>
                                            <div class="title">
                                                <a href="blog-detail.html">How to Succeed With Design Thinking. <span class="date">April 15, 2017</span><i
                                                            class="fa fa-angle-right"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <a href="blog-detail.html"><img src="http://placehold.it/60x60" alt=""/></a>
                                            </div>
                                            <div class="title">
                                                <a href="blog-detail.html">Designing for Mobile App Commerce. <span class="date">April 15, 2017</span><i
                                                            class="fa fa-angle-right"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                -->
            </div>
        </div>


        <!-- BEGIN COPYRIGHT -->
        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        &copy; 2017 mmp - Multi-Purpose template. All rights reserved. Developed by <a
                                href="http://www.wiselythemes.com" target="_blank">WiselyThemes</a>

                        <ul class="footer-links">
                            <li><a href="{{url('index')}}">Home</a></li>
                            <li><a href="#">Mosque</a></li>
                            <li><a href="#">Library</a></li>


                        </ul>

                    </div>
                </div>
            </div>

            <a href="#header" class="to-top scrollto"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- END COPYRIGHT -->

    </footer>
    <!-- END FOOTER -->

</div>
<!-- END WRAPPER -->

<script src="{{asset('mmp/js/jquery-1.11.3.min.js')}}"></script>

<!-- Libs -->

<script src="{{asset('mmp/js/common.js')}}"></script>

<script src="{{asset('mmp/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('mmp/js/owl.carousel.min.js')}}"></script>



<script src="{{asset('mmp/js/countUp.min.js')}}"></script>
<script src="{{asset('mmp/js/variables.js')}}"></script>


<script src="{{asset('mmp/js/scripts.js')}}"></script>


<!-- SLIDER REVOLUTION JS FILES -->
<script type="text/javascript" src="{{asset('mmp/js/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('mmp/js/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>


<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript"
        src="{{asset('mmp/js/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('mmp/js/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('mmp/js/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('mmp/js/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('mmp/js/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('mmp/js/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('mmp/js/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('mmp/js/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('mmp/js/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>


<!-- Template Scripts -->
<script src="{{asset('mmp/js/variables.js')}}"></script>

<script src="{{asset('mmp/js/scripts.js')}}"></script>


<script src="https://livedemo00.template-help.com/wt_58977_v2/js/core.min.js"></script>

<script src="{{asset('mmp/script.js')}}"></script>



<span id="nav-section"></span>

@yield('script')

</body>
</html>