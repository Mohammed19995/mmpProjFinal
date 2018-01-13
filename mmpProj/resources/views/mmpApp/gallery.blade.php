@extends('mmpApp.mmpApp')


@section('content')

    <!-- BEGIN CONTENT WRAPPER -->
    <div class="content">
        <div class="container">

            <div class="row">

                <!-- BEGIN MAIN CONTENT -->
                <div class="main">

                    <div class="col-sm-8">
                        <div id="gallery-grid-header">
                            <a href="#" class="active">All</a>
                            <a href="#">Graphic Design</a>
                            <a href="#">Web Design</a>
                            <a href="#">Photography</a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="widget widget_search">
                            <form id="searchform" role="search" method="get" action="">
                                <input id="s" class="search" value="" placeholder="Search.." name="s" type="text">
                                <button id="submit_btn" class="search-submit" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>


                    <div class="col-sm-12">

                        <!-- BEGIN GALLERY GRID -->
                        <div id="gallery-grid" class="grid-style clearfix">
                            <div class="row">
                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="{{url('mmpApp/galleryDetail')}}"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>

                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>

                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>

                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>

                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>

                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>

                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>

                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>

                                <div class="item col-sm-4">
                                    <div class="image">
                                        <div class="gallery-info">
                                            <div>
                                                <h3>Project Name<small>Creative | Design</small></h3>

                                                <a href="gallery-detail.html"><i class="fa fa-link"></i></a>
                                                <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/766x515" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END GALLERY GRID -->

                    </div>

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

    <script >
        $(document).ready(function () {

            $('.rd-navbar-nav-wrap ul li').each(function (e , v) {
               $(this).removeClass('active');
            });

            $('.rd-navbar-nav-wrap li.gallery ').addClass('active');
        });

    </script>
@endsection