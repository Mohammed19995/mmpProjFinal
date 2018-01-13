@extends('mmpApp.mmpApp')


@section('content')

    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
    <div id="page-title" class="parallax dark-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Book Detail</h1>

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home </a></li>
                        <li><a href="blog-listing1.html">library</a></li>
                        <li><a href="blog-listing1.html">Book Detail</a></li>
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
                <div class="main col-sm-8">

                    <img class="blog-main-image" src="http://placehold.it/765x362" alt=""/>

                    <ul class="blog-metas">
                        <li><i class="fa fa-pencil"></i> By John Doe</li>
                        <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                        <li><i class="fa fa-comments-o"></i> 3 Comments</li>
                        <li><i class="fa fa-tags"></i> Tips, Travel, Best Deals</li>
                    </ul>

                    <h1 class="blog-title">How to Start a Travel Blog – A Step by Step Guide</h1>


                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN MAIN CONTENT -->
                <div class="sidebar project-details col-sm-4">

                    <h1 class="section-title">Book <strong>Details</strong></h1>
                    <div class="project-cats">Digital | Web Design</div>

                    <p>Phasellus varius fermentum tortor, sit amet molestie elit faucibus sed. Cras euismod tincidunt
                        risus, vel accumsan lacus aliquet vitae. Morbi in dignissim libero. Cras sed scelerisque est
                        praesent.</p>

                    <ul class="meta-attributes">
                        <li>
                            <div class="attr-name">Client:</div>
                            <div class="attr-detail">Wisely Themes</div>
                        </li>
                        <li>
                            <div class="attr-name">Date:</div>
                            <div class="attr-detail">August 2017</div>
                        </li>
                        <li>
                            <div class="attr-name">Skills:</div>
                            <div class="attr-detail">HTML, CSS, JavaScript, Wordpress</div>
                        </li>
                        <li>
                            <div class="attr-name">Category:</div>
                            <div class="attr-detail">Web Design</div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="attr-name">Language:</div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="attr-detail">


                                        <form>
                                            <select>
                                                <option>Arabic</option>
                                                <option>English</option>
                                                <option>Franch</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('icons/library/pdf.ico')}}  " style="margin-right: 5px" height="30" width="30">
                                    <img src="{{asset('icons/library/power.ico')}} " style="margin-right: 5px" height="30" width="30">
                                    <img src="{{asset('icons/library/word.ico')}} " height="30" width="30">
                                </div>


                            </div>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-default">View Project</a>

                </div>
                <!-- END MAIN CONTENT -->

            </div>
        </div>
        <div class="container">
            <h1 class="section-title">Similar <strong>Books</strong></h1>
            <div class="row">

                <div class="col-sm-1"></div>
                <div class="main col-sm-10">

                    <!-- BEGIN BLOG LISTING -->
                    <div id="blog-listing" class="grid-style clearfix">
                        <div class="row">
                            <div class="item col-xs-12 col-sm-6 col-md-3">
                                <div class="image" >
                                    <a href={{asset("mmpApp/libraryDetail")}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="{{asset('images/library/book2.jpg')}}" alt="" />
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
                                    <img src="{{asset('images/library/book1.jpg')}}"  alt="" />
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
                                    <img src="{{asset('images/library/book3.jpg')}}" alt="" />
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
                                    <img src="{{asset('images/library/book4.jpg')}}" alt="" />
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

                </div>
                <!-- END MAIN CONTENT -->
                <div class="col-sm-1"></div>
            </div>
        </div>

        </div>
    </div>
    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')
    <script >
        $(document).ready(function () {

            $('.rd-navbar-nav-wrap ul li').each(function (e , v) {
                $(this).removeClass('active');
            });

            $('.rd-navbar-nav-wrap li.library ').addClass('active');
        });

    </script>

@endsection