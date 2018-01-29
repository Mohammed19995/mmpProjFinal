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
                                <?php if($rowNum %4 == 0) {
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


        });

    </script>
@endsection