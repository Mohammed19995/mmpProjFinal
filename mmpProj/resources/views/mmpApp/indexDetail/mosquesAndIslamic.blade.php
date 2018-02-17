@extends('mmpApp.mmpApp')

@section('css')
    <style>


        .search button {
            position: absolute;
            top: 5px;
            right: 5px;
            border: none;
            background-color: inherit;
        }



        .button-two{
            text-align: center;
            cursor: pointer;
            font-size:17px;
            padding: 7px;

        }


        a{
            color: white;
        }
        a:hover{
            color: white;
        }


        /*Button Two*/
        .button-two {
            border-radius: 4px;
            background-color:#02baa6;
            border: none;
            width: 260px;
            transition: all 0.5s;
        }


        .button-two  span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button-two span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button-two:hover span {
            padding-right: 25px;
        }

        .button-two:hover span:after {
            opacity: 1;
            right: 0;
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
                    <h1 class="page-title">Mosques and Islamic institutions </h1>

                    <ul class="breadcrumb">
                        <li><a href="">Home </a></li>
                        <li><a href="#">Mosques and Islamic institutions</a></li>
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
                            <h2 class="highlight-heading ucase" data-animation-direction="from-left" data-animation-delay="50"><strong>Mosques and Islamic institutions</strong></h2>
                            <p class=" " data-animation-direction="from-left" data-animation-delay="250">
                                The number of mosques and Islamic institutions in Europe is estimated at thousands and offers its varied services to millions of Muslims across the continent. However, they are in constant need of continuous coordination among them at the level of religious and cultural activities, systematic educational cooperation, media communication, . The way in which Islam is represented by these institutions is very flawed, which raises a lot of misunderstandings and dissatisfaction with the official European and governmental bodies. The European Observatory for Moderate Islam aspires to bring this huge momentum of mosques and Islamic institutions to Europe in the form of a comprehensive information bank listing the data, activities and projects of each institution,
                                focusing on the moderate discourse advocated by most Muslim institutions operating in Europe.</p>
                        </div>


                        <div id="corporate-highlight" class="col-sm-5 highlight-img">
                            <div class="padding-img"></div>
                        </div>
                    </div>

                </div>
                <div class="row" style=" margin-bottom:  100px">
                        <button class="button-two">
                            <a href="{{url('mosque')}}"> <span>  Show Mosque Department</span></a>
                        </button>

                </div>
            </div>
        </section>

    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')

@endsection