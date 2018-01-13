@extends('mmpApp.mmpApp')


@section('content')

    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
    <div id="page-title-2" class=" parallax dark-bg" data-stellar-background-ratio="0.5">
    <div class="container"   >
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-title">Library</h1>

                <ul class="breadcrumb">
                    <li><a href="index.html">Home </a></li>
                    <li><a href="blog-listing1.html">library</a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    <!-- END PAGE TITLE/BREADCRUMB -->

    <!-- BEGIN CONTENT WRAPPER -->
    <div class="content">
        <div class="container">
            <div class="row">

                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-sm-3">

                    <div class="widget widget_search">
                        <form id="searchform" role="search" method="get" action="">
                            <input id="s" class="search" value="" placeholder="Search.." name="s" type="text">
                            <button id="submit_btn" class="search-submit" type="submit"><i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>


                    <div class="widget widget_categories">
                        <h2 class="section-title"><strong>Categories</strong></h2>
                        <ul class="categories">
                            <li><a href="#">Travel tips <span>(2)</span></a></li>
                            <li><a href="#">Photography <span>(1)</span></a></li>
                            <li><a href="#">Travel gear <span>(3)</span></a></li>
                            <li><a href="#">Europe <span>(2)</span></a></li>
                            <li><a href="#">America <span>(6)</span></a></li>
                            <li><a href="#">Asia <span>(1)</span></a></li>
                            <li><a href="#">Blogging advice <span>(1)</span></a></li>
                        </ul>
                    </div>


                    <div class="widget widget_archives">
                        <h2 class="section-title"><strong>Archives</strong></h2>
                        <div id="accordion" class="panel-group">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="">
                                            <i class="fa fa-chevron-right"></i> 2017 (15)
                                        </a>
                                    </div>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">July (3)</a></li>
                                            <li><a href="#">June (4)</a></li>
                                            <li><a href="#">May (1)</a></li>
                                            <li><a href="#">April (2)</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                           class="collapsed">
                                            <i class="fa fa-chevron-right"></i> 2016 (6)
                                        </a>
                                    </div>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">May (1)</a></li>
                                            <li><a href="#">April (2)</a></li>
                                            <li><a href="#">March (1)</a></li>
                                            <li><a href="#">February (2)</a></li>
                                            <li><a href="#">January (1)</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                           class="collapsed">
                                            <i class="fa fa-chevron-right"></i> 2015 (5)
                                        </a>
                                    </div>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">April (1)</a></li>
                                            <li><a href="#">March (1)</a></li>
                                            <li><a href="#">February (2)</a></li>
                                            <li><a href="#">January (1)</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN MAIN CONTENT -->
                <div class="main col-sm-9">

                    <!-- BEGIN BLOG LISTING -->
                    <div id="blog-listing" class="grid-style clearfix">
                        <div class="row">
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="{{asset('images/library/book2.jpg')}}" alt=""/>
                                </div>
                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="{{asset('images/library/book1.jpg')}}" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="{{asset('images/library/book3.jpg')}}" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="{{asset('images/library/book4.jpg')}}" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/550x520" alt=""/>
                                </div>
                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/550x520" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/550x520" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/550x520" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/550x520" alt=""/>
                                </div>
                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/550x520" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/550x520" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/550x520" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> Travel, Photography, Budget</li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">How to Start a Travel Blog – A Step by Step Guide</a>
                                    </h3>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- END BLOG LISTING -->


                    <!-- BEGIN PAGINATION -->
                    <div class="pagination">
                        <div id="previous"><a href="#"><i class="fa fa-angle-left"></i></a></div>
                        <ul>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                        </ul>
                        <div id="next"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                    </div>
                    <!-- END PAGINATION -->

                </div>
                <!-- END MAIN CONTENT -->

            </div>
        </div>
    </div>
    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')

    <script>
        $(document).ready(function () {

            $('.rd-navbar-nav-wrap ul li').each(function (e, v) {
                $(this).removeClass('active');
            });

            $('.rd-navbar-nav-wrap li.library ').addClass('active');
        });

    </script>
@endsection