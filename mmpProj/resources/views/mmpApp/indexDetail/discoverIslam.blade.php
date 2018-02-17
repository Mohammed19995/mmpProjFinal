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
                    <h1 class="page-title">Discover Islam</h1>

                    <ul class="breadcrumb">
                        <li><a href="">Home </a></li>
                        <li><a href="#">Discover Islam</a></li>
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
                            <h2 class="highlight-heading ucase" data-animation-direction="from-left" data-animation-delay="50"><strong>Discover Islam</strong></h2>
                            <p class=" " data-animation-direction="from-left" data-animation-delay="250">
                                The friction of the Christian West with Islam is
                                not born today; it has been for centuries that each
                                side tried to discover and recognize the other.
                                However, the need for further discovery remains both existing and sensitive.
                                The emphasis is usually on introducing Islam on the doctrinal and ritual aspects at the expense of other historical, scientific, intellectual, architectural and architectural aspects. This is contrary to the message of Islam, which focuses on the use of reason and seeking knowledge and create a balance between what is mundane and Acharawi. The more the European and the non-Muslim Western can
                                access these cultural aspects of Islam, accept Islam and strive to identify deeply and seriously
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