@extends('mmpApp.mmpApp')

@section('css')
    <style>
        .active {
            color: #0d3625;
        }

        .search {
            position: relative;
            font-size: 16px;
        }

        .search button {
            position: absolute;
            top: 5px;
            right: 5px;
            border: none;
            background-color: inherit;
        }

    </style>

@endsection

<?php
use App\category;
use App\Http\Controllers\LibraryCon;
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

            <div class="row" style="margin-top: 30px;">

                <form id="searchform" role="search" method="post" action="{{url('resultSearch')}}">
                    {{ csrf_field() }}
                    <div class="col-sm-3"></div>


                    <div class="col-sm-7">

                        <div class="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <input class="form-control" value=""
                                   placeholder="Search in book name , author , outline and keyword." name="search"
                                   type="text">
                        </div>

                        <!--    <div class="widget widget_search">

                                <input class="form-control" value=""
                                       placeholder="Search in book name , author , outline and keyword." name="search"
                                       type="text"><span><i class="fa fa-address-book-o"></i></span>

                        </div> -->


                    </div>
                    <div class="col-sm-2">
                        <select class="form-control selLang" name="selSearch">
                            <option value="-1">All</option>
                            <option value="1">Book name</option>
                            <option value="2">Author</option>
                            <option value="3">Outline</option>
                            <option value="4">Keyword</option>

                        </select>
                    </div>
                </form>

            </div>

            <div class="row">
                <!-- BEGIN SIDEBAR sidebar -->
                <div class="sidebar col-sm-3">


                    <input type="hidden" value="<?php echo $cat;?>" class="catIdHidden">
                    <div class="widget widget_categories">
                        <h2 class="section-title"><strong>Categories</strong></h2>
                        <ul class="categories">


                            <a href="{{url('mmpApp/library')}}" style="cursor: pointer;"
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
                            <?php
                            foreach ($getAllYear as $d) {
                            $getAllBookForYear = LibraryCon::getBookFromAllYear($d);
                            ?>
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne<?php echo $d;?>" class="">
                                            <i class="fa fa-chevron-right"></i><?php echo $d;?>
                                        </a>
                                    </div>
                                </div>
                                <div id="collapseOne<?php echo $d;?>" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <ul>
                                            <?php
                                            foreach ($getAllBookForYear as $r) {
                                            ?>
                                            <li>
                                                <a href={{asset("mmpApp/libraryDetail")."/".$r->id}}><?php echo $r->name;?></a>
                                            </li>
                                            <?php }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php }

                            ?>


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

                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            {{$paginateBook->links()}}
                        </div>
                        <div class="col-sm-4"></div>


                    </div>                <!-- END PAGINATION -->

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

            $('.widget_categories .categories a').each(function () {
                $(this).removeClass('active');
            });

            $('.widget_categories .categories a').each(function () {
                var catIdHidden = $('.catIdHidden').val();

                if (catIdHidden == 'all') {
                    if ($(this).data('class') == catIdHidden + "Cat") {
                        $(this).addClass('active');
                    }

                } else {
                    // alert(catIdHidden);
                    if ($(this).data('class') == ".cat" + catIdHidden) {
                        $(this).addClass('active');
                    }
                }
                //
            });
        });

    </script>
@endsection