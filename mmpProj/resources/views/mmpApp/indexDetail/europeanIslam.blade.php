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

        .hand {
            cursor: pointer;
        }

        .isLiked {
            color: #0E7EB5;
        }
    </style>

@endsection
<?php
use App\category;
use App\Http\Controllers\LibraryCon;
?>


@section('content')

    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
    <div id="page-title-2" class=" parallax dark-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">European Islam</h1>

                    <ul class="breadcrumb">
                        <li><a href="">Home </a></li>
                        <li><a href="#">European Islam</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE/BREADCRUMB -->

    <!-- BEGIN CONTENT WRAPPER -->

        <section class="section-highlight"  style="margin-left: 150px">
            <div class="container-fluid">
                <div class="row">
                    <div class="row-table">

                        <div class="col-sm-12  padding-top padding-bottom ">
                            <h2 class="highlight-heading ucase" data-animation-direction="from-left" data-animation-delay="50"><strong>European Islam</strong></h2>
                            <p class=" " data-animation-direction="from-left" data-animation-delay="250">
                                Despite the media, political and intellectual debate over whether the term "European Islam" applies or does not apply to the nature of contemporary Islamic presence in Europe and the West, there is more than one indication that the concept of European Islam is today a reality that can not be ignored or repealed. The figures show that the Islamic spectrum is strikingly present in European pluralism, not only demographically and humanly, but through various forms of tangible and tangible contribution, at the level of formal education, civil society, social work, scientific research, political participation and economic investment. Therefore, the concept of European Islam derives its existential reality from its extended presence in the structure of European societies, a presence that does not conflict with the nature of the
                                Islamic religion, which is based on dialogue, tolerance, diversity and openness to different cultures, languages ​​and races</p>


                        </div>


                        <div id="corporate-highlight" class="col-sm-5 highlight-img">
                            <div class="padding-img"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')

@endsection