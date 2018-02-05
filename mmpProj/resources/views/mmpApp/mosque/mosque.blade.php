@extends('mmpApp.mmpApp')

@section('css')
    <style>

        .active {
            color: #0d3625!important;
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
    <section id="our-offices" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="center"><h1 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">Our <strong>Offices</strong></h1></div>

                    <ul class="offices-grid">
                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="450">
                            <div id="office_map1" class="map"></div>
                            <div class="info">
                                <h4>Rider Office 1 <small>Los Angeles</small></h4>
                                <a href="offices.html" class="btn btn-default">More Details</a>
                            </div>
                        </li>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="650">
                            <div id="office_map2" class="map"></div>
                            <div class="info">
                                <h4>Rider Office 2 <small>London</small></h4>
                                <a href="offices.html" class="btn btn-default">More Details</a>
                            </div>
                        </li>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="850">
                            <div id="office_map3" class="map"></div>
                            <div class="info">
                                <h4>Rider Office 3 <small>Paris</small></h4>
                                <a href="offices.html" class="btn btn-default">More Details</a>
                            </div>
                        </li>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="850">
                            <div id="office_map4" class="map"></div>
                            <div class="info">
                                <h4>Rider Office 4 <small>Berlin</small></h4>
                                <a href="offices.html" class="btn btn-default">More Details</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>

    <!-- BEGIN CONTENT WRAPPER -->


    <section id="our-offices" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="center" style="margin-top: 50px"><h1 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">NEAREST  <strong>MOSQUE</strong></h1></div>

                    <ul class="offices-grid">
                        <?php

                        $catName = MosqueCon::nearestMosque(42.704090 ,-71.436649);
                        var_dump($arr)

                        ?>
                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="450">
                            <div>
                                <img class="blog-main-image" style="  height: 250px;"
                                     src="{{asset('images/library/book1.jpg')}}" alt=""/>
                            </div>
                            <div class="info">
                                <h4>Rider Office 1 <small>Los Angeles</small></h4>
                                <a href="offices.html" class="btn btn-default">More Details</a>
                            </div>
                        </li>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="650">
                            <div id="office_map2" class="map"></div>
                            <div class="info">
                                <h4>Rider Office 2 <small>London</small></h4>
                                <a href="offices.html" class="btn btn-default">More Details</a>
                            </div>
                        </li>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="850">
                            <div id="office_map3" class="map"></div>
                            <div class="info">
                                <h4>Rider Office 3 <small>Paris</small></h4>
                                <a href="offices.html" class="btn btn-default">More Details</a>
                            </div>
                        </li>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="850">
                            <div id="office_map4" class="map"></div>
                            <div class="info">
                                <h4>Rider Office 4 <small>Berlin</small></h4>
                                <a href="offices.html" class="btn btn-default">More Details</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <div id="ttileEmad">AAAAAAAA AAAAAAa</div>
    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCBZMoQ-GX3fBlc1bv7DQFdlwbQp9IWoRw" type="text/javascript"></script>
    <script src="{{asset('mmp/js/infobox.min.js')}}"></script>
    <script src="{{asset('mmp/js/richmarker.js')}}"></script>
    <script src="{{asset('mmp/js/offices.js')}}"></script>

    <script type="text/javascript">
        (function($){
            "use strict";

            $(document).ready(function(){
                //Create offices maps
               // Rider.googleMap(offices, 'headquarters_map', 0);
                Rider.googleMap(offices, 'office_map1', 1);
                Rider.googleMap(offices, 'office_map2', 2);
                Rider.googleMap(offices, 'office_map3', 3);
                Rider.googleMap(offices, 'office_map4', 4);
            });
        })(jQuery);
    </script>
@endsection