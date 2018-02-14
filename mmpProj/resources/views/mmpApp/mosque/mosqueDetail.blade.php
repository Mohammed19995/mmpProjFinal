
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



    <input type="hidden" id="count1" value="0 ">
    <input type="hidden" id="count2" value="1 ">
    <input type="hidden" id="count3" value="2">
    <input type="hidden" id="count4" value="3 ">

         <input type="hidden" id = "latDetail" value="<?php echo  $mosqueInfo->lat ?>">
    <input type="hidden" id = "lngDetail" value="<?php echo  $mosqueInfo->lng ?>">
    <input type="hidden" id = "nameMousque" value="<?php echo  $mosqueInfo->name ?>">

    <?php
    $path = str_replace('public', '', $mosqueInfo->image);

    ?>
    <img id = "path" class="hidden"
         src="{{asset('storage')."/".$path}}" alt=""/>


    <!-- BEGIN HEADQUARTERS -->
    <section id="headquarters" class="no-padding-bottom"style="margin-top: 30px" >
        <div class="container">
            <div class="row">

                <div class="col-sm-8">
                    <div id="headquarters_map"></div>
                </div>

                <div class="col-sm-4">

                    <h1 class="section-title"><strong><?php echo  $mosqueInfo->name ?></strong></h1>

                    <ul class="meta-attributes">
                        <li>
                            <div class="attr-name"><i class="fa fa-building"></i> Address:</div>
                            <div class="attr-detail"><?php echo  $mosqueInfo->street ?> ,<?php echo  $mosqueInfo->country ?> ,<?php echo  $mosqueInfo->city ?></div>
                        </li>
                        <li>
                            <div class="attr-name"><img class="mosque2"   src="{{asset('icons/mosque/arab-man.png')}}"> Emamm Name:</div>
                            <div class="attr-detail"><?php echo  $mosqueInfo->imam_name ?></div>
                        </li>
                        <li>
                            <div class="attr-name"><i class="fa fa-phone"></i> Phone Number:</div>
                            <div class="attr-detail"><?php echo  $mosqueInfo->phone ?></div>
                        </li>
                        <li>
                            <div class="attr-name"><i class="fa fa-envelope"></i> E-Mail:</div>
                            <div class="attr-detail"><a href="mailto:support@wiselythemes.com"><?php echo  $mosqueInfo->email ?></a></div>
                        </li>
                        <li>
                            <div class="attr-name"><i class="fa fa-envelope"></i> Friday Prayer:</div>
                            <div class="attr-detail"><a href="mailto:support@wiselythemes.com"><?php   if($mosqueInfo->friday_prayer ==1){
                                echo "Yes";
                                    }else{
                                echo "No";
                                    } ?></a></div>
                        </li>
                        <li>
                            <div class="attr-name"><i class="fa fa-envelope"></i> Women's Chapel:</div>
                            <div class="attr-detail"><a href="mailto:support@wiselythemes.com"><?php if($mosqueInfo->woman_chapel == 1){
                                        echo "Yes";
                                    }else{
                                        echo "No";
                                    } ?></a></div>
                        </li>

                    </ul>

                </div>

            </div>

            <div class="row">
                <div class="center"><h1 class="section-title"> <strong>ACTIVITY</strong></h1></div>
            </div>

            <div class="row" style="margin-bottom: 80px">
                <div class="col-sm-12">
                    <div id="agency-carousel" class="owl-carousel carousel-style-2">
                        <?php

                        foreach ($activity as $arr){?>


                        <div class="item" data-animation-direction="from-bottom" data-animation-delay="150" style="overflow-y: auto; height:250px;">
                            <h1><?php echo $arr->title; ?></h1>
                            <p><?php echo $arr->content; ?></p>
                        </div>

                            <?php
                            }

                            ?>




                    </div>

                </div>


            </div>

        </div>
    </section>
    <!-- END HEADQUARTERS -->




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
                 Rider.googleMap(offices5, 'headquarters_map', 0);


              //  Rider.googleMap(officesDetail, 'Detail_map', 1);




            });
        })(jQuery);
    </script>

@endsection