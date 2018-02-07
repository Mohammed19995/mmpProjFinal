@extends('mmpApp.mmpApp')

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

    </style>

@endsection



@section('content')
    <?php
    use App\Http\Controllers\MosqueCon;
    ?>

    <input type="text" id="currLat" name="currLat" value="">
    <input type="text" id="currLng" name="currLng" value="">

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
    <section id="our-offices">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="center"><h1 class="section-title" data-animation-direction="from-bottom"
                                            data-animation-delay="50">Our <strong>Offices</strong></h1></div>

                    <ul class="offices-grid">
                        <?php
                        $near = MosqueCon::nearestMosque(42.704090, 42.704090);
                        $count = 0;
                        foreach ($near as $i=>$p) {

                        foreach ($arr as $all) {
                        if($all->id == $i) {
                        $count++;


                        ?>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="450">
                            <input type="hidden" value="<?php  echo $i ?>" class="id_hidden">
                            <input type="hidden" value="<?php echo $all->lat;?>" id="lat<?php echo $count;?>">
                            <input type="hidden" value="<?php echo $all->lng;?>" id="lng<?php echo $count;?>">
                            <input type="hidden" value="<?php  echo $p; ?>" id="dis<?php echo $count;?>">

                            <div id="office_map<?php echo $count;?>" class="map"></div>
                            <div class="info">

                                <button class="btn btn-default aa">More Details</button>
                            </div>
                        </li>

                        <?php   }if ($count == 3) { ?>

                               <?php break;
                        } }}

                        ?>
                        <input type="hidden" id="count1" value="<?php echo $count;?>">


                    </ul>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <div class="center"><h1 class="section-title" data-animation-direction="from-bottom"
                                            data-animation-delay="50">Our <strong>Offices</strong></h1></div>

                    <ul class="offices-grid">
                        <?php
                        $near = MosqueCon::nearestMosqueWithFriday(42.704090, 42.704090);
                        $count2 = 0;
                        foreach ($near as $i=>$p) {

                        foreach ($arr as $all) {
                        if($all->id == $i) {
                        $count2++;
                        ?>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="450">
                            <input type="hidden" value="<?php  echo $i ?>" class="id_hidden">
                            <input type="hidden" value="<?php echo $all->lat;?>" id="lat2<?php echo $count2;?>">
                            <input type="hidden" value="<?php echo $all->lng;?>" id="lng2<?php echo $count2;?>">
                            <input type="hidden" value="<?php  echo $p; ?>" id="dis2<?php echo $count2;?>">
                            <div id="office_map2<?php echo $count2;?>" class="map"></div>
                            <div class="info">

                                <button class="btn btn-default aa">More Details</button>
                            </div>
                        </li>

                        <?php   }

                        }
                        }

                        ?>

                        <input type="hidden" id="count2" value="<?php echo $count2;?> ">

                    </ul>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <div class="center"><h1 class="section-title" data-animation-direction="from-bottom"
                                            data-animation-delay="50">Our <strong>Offices</strong></h1></div>

                    <ul class="offices-grid">
                        <?php
                        $near = MosqueCon::nearestMosqueWithWomanPrayer(42.704090, 42.704090);
                        $count3 = 0;
                        foreach ($near as $i=>$p) {

                        foreach ($arr as $all) {
                        if($all->id == $i && $count3 != 4 ) {
                        $count3++;
                        ?>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="450">
                            <input type="hidden" value="<?php  echo $i ?>" class="id_hidden">
                            <input type="hidden" value="<?php echo $all->lat;?>" id="lat3<?php echo $count3;?>">
                            <input type="hidden" value="<?php echo $all->lng;?>" id="lng3<?php echo $count3;?>">
                            <input type="hidden" value="<?php  echo $p; ?>" id="dis3<?php echo $count3;?>">
                            <div id="office_map3<?php echo $count3;?>" class="map"></div>
                            <div class="info">

                                <button class="btn btn-default aa">More Details</button>
                            </div>
                        </li>

                        <?php   }

                        }
                        }

                        ?>

                        <input type="hidden" id="count3" value="<?php echo $count3;?> ">

                    </ul>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <div class="center"><h1 class="section-title" data-animation-direction="from-bottom"
                                            data-animation-delay="50">Our <strong>Offices</strong></h1></div>

                    <ul class="offices-grid">
                        <?php

                        $currLat = "<script>document.writeln('aaaa');</script>";
                        echo $currLat;
                        $near = MosqueCon::nearestMosqueWithFridayAndWomanPrayer(42.704090, 42.704090);
                        $count4 = 0;
                        foreach ($near as $i=>$p) {

                        foreach ($arr as $all) {
                        if($all->id == $i && $count4 != 4 ) {
                        $count4++;
                        ?>

                        <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="450">
                            <input type="hidden" value="<?php  echo $i ?>" class="id_hidden">
                            <input type="hidden" value="<?php echo $all->lat;?>" id="lat4<?php echo $count4;?>">
                            <input type="hidden" value="<?php echo $all->lng;?>" id="lng4<?php echo $count4;?>">
                            <input type="hidden" value="<?php  echo $p; ?>" id="dis4<?php echo $count4;?>">
                            <div id="office_map4<?php echo $count4;?>" class="map"></div>
                            <div class="info">

                                <button class="btn btn-default aa">More Details</button>
                            </div>
                        </li>

                        <?php   }

                        }
                        }

                        ?>

                        <input type="hidden" id="count4" value="<?php echo $count4;?> ">

                    </ul>

                </div>
            </div>
        </div>
    </section>




    <!-- BEGIN CONTENT WRAPPER -->




    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCBZMoQ-GX3fBlc1bv7DQFdlwbQp9IWoRw"
            type="text/javascript"></script>
    <script src="{{asset('mmp/js/infobox.min.js')}}"></script>
    <script src="{{asset('mmp/js/richmarker.js')}}"></script>
    <script src="{{asset('mmp/js/offices.js')}}"></script>


    <script type="text/javascript">

        (function ($) {
            "use strict";

            $(document).ready(function () {
                //Create offices maps
                // Rider.googleMap(offices, 'headquarters_map', 0);


                $('.aa').click(function () {
                    var a = $(this).parent().parent().find('.id_hidden').val();
                    var b = $(this).parent().parent().find('').val();
                    alert(a);
                });


                /*
                Rider.googleMap(offices, 'office_map1', 1);
                Rider.googleMap(offices, 'office_map2', 2);
                Rider.googleMap(offices, 'office_map3', 3);
                Rider.googleMap(offices, 'office_map4', 4);
               */

                for (var i = 1; i <= $('#count1').val(); i++) {
                    var officeMap1 = 'office_map' + i;
                    Rider.googleMap(offices, officeMap1, i - 1);
                }

                for (var i = 1; i <= $('#count2').val(); i++) {
                    var officeMap2 = 'office_map2' + i;
                    Rider.googleMap(offices2, officeMap2, i - 1);
                }

                for (var i = 1; i <= $('#count3').val(); i++) {
                    var officeMap3 = 'office_map3' + i;
                    Rider.googleMap(offices3, officeMap3, i - 1);
                }
                for (var i = 1; i <= $('#count4').val(); i++) {
                    var officeMap4 = 'office_map4' + i;
                    Rider.googleMap(offices3, officeMap4, i - 1);
                }

            });
        })(jQuery);
    </script>

@endsection