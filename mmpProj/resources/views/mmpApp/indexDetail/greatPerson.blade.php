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
                    <h1 class="page-title">Great person</h1>

                    <ul class="breadcrumb">
                        <li><a href="">Home </a></li>
                        <li><a href="#">Great person</a></li>
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
                            <h2 class="highlight-heading ucase" data-animation-direction="from-left" data-animation-delay="50"><strong>Great person</strong></h2>
                            <p class=" " data-animation-direction="from-left" data-animation-delay="250">
                                This angle is unique to the various leading Islamic figures who have come to balance in
                                the history of Islamic civilization in ancient and modern times. They include various
                                fields and disciplines of religion, literature, philosophy, history, mathematics, medicine, physics, These figures contributed to the formation of the features of Islamic civilization, and even exceeded the impact of the border to other Eastern and Western nations, which is a great cultural Islam of modern Renaissance, and the testimony of thinkers and philosophers who recognize the historical and cultural role played by Islam in the history of humanity. There are many distinguished names in our Islamic civilization which have a distinctive impact on the Western man, who has appreciation and admiration. Perhaps the work of presenting these Islamic figures objectively, smoothly and differently would know more about Islam, religion, civilization and history. The yellow platforms, whose editorial line is based on rumor, exaggeration and misinformation.
                            </p>
                        </div>


                        <div id="corporate-highlight" class="col-sm-5 highlight-img">
                            <div class="padding-img"></div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    <section id="our-work" class="no-padding-top-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="center"><h1 class="section-title" data-animation-direction="from-bottom"
                                            data-animation-delay="50">Great <strong>Person</strong></h1></div>
                </div>

            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div id="our-work-carousel" class="owl-carousel carousel-style-1">
                        <div class="item" data-animation-direction="from-bottom" data-animation-delay="150">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item" data-animation-direction="from-bottom" data-animation-delay="300">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item" data-animation-direction="from-bottom" data-animation-delay="450">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')

@endsection