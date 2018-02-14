@extends('mmpApp.mmpApp')
@section('title')
    Mosque
@endsection
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

        input::-webkit-calendar-picker-indicator {
            opacity: 100;
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
                    <h1 class="page-title">Mosque</h1>

                    <ul class="breadcrumb">
                        <li><a href="">Home </a></li>
                        <li><a href="#">Mosque</a></li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE/BREADCRUMB -->
    <input type="hidden" id="latDetail" value="0">
    <input type="hidden" id="lngDetail" value="0">
    <input type="hidden" id="nameMousque" value="0">
    <img id="path" class="hidden"
         src=" " alt=""/>


    <section id="our-offices">
        <div class="container">

            <div class="row" style="margin-top: 30px;">

                <form id="searchform" role="search" method="post"
                      action="{{$city == 'no' ? url('resultSearchMosque') : url('resultSearchMosque/'.$city)}}">
                    {{ csrf_field() }}
                    <div class="col-sm-12">

                        <div class="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <input class="form-control" value=""
                                   placeholder="Search..." name="search"
                                   type="text">
                            <?php
                            if($city == 'no' || empty($city)) {
                            ?>
                            <small style="color: rgba(253,121,91,0.82)">Search in all mosque</small>
                            <?php }else {
                            ?>
                            <small style="color: rgba(253,121,91,0.82)">Search in mosque where city
                                is <?php echo $city;?></small>
                            <?php }
                            ?>
                        </div>

                    </div>

                </form>
            </div>
            <div class="row" style="margin-top: 30px;">

                <div class="col-sm-4">
                    <form method="post" action="{{url('getNearMosque')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">
                        <input type="submit" id="showNear" class="btn btn-success" style="background-color:#02baa6 ;" value="show near mosque">
                    </form>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="row">
                        <form method="post" action="{{url('getMosqueForCity')}}">
                            {{ csrf_field() }}


                            <div class="col-sm-8">
                                <input list="cities" name="city" class="form-control" autocomplete="off"
                                       placeholder="filter by city"/>
                                <datalist id="cities">
                                    <?php
                                    foreach ($getAllMoq as $p) {
                                    ?>
                                    <option value="<?php echo $p->city; ?>">
                                    <?php }
                                    ?>

                                </datalist>
                            </div>
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-success form-control" style="background-color:#02baa6;color: #ffffff;" value="OK">
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            <div class="row" style="margin-top: 50px">
                <div class="col-sm-12">
                    <?php
                    if ($city != 'no') {
                    ?>
                    <div class="center"><h1 class="section-title">Mosque where city is
                            <strong>{!! $city !!}</strong></h1></div>
                    <?php } else {
                    ?>
                    <div class="center"><h1 class="section-title">Our <strong>Offices</strong></h1></div>
                    <?php }

                    ?>

                    <ul class="offices-grid">
                        <?php
                        foreach ($allMosque as $all) {
                        ?>
                        <input type="hidden" id="latDetail" value="<?php echo $all->lat ?>">
                        <input type="hidden" id="lngDetail" value="<?php echo $all->lng ?>">
                        <input type="hidden" id="nameMousque" value="<?php echo $all->name ?>">
                        <li class="col-md-3">
                            <input type="hidden" value="<?php  echo $all->id; ?>" class="id_hidden">
                            <div>
                                <?php
                                $path = str_replace('public', '', $all->image);

                                $appUrl = App::make('url')->to('/');
                                $appUrl = str_replace("public", "", $appUrl);
                                $appUrl = $appUrl . "/storage/app/public/" . $path;

                                ?>
                                <img class=""
                                     src="<?php echo $appUrl;?>" alt=""/>
                            </div>
                            <div class="">
                                <div class="row">
                                    <label><?php echo $all->name ?></label>
                                </div>
                                <div class="row">
                                    <label><?php echo $all->country ?> ,<?php echo $all->city ?></label>
                                </div>
                                <div class="row">
                                    <a href="{{url('mosqueDetail')."/".$all->id}}" class="btn btn-default aa">More Details </a>

                                </div>
                            </div>
                        </li>


                        <?php
                        }

                        ?>


                    </ul>

                </div>
            </div>

        </div>
    </section>


@endsection


@section('script')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBZMoQ-GX3fBlc1bv7DQFdlwbQp9IWoRw"
            type="text/javascript"></script>
    <script src="{{asset('mmp/js/infobox.min.js')}}"></script>
    <script src="{{asset('mmp/js/richmarker.js')}}"></script>
    <script src="{{asset('mmp/js/offices.js')}}"></script>


    <script type="text/javascript">

        (function ($) {
            "use strict";

            $(document).ready(function () {


                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        document.getElementById('lat').value = position.coords.latitude;
                        document.getElementById('lng').value = position.coords.longitude

                    }, function () {

                    });

                } else {
                    alert("Browser doesn't support Geolocation");

                }
                //Create offices maps
                // Rider.googleMap(offices, 'headquarters_map', 0);


                /*

                $('.aa').click(function () {
                    var a = $(this).parent().parent().find('.id_hidden').val();
                    var b = $(this).parent().parent().find('').val();
                    alert(a);
                });
                Rider.googleMap(offices, 'office_map1', 1);
                Rider.googleMap(offices, 'office_map2', 2);
                Rider.googleMap(offices, 'office_map3', 3);
                Rider.googleMap(offices, 'office_map4', 4);
               */

                $('.rd-navbar-nav-wrap ul li').each(function (e, v) {
                    $(this).removeClass('active');
                });

                $('.rd-navbar-nav-wrap li.mosque ').addClass('active');
            });
        })(jQuery);
    </script>

@endsection