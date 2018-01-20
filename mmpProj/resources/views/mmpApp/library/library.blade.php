@extends('mmpApp.mmpApp')

@section('css')
    <style>
        .active {
            color: #0d3625;
        }
    </style>
@endsection
<?php
use App\category;
?>


@section('content')

    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
    <div id="page-title-2" class=" parallax dark-bg" data-stellar-background-ratio="0.5">
        <div class="container">
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
                        <form id="searchform" role="search" method="post" action="{{url('resultSearch')}}">
                            {{ csrf_field() }}
                            <input id="s" class="search" value="" placeholder="Search.." name="search" type="text">
                            <button id="submit_btn" class="search-submit" type="submit"><i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>


                    <input type="hidden" value="<?php echo $cat;?>" class="catIdHidden">
                    <div class="widget widget_categories">
                        <h2 class="section-title"><strong>Categories</strong></h2>
                        <ul class="categories">


                            <a  href="{{url('mmpApp/library')}}" style="cursor: pointer;"
                               data-class="allCat">
                                <li>All</li>

                            </a>
                            <?php

                            foreach ($getAllCat as $c) {
                            $countBook = category::countBookForCat($c->id);
                            $dataClass = "." . "cat" . $c->id;

                            ?>
                            <a class="" href="{{url('mmpApp/library')."/".$c->id}}" style="cursor: pointer;"
                               data-class="<?php echo $dataClass;?>">
                                <li><?php echo $c->name;?>
                                    <span>(<?php echo $countBook;?>)</span>
                                </li>
                            </a>
                            <?php }
                            ?>
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
                            <?php
                            foreach ($paginateBook as $p) {
                            $path = str_replace("public/", "", $p->img);
                            $catName = category::getNameCatForBookId($p->cat_id);
                            $classCat = "cat" . $p->cat_id;
                            ?>

                            <div class="item col-xs-12 col-sm-6 col-md-3  <?php echo $classCat;?>">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")."/".$p->id}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="{{asset('storage')."/".$path}}" style="width: 180px; height: 200px;"
                                         alt=""/>

                                </div>
                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> {{$p->publish->format('M-d-Y')}}</li>
                                        <li><i class="fa fa-comments-o"></i> 2</li>
                                        <li><i class="fa fa-tags"></i> <?php echo $catName->name; ?></li>
                                    </ul>
                                    <h3>
                                        <a href="{{asset("mmpApp/libraryDetail")."/".$p->id}}"><?php echo $p->name; ?></a>
                                    </h3>
                                </div>
                            </div>
                            <?php }
                            ?>


                        </div>


                    </div>
                    <!-- END BLOG LISTING -->


                    <!-- BEGIN PAGINATION -->

                {{$paginateBook->links()}}

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

            $('.widget_categories .categories a').each(function() {
                $(this).removeClass('active');
            });

            $('.widget_categories .categories a').each(function() {
                var catIdHidden = $('.catIdHidden').val();

                if(catIdHidden == 'all') {
                    if($(this).data('class') == catIdHidden+"Cat"){
                        $(this).addClass('active');
                    }

                }else {
                   // alert(catIdHidden);
                    if($(this).data('class') == ".cat"+catIdHidden){
                       $(this).addClass('active');
                    }
                }
              //
            });
        });

    </script>
@endsection