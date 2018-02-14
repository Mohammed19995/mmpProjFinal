@extends('mmpApp.mmpApp')
@section('title')
    Library
@endsection

@section('css')
    <style>
        .active {
            color: #0d3625;
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


                <div class="col-sm-1"></div>
                <!-- BEGIN MAIN CONTENT -->
                <div class="main col-sm-9">
                    <h1>Result search for <span
                                style="color: rgba(253,73,101,0.82);font-weight: bold;"> <?php echo $keyword; ?></span>
                    </h1>
                    <!-- BEGIN BLOG LISTING -->
                    <div id="blog-listing" class="grid-style clearfix">
                        <div class="row">
                            <?php
                            $rowNum = 0;
                            foreach ($paginateBook as $p) {
                            $path = str_replace("public/", "", $p->img);
                            $catName = category::getNameCatForBookId($p->cat_id);
                            $classCat = "cat" . $p->cat_id;
                            $rowNum = $rowNum + 1;

                            $appUrl = App::make('url')->to('/');
                            $appUrl = str_replace("public", "", $appUrl);
                            $appUrl = $appUrl . "/storage/app/public/" . $path;

                            if (\Illuminate\Support\Facades\Auth::check()) {
                                $likeBook = 0;
                                foreach ($getAllFavoriteForUser as $fav) {
                                    if ($fav->book_id == $p->id) {
                                        $likeBook = 1;
                                    }
                                }
                            }

                            ?>

                            <div class="item col-xs-12 col-sm-6 col-md-3  <?php echo $classCat;?>">
                                <input type="hidden" class="BookIdHidden" value="<?php echo $p->id;?>">
                                <div class="image">
                                    <a href={{asset("libraryDetail")."/".$p->id}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="<?php echo $appUrl;?>" style="width: 180px; height: 200px;"
                                         alt=""/>

                                </div>
                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> {{$p->publish->format('M-d-Y')}}</li>
                                        @if(Auth::check())
                                            <li>
                                                <i class="fa {{$likeBook == 1 ? 'fa-thumbs-up isLiked':'fa-thumbs-o-up'}}  hand like"
                                                   style="font-size: 23px;"></i>
                                            </li>
                                        @else
                                        @endif
                                        <li><i class="fa fa-tags"></i> <?php echo $catName->name; ?></li>
                                    </ul>
                                    <h3>
                                        <a href="{{asset("libraryDetail")."/".$p->id}}"><?php echo $p->name; ?></a>
                                    </h3>
                                </div>
                            </div>
                            <?php if ($rowNum % 4 == 0) {
                                echo "</div>";
                                echo "<div class='row'>";
                            } ?>
                            <?php }
                            ?>


                        </div>


                    </div>
                    <!-- END BLOG LISTING -->


                    <!-- BEGIN PAGINATION -->


                    <!-- END PAGINATION -->

                </div>
                <!-- END MAIN CONTENT -->
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')

    <script>
        $(document).ready(function () {
            document.title = 'Library';
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