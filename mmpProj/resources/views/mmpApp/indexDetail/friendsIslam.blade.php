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
                    <h1 class="page-title">Friends of Islam</h1>

                    <ul class="breadcrumb">
                        <li><a href="">Home </a></li>
                        <li><a href="#">Friends of Islam</a></li>
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
                            <h2 class="highlight-heading ucase" data-animation-direction="from-left" data-animation-delay="50"><strong>Friends of Islam</strong></h2>
                            <p class=" " data-animation-direction="from-left" data-animation-delay="250">
                                There is a Western sect that treats Muslims on the basis of tolerance, respect and charity. In the Western media and intellectual literature, they are called "the wise men of the West," because they strive to bring cultures, religions and races closer together and reject the clash of civilizations theory that calls for conflict and confrontation. This wise slice reminds us of the author whose hearts Islam gave them to share the zakat, and by telling the people of the book that it is the best and the good preaching, as stipulated by the Holy Quran. These Western wise men, whose interests and specialties vary, are present in most European and Western societies. In this regard we refer to the names of Hans Kung,
                                Prince Charles, Karen Armstrong, Jurgen Nielsen, Anna Marie Schimmel, Van Kuningsfeld, and many others.
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