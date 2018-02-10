@extends('mmpApp.mmpApp')
@section('title')
    Library
@endsection

<?php
use App\category;
?>

@section('css')

    <style>

        .hand {
            cursor: pointer;
        }

        .isLiked {
            color: #0E7EB5 !important;
        }
    </style>
@endsection

@section('content')

    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
    <div id="page-title" class="parallax dark-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Book Details</h1>

                    <ul class="breadcrumb">
                        <li><a href="#">Home </a></li>
                        <li><a href="#">library</a></li>
                        <li><a href="#">Book Details</a></li>
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
                <input type="hidden" id="bookIdHidden" value="<?php echo $getBook->id;?>">
                <!-- BEGIN SIDEBAR -->
                <div class="main col-sm-8">


                    <?php
                    $path = str_replace('public', '', $getBook->img);

                    $likeBook = 0;
                    foreach ($getAllFavoriteForUser as $fav) {
                        if ($fav->book_id == $getBook->id) {
                            $likeBook = 1;
                        }
                    }

                    ?>
                    <img class="blog-main-image" style="width: 700px; height: 500px;"
                         src="{{asset('storage')."/".$path}}" alt=""/>

                    <ul class="blog-metas">
                        <li><i class="fa fa-pencil"></i><?php echo $getBook->name;?></li>
                        <li><i class="fa fa-calendar"></i> {{$getBook->publish->format('M-d-Y')}}</li>
                        @if(Auth::check())
                            <li><i class="fa {{$likeBook == 1 ? 'fa-thumbs-up isLiked':'fa-thumbs-o-up'}} hand like"
                                   style="font-size: 23px;"></i>
                            </li>
                        @endif

                        <li><i class="fa fa-tags"></i> Tips, Travel, Best Deals</li>
                    </ul>

                    <h1 class="blog-title"><?php echo $getBook->name;?></h1>


                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN MAIN CONTENT -->
                <div class="sidebar project-details col-sm-4">

                    <h1 class="section-title">Book <strong>Details</strong></h1>

                    <p><?php echo $getBook->summary;?></p>

                    <ul class="meta-attributes">

                        <li>
                            <div class="attr-name">Date:</div>
                            <div class="attr-detail">{{$getBook->publish->format('M-d-Y')}}</div>
                        </li>
                        <li>
                            <div class="attr-name">Category:</div>
                            <div class="attr-detail"><?php echo $nameCat->name;?></div>
                        </li>
                        <li>
                            <div class="attr-name">Authors:</div>
                            <div>
                                <?php foreach ($author as $a) {
                                ?>
                                <a style="text-decoration: none;" href="{{url('resultSearchAuhtor')."/".$a->author}}">
                                <span class="label label-primary"
                                      style="font-size: 14px;margin: 5px;line-height: 2.3"><?php echo $a->author;?></span>
                                </a>
                                <?php } ?>
                            </div>


                        </li>

                        <li>
                            <div class="attr-name">Outline:</div>
                            <div>
                                <?php foreach ($outline as $a) {
                                ?>
                                <span class="label label-primary"
                                      style="font-size: 14px;margin: 5px;line-height: 2.3"><?php echo $a->outline;?></span>
                                <?php } ?>
                            </div>
                        </li>

                        <li>
                            <div class="attr-name">Keywords:</div>
                            <div>
                                <?php foreach ($keyword as $a) {
                                ?>
                                <span class="label label-primary"
                                      style="font-size: 14px;margin: 5px;line-height: 2.3"><?php echo $a->word;?></span>
                                <?php } ?>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="attr-name">Language:</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="attr-detail">

                                        <form>
                                            <select class="form-control selLang" style="width:200px; ">
                                                <option value="-1">---</option>
                                                <?php
                                                foreach ( $getAllLang as $item) {
                                                ?>
                                                <option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
                                                <?php }
                                                ?>


                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                foreach ($getFileBookData as $item) {
                                foreach ($getAllType as $itemType) {
                                if($item->type_id == $itemType->id) {
                                $path = str_replace('public/book/typeFile/', '', $item->path);

                                ?>
                                <div style="margin-top: 10px; "
                                     class="col-sm-2 getIcon  hidden getIconDownload<?php echo $item->lang_id;?>">
                                    <a target="_blank" href="{{asset('downloadFile')."/".$path}}">
                                        <img src="{{asset('icons/library/'.$itemType->name.'.ico')}}  "
                                             style="margin-right: 5px" height="30" width="30">
                                    </a>
                                </div>
                                <?php
                                }
                                }
                                }

                                ?>

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
                            <?php
                            foreach ($similarBooks as $p) {
                            $path = str_replace("public/", "", $p->img);
                            $catName = category::getNameCatForBookId($p->cat_id);
                            $classCat = "cat" . $p->cat_id;
                            ?>

                            <div class="item col-xs-12 col-sm-6 col-md-3  <?php echo $classCat;?>">
                                <div class="image">
                                    <a href={{asset("mmpApp/libraryDetail")."/".$p->id}}>
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="{{asset('storage')."/".$path}}" style="width:200px; height: 200px;"
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

                </div>
                <!-- END MAIN CONTENT -->
                <div class="col-sm-1"></div>
            </div>
        </div>

    </div>

    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')
    <script>
        $(document).ready(function () {

            document.title = 'Library';

            $('.rd-navbar-nav-wrap ul li').each(function (e, v) {
                $(this).removeClass('active');
            });

            $('.rd-navbar-nav-wrap li.library ').addClass('active');

            $('.selLang').on('change', function () {
                var thisVal = $(this).val();
                $('.getIcon').each(function () {
                    $(this).addClass('hidden');
                });
                $('.getIconDownload' + thisVal).removeClass('hidden');
            });

            $('.like').on('click', function () {
                var bookIdHidden = "{{$getBook->id}}";


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