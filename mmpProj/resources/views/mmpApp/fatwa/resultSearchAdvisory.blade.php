@extends('mmpApp.mmpApp')

@section('css')
    <style>
        .active {
            color: #0d3625;
        }
        .panel-body .muft a{
            text-decoration:none;
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
                    <h1 class="page-title">Fatwa</h1>

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home </a></li>
                        <li><a href="blog-listing1.html">Fatwa</a></li>
                        <li><a href="#">Search</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE/BREADCRUMB -->
    <?php

    use App\Http\Controllers\FatawiCon;
    ?>
    <!-- BEGIN CONTENT WRAPPER -->
    <div class="content">
        <div class="  container">
            <div class="row fatwaCat">
                <div class=" col-sm-3">

                </div>
                <div class="col-sm-8">
                    <div class="row" style="margin-top: 15px ;  ">
                    <h1>Result search for <span style="color: rgba(253,73,101,0.82);font-weight: bold;"> <?php echo $keyword; ?></span></h1>
                    </div>
                    <div class="row">

                        <div id="accordion" class="panel-group">




                            <?php
                            foreach ($result as $arr){
                            ?>
                            <div class="panel public ">
                                <div class="panel-heading"  >
                                    <h4 class="panel-title" data-toggle="tooltip" data-placement="right"title="<?php
                                    $catName = FatawiCon::getNameCat($arr->cat_id);
                                    echo "category : ".$catName->name;
                                    ?>">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $arr->id; ?>"
                                           class="collapsed">
                                            <?php  echo $arr->question?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne<?php echo $arr->id; ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <?php   echo $arr->answer?>

                                            </div>
                                        </div>
                                        <div class="row muft">
                                            <div class="col-sm-3" style="  cursor: pointer; border-left: 6px solid #02baa6;
                                                 background-color: lightgrey; margin-top: 10px; margin-left: 15px;">
                                                <a  href="{{url('mmpApp/advisory2')."/".$arr->mufti}}">
                                                        <span style="font-family: bold ; font-size: 1.075em; color: #172646;">
                                                            <?php echo "Mufti : ".$arr->mufti?></span></a></div>
                                            <div class="col-sm-9"></div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php  }       ?>

                        </div>

                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>




        </div>
    </div>
    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

        });

    </script>
@endsection