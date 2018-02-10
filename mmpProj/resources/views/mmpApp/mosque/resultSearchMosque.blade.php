
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
                        <li><a href="#">Mosque Detail</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE/BREADCRUMB -->
    <input type="hidden" id = "latDetail" value="0">
    <input type="hidden" id = "lngDetail" value="0">
    <input type="hidden" id = "nameMousque" value="0">
    <img id = "path" class="hidden"
         src=" " alt=""/>

    <section id="our-offices">
        <div class="container">
            <div class="row" style="margin-top: 50px">
                <div class="col-sm-12">

                    <div class="center"><h1 class="section-title">Our <strong>Offices</strong></h1></div>


                    <ul class="offices-grid">
                        <?php
                        foreach ($allMosque as $all) {
                       ?>
                            <input type="hidden" id = "latDetail" value="<?php echo  $all->lat ?>">
                            <input type="hidden" id = "lngDetail" value="<?php echo  $all->lng ?>">
                            <input type="hidden" id = "nameMousque" value="<?php echo  $all->name ?>">
                        <li class="col-md-3">
                            <input type="hidden" value="<?php  echo $all->id; ?>" class="id_hidden">
                            <div>
                                <?php
                                $path = str_replace('public', '', $all->image);
                                ?>
                                <img  class=""
                                     src="{{asset('storage')."/".$path}}" alt=""/>
                            </div>
                            <div class="info">
                           <div class="row">
                            <label><?php echo  $all->name ?></label>
                           </div>
                                <div class="row">
                                    <label><?php echo  $all->country ?> ,<?php echo  $all->city ?></label>
                                </div>
                                <div class="row">
                         <a href="{{url('mmpApp/mosqueDetail')."/".$all->id}}" class="btn btn-default aa">

                             More Details </a>
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



            });
        })(jQuery);
    </script>

@endsection