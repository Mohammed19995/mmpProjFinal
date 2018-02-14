@extends('mmpApp.mmpApp')
@section('title')
    Library
@endsection
@section('css')
    <style>

        .active {
            color: #0d3625 !important;
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

        .hand {
            cursor: pointer;
        }

        .isLiked {
            color: #0E7EB5;
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
                        <li><a href="">Home </a></li>
                        <li><a href="#">Library</a></li>
                        <li><a href="#">Favorite</a></li>

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

                <form id="searchform" role="search" method="post" action="{{url('resultSearchLibFav')}}">
                    {{ csrf_field() }}
                    <div class="col-sm-3"></div>


                    <div class="col-sm-7">

                        <div class="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <input class="form-control" value=""
                                   placeholder="Search for the name of your favorite book" name="search"

                                   type="text">

                        </div>

                        <!--    <div class="widget widget_search">

                                <input class="form-control" value=""
                                       placeholder="Search in book name , author , outline and keyword." name="search"
                                       type="text"><span><i class="fa fa-address-book-o"></i></span>

                        </div> -->


                    </div>
                </form>

            </div>

            <div class="row" style="margin-top: 25px;">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                </div>
            </div>
            <div class="row">
                <!-- BEGIN SIDEBAR sidebar -->
                <div class="sidebar col-sm-3">
                    <div style="padding-bottom: 40px;">
                        <h3><a href="{{url('favoriteBook')}}" class="hand" style="color: #4d4f52; font-weight:600 "><img src="{{asset('icons/library/fav.ico')}}" width="30" height="30"> Favorite book</a></h3>
                    </div>
                    <input type="hidden" value="<?php echo $cat;?>" class="catIdHidden">
                    <div class="widget widget_categories">
                        <h2 class="section-title"><strong>Categories</strong></h2>
                        <ul class="categories">


                            <?php
                            if ($moreDetail == 0) {
                            ?>
                            <a href="{{url('library')}}" style="cursor: pointer;"
                               data-class="allCat">
                                <li>All</li>

                            </a>
                            <?php
                            } else {
                            ?>
                            <a href="{{url('libraryAchive')."/".$moreDetail}}" style="cursor: pointer;"
                               data-class="allCat">
                                <li>All</li>

                            </a>
                            <?php }
                            ?>

                            <?php

                            foreach ($getAllCat as $c) {
                            $countBook = category::countBookForCat($c->id, $moreDetail);
                            $dataClass = "." . "cat" . $c->id;
                            if ($moreDetail == 0) {
                                $moreUrl = $c->id;
                            } else {
                                $moreUrl = $moreDetail . "/" . $c->id;
                            }


                            ?>
                            <a class="" href="{{url('library')."/".$moreUrl}}" style="cursor: pointer;"
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
                                        <a href="{{url('library')}}" class="{{$moreDetail == 0 ? 'active':''}}">
                                            <i class="fa fa-chevron-right"></i> All
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            foreach ($getAllYear as $d) {

                            ?>
                            <div class="panel ">
                                <div class="panel-heading">
                                    <div class="panel-title ">
                                        <a class="{{$moreDetail == $d ? 'active':''}}"
                                           href="{{url('libraryAchive')."/".$d}}">
                                            <i class="fa fa-chevron-right "></i> <?php echo $d;?>
                                        </a>
                                    </div>
                                </div>
                                <!--
                                <div id="collapseOne" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                                -->
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
                        <?php $numCol = 0; ?>
                        <div class="row">
                            <?php
                            foreach ($paginateBook as $p) {
                            $path = str_replace("public/", "", $p->img);
                            $catName = category::getNameCatForBookId($p->cat_id);
                            $classCat = "cat" . $p->cat_id;
                            $numCol = $numCol + 1;

                            $appUrl = App::make('url')->to('/');
                            $appUrl = str_replace("public", "", $appUrl);
                            $appUrl = $appUrl."/storage/app/public/".$path;

                            $likeBook = 0;
                            foreach ($getAllFavoriteForUser as $fav) {
                                if ($fav->book_id == $p->id) {
                                    $likeBook = 1;
                                }
                            }
                            ?>

                            <div class="item col-xs-12 col-sm-6 col-md-3  <?php echo $classCat;?>">
                                <input type="hidden" class="BookIdHidden" value="<?php echo $p->id; ?>">
                                <div class="image">
                                    <a href={{asset("libraryDetail")."/".$p->id}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="<?php echo $appUrl;?>" style="width: 180px; height: 200px;"
                                         alt=""/>

                                </div>
                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> </li>
                                        <li>
                                            <i class="fa {{$likeBook == 1 ? 'fa-thumbs-up isLiked':'fa-thumbs-o-up'}}  hand like"
                                               style="font-size: 23px;"></i></li>
                                        <li><i class="fa fa-tags"></i> <?php echo $catName->name; ?></li>
                                    </ul>
                                    <h3>
                                        <a href="{{asset("libraryDetail")."/".$p->id}}"><?php echo $p->name; ?></a>
                                    </h3>
                                </div>
                            </div>
                            <?php if ($numCol % 4 == 0) {
                                echo "</div>";
                                echo "<div class='row'>";
                            } ?>
                            <?php }
                            ?>


                        </div>


                    </div>
                    <!-- END BLOG LISTING -->


                    <!-- BEGIN PAGINATION -->

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            @if ($paginateBook->hasPages())
                                <ul class="pagination pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($paginateBook->onFirstPage())
                                        <li class="disabled"><span>&laquo;</span></li>
                                    @else
                                        <li><a href="{{ $paginateBook->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                    @endif

                                    @if($paginateBook->currentPage() > 3)
                                        <li class="hidden-xs"><a href="{{ $paginateBook->url(1) }}">1</a></li>
                                    @endif
                                    @if($paginateBook->currentPage() > 4)
                                        <li class="disabled hidden-xs"><span>...</span></li>
                                    @endif
                                    @foreach(range(1, $paginateBook->lastPage()) as $i)
                                        @if($i >= $paginateBook->currentPage() - 2 && $i <= $paginateBook->currentPage() + 2)
                                            @if ($i == $paginateBook->currentPage())
                                                <li class="active"><span>{{ $i }}</span></li>
                                            @else
                                                <li><a href="{{ $paginateBook->url($i) }}">{{ $i }}</a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if($paginateBook->currentPage() < $paginateBook->lastPage() - 3)
                                        <li class="disabled hidden-xs"><span>...</span></li>
                                    @endif
                                    @if($paginateBook->currentPage() < $paginateBook->lastPage() - 2)
                                        <li class="hidden-xs"><a
                                                    href="{{ $paginateBook->url($paginateBook->lastPage()) }}">{{ $paginateBook->lastPage() }}</a>
                                        </li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($paginateBook->hasMorePages())
                                        <li><a href="{{ $paginateBook->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                    @else
                                        <li class="disabled"><span>&raquo;</span></li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                        <div class="col-sm-3"></div>


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


            $('.like').on('click', function () {
                var thisBoo = $(this).parents('.item');
                var bookIdHidden = $(this).parents('.item').find('.BookIdHidden').val();

                if ($(this).hasClass('isLiked')) {
                    $(this).removeClass('isLiked');
                    $(this).addClass('fa-thumbs-o-up');
                    $(this).removeClass('fa-thumbs-up');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('deleteFavoriteBook')}}",
                        method: "get",
                        data: {bookIdHidden: bookIdHidden},
                        success: function (e) {
                            thisBoo.hide('slow');
                        }

                    });

                } else {
                    $(this).addClass('isLiked');
                    $(this).removeClass('fa-thumbs-o-up');
                    $(this).addClass('fa-thumbs-up');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('addFavoriteBook')}}",
                        method: "get",
                        data: {bookIdHidden: bookIdHidden},
                        success: function (e) {

                        }

                    });

                }

            });
        });

    </script>

@endsection