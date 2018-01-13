@extends('mmpApp.mmpApp')


@section('content')

    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
    <div id="page-title" class="parallax dark-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Fatwa</h1>

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home </a></li>
                        <li><a href="blog-listing1.html">Fatwa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE/BREADCRUMB -->

    <!-- BEGIN CONTENT WRAPPER -->
    <div class="content">
        <div class="  container">
            <div class="row fatwaCat">
                <div class=" col-sm-3">
                    <div class="row " style="margin-top: 200px">
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
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">

                        <div id="accordion" class="panel-group">

                            <h3> Fatwa</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div id="gallery-grid-header">
                                        <a href="#" class="active">All</a>
                                        <a href="#">public</a>
                                        <a href="#">private</a>
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div class="widget widget_search">
                                        <form id="searchform" role="search" method="get" action="">
                                            <input id="s" class="search" value="" placeholder="Search.." name="s" type="text">
                                            <button id="submit_btn" class="search-submit" type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                            Mauris aliquam fermentum metus, at scelerisque sapien suspendisse in volutpat ipsum?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam fermentum metus, at scelerisque sapien. Suspendisse in volutpat ipsum. Mauris sit amet imperdiet purus, sed placerat leo. Nullam pharetra sollicitudin consectetur. Suspendisse sapien dolor, ullamcorper eget ultrices ut, mattis et urna.
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                                            Praesent venenatis nec nisi sit amet placerat nulla vitae justo eget enim elementum aliquam morbi nec turpis nunc?
                                        </a>

                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent scelerisque purus odio, non molestie nibh pretium id. Donec at lectus at sem aliquet dignissim. Nulla consectetur odio non diam accumsan viverra. Curabitur vel ante purus.
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                                            Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos pellentesque adipiscing justo eu luctus congue?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Sed tincidunt justo eget neque accumsan, eget tristique dui dapibus. Mauris est elit, vestibulum et lorem ultrices, posuere sagittis diam. Morbi aliquam turpis lacinia, ultrices sapien a, ullamcorper sapien. Sed pellentesque iaculis erat non consequat.
                                    </div>
                                </div>
                            </div>
                            <?php
                            for ($x = 0; $x <= 6; $x++) {
                                ?>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x;?>" class="collapsed">
                                            Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos pellentesque adipiscing justo eu luctus congue?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse<?php echo $x;?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Sed tincidunt justo eget neque accumsan, eget tristique dui dapibus. Mauris est elit, vestibulum et lorem ultrices, posuere sagittis diam. Morbi aliquam turpis lacinia, ultrices sapien a, ullamcorper sapien. Sed pellentesque iaculis erat non consequat.
                                    </div>
                                </div>
                            </div>
                          <?php  }
                            ?>

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
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
            </div>

            <div class="row" style="margin-bottom: 30px">
                    <div class="col-sm-2"></div>
                <div class="col-sm-8 contacts">
                    <div class=" row" style="text-align: center ;margin-top: 15px">
                        <h2 class="section-title">Ask your <strong>Question</strong></h2>
                    </div>

                    <div class="row">
                    <form>


                        <div class="col-sm-12">
                            <input type="text" name="Subject" placeholder="Subject" class="form-control required subject"  />
                            <textarea name="Message" placeholder="Message" class="form-control required"></textarea>
                        </div>

                        <div class="center">
                            <button type="submit" class="btn btn-default submit_form"> Send Message</button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-sm-2"></div>
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

            $('.rd-navbar-nav-wrap li.fatwa ').addClass('active');


        });

    </script>
@endsection