
@extends('mmpApp.mmpApp')

@section('css')
    <style>



        .hidden {
            display: none;
        }
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
        .meta-attributes{
           margin-top: 10px;
        }
        .carousel-style-2{
            padding: 0px;
        }
        .owl-carousel .owl-dots{
        bottom:-60px;
        }


    </style>



@endsection




@section('content')
    <?php
    use App\Http\Controllers\MosqueCon;
    ?>


    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
    <div id="page-title-2" class=" parallax dark-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Library</h1>

                    <ul class="breadcrumb">
                        <li><a href="">Home </a></li>
                        <li><a href="#">Mosque</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE/BREADCRUMB -->

    <!-- BEGIN HEADQUARTERS -->
    <section id="the-company" style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
<?php   $imgPath = str_replace("public/", "", $news->path);?>
                    <img class="main-img" src="{{asset('storage/'.$imgPath)}}" alt="" data-animation-direction="from-bottom" data-animation-delay="200" />

                    <h1 class="section-title" data-animation-direction="from-left" data-animation-delay="50"><?php echo $news->titel ?></h1>

                    <p class="highlight-text" data-animation-direction="from-left" data-animation-delay="250"><?php echo $news->discretion ?> </p>
                 </div>
            </div>
        </div>
    </section>
    <!-- END HEADQUARTERS -->

    <div id="disqus_thread"></div>



    <!-- BEGIN CONTENT WRAPPER -->




    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')



    <script type="text/javascript">

        (function ($) {
            "use strict";

            $(document).ready(function () {
                //Create offices maps


              //  Rider.googleMap(officesDetail, 'Detail_map', 1);




            });
        })(jQuery);

        var disqus_config = function () {
            this.page.url = "{{request()->fullUrl()}}";  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = "{{ $news->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://eomi.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>

@endsection