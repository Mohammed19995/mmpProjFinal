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

    <!-- BEGIN CONTENT WRAPPER -->


    <section id="our-offices" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="center" style="margin-top: 50px"><h1 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">NEAREST  <strong>MOSQUE</strong></h1></div>

                    <ul class="offices-grid">
                        <?php
                        $nearMosque = MosqueCon::nearestMosque(42.704090 ,-71.436649);
                        $r=0;
                           foreach ($nearMosque as $i=>$arr){
                               $r++

?>

                            <li class="col-md-3" data-animation-direction="from-bottom" data-animation-delay="450">
                                <div id="office_map1" class="map"></div>
                                <div class="info">
                                    <h4>Rider Office 1 <small>Los Angeles</small></h4>
                                    <a href="offices.html" class="btn btn-default">More Details</a>
                                </div>
                            </li>
                            <?php
                          if($r = 4){
                              break;
                          }
                           } ?>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')
    <script>

        $(document).ready(function(){
            //Create offices maps

            Rider.googleMap(offices, 'office_map1', 1);

        });

    </script>
    <script src="js/richmarker.js"></script>
    <script src="js/infobox.min.js"></script>
    <script src="js/offices.js"></script>
   
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCBZMoQ-GX3fBlc1bv7DQFdlwbQp9IWoRw" type="text/javascript"></script>
@endsection