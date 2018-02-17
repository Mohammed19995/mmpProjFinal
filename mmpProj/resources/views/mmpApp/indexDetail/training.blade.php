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
                    <h1 class="page-title">Training and Human Development</h1>

                    <ul class="breadcrumb">
                        <li><a href="">Home </a></li>
                        <li><a href="#">Training and Human Development</a></li>
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
                            <h2 class="highlight-heading ucase" data-animation-direction="from-left" data-animation-delay="50"><strong>Training and Human Development</strong></h2>
                            <p class=" " data-animation-direction="from-left" data-animation-delay="250">
                                The training and human development mechanism is one of the most important practical mechanisms adopted by the Observatory to rehabilitate the European Muslim and the advancement of the Islamic community. The training is organized by Western and Muslim experts and specialists with high experience in the field of human development. These exercises include various fields of debt, media, education,
                                health, law and governance, benefiting the groups of imams, teachers, educators, media professionals, managers, etc..</p>
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