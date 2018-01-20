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

                    <?php
                    $path = str_replace('public', '', $getBook->img);
                    ?>
                    <img class="blog-main-image" style="width: 700px; height: 500px;" src="{{asset('storage')."/".$path}}" alt=""/>

                    <ul class="blog-metas">
                        <li><i class="fa fa-pencil"></i><?php echo $getBook->name;?></li>
                        <li><i class="fa fa-calendar"></i> {{$getBook->publish->format('M-d-Y')}}</li>
                        <li><i class="fa fa-comments-o"></i> 3 Comments</li>
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
                            <?php foreach ($author as $a) {
                            ?>
                            <div class="attr-detail"><?php echo $a->author . " ,";?></div>
                            <?php } ?>

                        </li>

                        <li>
                            <div class="attr-name">Outlines:</div>
                            <?php foreach ($outline as $a) {
                            ?>
                            <div class="attr-detail"><?php echo $a->outline . ",";?></div>
                            <?php } ?>

                        </li>

                        <li>
                            <div class="attr-name">Keywords:</div>
                            <?php foreach ($keyword as $a) {
                            ?>
                            <div class="attr-detail"><?php echo $a->word . " ,";?></div>
                            <?php } ?>

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
                                    $path = str_replace('public/book/typeFile/' , '' , $item->path);

                                ?>
                                <div  style="margin-top: 10px; " class="col-sm-2 getIcon  hidden getIconDownload<?php echo $item->lang_id;?>">
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
    <script>
        $(document).ready(function () {

            $('.rd-navbar-nav-wrap ul li').each(function (e, v) {
                $(this).removeClass('active');
            });

            $('.rd-navbar-nav-wrap li.library ').addClass('active');

            $('.selLang').on('change' , function() {
               var thisVal = $(this).val();
               $('.getIcon').each(function() {
                   $(this).addClass('hidden');
               });
               $('.getIconDownload'+thisVal).removeClass('hidden');
            });
        });

    </script>

@endsection