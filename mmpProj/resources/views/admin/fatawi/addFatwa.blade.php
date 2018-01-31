@extends('admin.app')
@section('css')

    <link rel="stylesheet" href="{{asset('admin/css/tagsinput.css')}}">
    <style>
        section {
            padding: 20px;
        }

        .form-control-label {
            font-size: 15px;
            font-weight: bold;
        }

        section.forms form span {
            color: #ffffff;
        }

        .bootstrap-tagsinput .badge [data-role="remove"]:after {
            background-color: rgba(253, 41, 59, 0.82);
        }

        .bootstrap-tagsinput .badge [data-role="remove"]:hover {
            background-color: rgba(255, 36, 56, 0.82);
        }

        .bootstrap-tagsinput .badge {
            background-color: rgba(59, 53, 253, 0.82);
            margin: 3px;
        }

        .hidden {
            display: none;
        }

    </style>

@endsection
@section('content')
    <header class="page-header" style="margin-bottom: 50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"> <h3 class="no-margin-bottom">Add Fatwa</h3></div>
                <div class="col-sm-5"></div>

                <div class="col-sm-3">
                    <input type="submit" class="btn btn-info" value="visit Fatwa user"
                           onclick="window.location='{{asset('mmpApp/advisory')}}';"/>
                </div>

            </div>

        </div>
    </header>

    <div class="container">

        <!-- Forms Section-->

        <section class="forms">
            <div class="container-fluid">
                <div class="row">

                    <!-- Form Elements -->
                    <div class="col-sm-1"></div>
                    <div class="col-lg-10">
                        <div class="card">



                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Add Fatwa</h3>
                            </div>
                            <div class="row" style="margin-left: 35% ; margin-top: 20px" >
                                <div class="alert alert-success success hidden">The Added is done</div>
                            </div>


                            <div class="card-body">
                                <div class="alert alert-danger print-error-msg" style="display:none; margin: 10px;">
                                    <ul></ul>
                                </div>
                                <!-- <form class="form-horizontal"> -->


                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label ">Question </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control question" name="question" id="summary"></textarea></div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">

                                        <label class="col-sm-2 form-control-label ">Answer </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control answer" name="answer"></textarea></div>
                                        <div class="col-sm-2"></div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">Category </label>
                                        <div class="col-sm-8">
                                            <select class="form-control "  id="optionCat">
                                                <option class="default"> </option>
                                                <?php
                                                foreach ($allCat as $arr){
                                                ?>
                                                <option value=<?php echo $arr->id ?> ><?php echo $arr->name ?></option>
                                                <?php    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">

                                        <label class="col-sm-2 form-control-label ">Mufti Name</label>
                                        <div class="col-sm-8">
                                            <input type="text"  name="mufti" class="form-control mufti">
                                        </div>


                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-3">
                                            <button type="button" id="addFatwa" class="btn btn-primary addNewFatwa">Save changes
                                            </button>
                                        </div>
                                    </div>



                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>


                </div>
            </div>
        </section>


        <!-- Page Footer-->
    </div>


@endsection

@section('script')

    <script src="{{asset('admin/js/tagsinput.js')}}"></script>

    <script>
        $(document).ready(function () {
           $('.success').addClass('hidden');
            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

$('.addNewFatwa').click(function () {

    var question = $('.question').val();
    var answer = $('.answer').val();
    var category = $('select#optionCat option:selected').val();
    var  mufti= $('.mufti').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{url('addFatwa')}}",
        method: "get",
        data: {question: question, answer: answer, category: category ,mufti:mufti},
        success: function (e) {

            if(e==1){
                alert("Test to  login")
            }else {
                if ($.isEmptyObject(e.error)) {
                    alert(e.success);
                    $('.question').val("");
                    $('.answer').val("");
                    $('select#optionCat option[class="default"]').attr("selected",true);
                    $('.mufti').val("");
                    $('.success').removeClass('hidden');
                    $('.success').show('slow');
                    setTimeout(function() { $(".success").hide('slow'); }, 3000);
                    $('html, body').animate({
                        scrollTop: $(".card-header").offset().top
                    }, 1000);
                    $(".print-error-msg").hide();

                } else {
                    printErrorMsg(e.error);
                }
            }
            }






    });


});


        });
    </script>


@endsection