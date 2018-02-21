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

        @import url(https://fonts.googleapis.com/css?family=Lato:400,700);

        .clearfix {
            *zoom: 1;
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        myUL {
            position: relative;
            margin: 50px auto;
            width: 710px;
            padding: 0;
            list-style: none;
            text-align: center;
            text-transform: uppercase;
            font-weight: 900;
            font-size: 20px;
            line-height: 40px;
            color: #555;

        }

        .myLI {
            position: relative;
            margin: 10px;
            width: 157px;
            height: 157px;
            float: left;
            list-style: none;
        }

        .myLI:before {
            content: "\2714";
            display: block;
            position: absolute;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background: #00c09e;
            border-radius: 50px;
            color: #fff;
            text-align: center;
            font-size: 16px;
            z-index: 10;
            opacity: 0;
            transition: 0.3s linear;
            -o-transition: 0.3s linear;
            -ms-transition: 0.3s linear;
            -moz-transition: 0.3s linear;
            -webkit-transition: 0.3s linear;
            -o-user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            cursor: pointer;
        }

        .myLI.selected:before {
            opacity: 1;
        }

        /* img selection */

        .myLI.selected img {
            box-shadow: 0 0 0 4px #00c09e;
            animation: selected 0.3s cubic-bezier(0.250, 0.100, 0.250, 1.000);
            -o-animation: selected 0.3s cubic-bezier(0.250, 0.100, 0.250, 1.000);
            -ms-animation: selected 0.3s cubic-bezier(0.250, 0.100, 0.250, 1.000);
            -moz-animation: selected 0.3s cubic-bezier(0.250, 0.100, 0.250, 1.000);
            -webkit-animation: selected 0.3s cubic-bezier(0.250, 0.100, 0.250, 1.000);
        }

        @keyframes selected {
            0% {
                border-color: #fff;
            }
            50% {
                transform: scale(0.5);
                opacity: 0.8;
                box-shadow: 0 0 0 4px #00c09e;
            }
            80%, 100% {
                width: 100%;
                height: 100%;
                box-shadow: 0 0 0 4px #00c09e;
            }
        }

        @-o-keyframes selected {
            0% {
                box-shadow: 0 0 0 4px #fff;
            }
            50% {
                -o-transform: scale(0.5);
                opacity: 0.8;
                box-shadow: 0 0 0 4px #00c09e;
            }
            80%, 100% {
                width: 100%;
                height: 100%;
                box-shadow: 0 0 0 4px #00c09e;
            }
        }

        @-ms-keyframes selected {
            0% {
                box-shadow: 0 0 0 4px #fff;
            }
            50% {
                width: 45%;
                height: 45%;
                opacity: 0.8;
                box-shadow: 0 0 0 4px #00c09e;
            }
            80%, 100% {
                width: 100%;
                height: 100%;
                box-shadow: 0 0 0 4px #00c09e;
            }
        }

        @-webkit-keyframes selected {
            0% {
                box-shadow: 0 0 0 4px #fff;
            }
            50% {
                -webkit-transform: scale(0.5);
                opacity: 0.8;
                box-shadow: 0 0 0 4px #00c09e;
            }
            80%, 100% {
                width: 100%;
                height: 100%;
                box-shadow: 0 0 0 4px #00c09e;
            }
        }

        /* button */

        .clearfix button {
            height: 45px;
            margin: 0 7px;
            padding: 5px 0;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 2px;
            color: #fff;
            border: 0;
            border-radius: 2px;
            text-transform: uppercase;
            outline: 0;
        }

        .clearfix button.select {
            float: left;
            background: #435a6b;
            cursor: pointer;
            width: 150px;
        }

        .clearfix button.select:before, button.select:after {
            position: absolute;
            display: block;
            content: 'select all';
            width: 150px;
            text-align: center;
            transition: 0.1s linear;
            -o-transition: 0.1s linear;
            -ms-transition: 0.1s linear;
            -moz-transition: 0.1s linear;
            -webkit-transition: 0.1s linear;
        }

        .clearfix button.select:after {
            content: 'unselect';
            margin-top: 20px;
            opacity: 0;
        }

        .clearfix button.select.selected:before {
            transform: translate(0, -38px);
            -o-transform: translate(0, -38px);
            -ms-transform: translate(0, -38px);
            -moz-transform: translate(0, -38px);
            -webkit-transform: translate(0, -38px);
            opacity: 0;
        }

        .clearfix button.select.selected:after {
            transform: translate(0, -38px);
            -o-transform: translate(0, -38px);
            -ms-transform: translate(0, -38px);
            -moz-transform: translate(0, -38px);
            -webkit-transform: translate(0, -38px);
            opacity: 1;
        }

        .clearfix button.send {
            float: right;
            background: #aaa;
            padding: 0px 15px;
            transition: 0.3s linear;
            -o-transition: 0.3s linear;
            -ms-transition: 0.3s linear;
            -moz-transition: 0.3s linear;
            -webkit-transition: 0.3s linear;
        }

        .clearfix button.send.selected {
            background: #00c09e;
            cursor: pointer;
        }

        .clearfix button.del {
            float: right;
            background: #aaa;
            padding: 0px 15px;
            transition: 0.3s linear;
            -o-transition: 0.3s linear;
            -ms-transition: 0.3s linear;
            -moz-transition: 0.3s linear;
            -webkit-transition: 0.3s linear;
        }

        .clearfix button.del.selected {
            background: #00c09e;
            cursor: pointer;
        }

        .clearfix button.send:after {
            position: absolute;
            content: attr(data-counter);
            padding: 5px 8px;
            margin: -29px 0 0 0px;
            line-height: 100%;
            border: 2px #fff solid;
            border-radius: 60px;
            background: #00c09e;
            transition: 0.1s linear;
            -o-transition: 0.1s linear;
            -ms-transition: 0.1s linear;
            -moz-transition: 0.1s linear;
            -webkit-transition: 0.1s linear;
            opacity: 0;
        }

        .clearfix button.send.selected:after {
            opacity: 1;
        }

        /* Safari */

    </style>

@endsection
@section('content')
    <header class="page-header" style="margin-bottom: 50px">
        <div class="container-fluid">
            <h3 class="no-margin-bottom">Gallary</h3>
        </div>
    </header>
    <div class="modal  bd-example-modal-lg" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="width: 48px">


            </div>
        </div>
    </div>

    <div class="container">
        <!-- Forms Section-->

        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1"></div>

                    <div class="col-sm-11">
                        <div class="card">

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Add photo</h3>
                            </div>

                            <div class="card-body">

                                @if(session('success'))
                                    <div class="alert alert-success">{{session('success')}}</div>
                                @endif

                                @if($errors->has('gallery'))

                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <form method="post" enctype="multipart/form-data" action="{{url('addPhoto')}}"
                                      class="form-inline"
                                      style="margin-left: 50px">
                                    {{ csrf_field() }}
                                    <div class="form-group row">

                                        <input type="file" name="gallery[]" multiple/>
                                    </div>

                                    <div class="form-group row">

                                        <button type="submit" class="mx-sm-3 btn btn-primary"><i class="fa fa-plus"></i>
                                            Add photos
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1"></div>

                    <div class="col-sm-11">
                        <div class="card">

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">delete your photo</h3>
                            </div>

                            <div class="card-body">
                                <div class="clearfix  row" style="margin-left: 30px">
                                    <div class="col-sm-3">
                                    <button class="select" >&nbsp;</button>
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                    <button class="send "  data-counter="0">&#10004;</button>

                                    <button class="del " data-counter="0">&#10007;</button>
                                    </div>
                                </div>

                                <div class="row" style="margin-left: 50px">
                                    <ul class="myUL ">
                                        <?php
                                        foreach ($allpath as $arr){

                                        $imgPath = str_replace("public/", "", $arr->path);
                                        ?>

                                        <li class="myLI">
                                            <input type="hidden" class="id_hidden" value="<?php echo $arr->id;?>">
                                            <img width="157" height="157"
                                                 src="{{asset('storage/'.$imgPath)}}">
                                        </li>

                                        <?php    }
                                        ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

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




            // item selection

            var dataId = [];
            $('.myLI').click(function () {
                $(this).toggleClass('selected');
                var id_hiddenToDel = $(this).find('.id_hidden').val();

                if (jQuery.inArray(id_hiddenToDel, dataId) == -1) {
                    dataId.push(id_hiddenToDel);

                } else {
                    dataId = $.grep(dataId, function (e) {
                        return e != id_hiddenToDel;
                    });
                }


                if ($('li.selected').length == 0) {
                    $('.select').removeClass('selected');
                }
                else
                    $('.select').addClass('selected');

                counter();


            });


            // all item selection
            $('.select').click(function () {
                if ($('li.selected').length == 0) {
                    dataId = [];

                    $('.myLI').each(function( index ) {

                        dataId.push( $(this).find('.id_hidden').val());

                    });

                    $('.myLI').addClass('selected');
                    $('.select').addClass('selected');

                }
                else {
                    dataId = [];
                    $('.myLI').removeClass('selected');
                    $('.select').removeClass('selected');

                }
                counter();
            });
            $('.del').click(function () {

                if ($('li.selected').length == 0) {
                alert("please select photo to delete")
                }else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var r = confirm("Are you sure");
                    if (r == true) {
                        $.ajax({
                            url: "{{url('deletePhoto')}}",
                            method: "get",
                            data: {dataId: dataId},
                            success: function (e) {
                                alert(e);

                                $.each(dataId, function (key, value) {
                                    $('.myLI').each(function (index) {

                                        if ($(this).find('.id_hidden').val() == value) {
                                            $(this).hide('slow' , function () {
                                                $(this).remove();
                                            });
                                        }
                                    });

                                });

                            }


                        });

                    } else {
                        alert('The Photo has been not deleted')
                    }
                    $('.myLI').removeClass('selected');
                    $('.select').removeClass('selected');
                    counter();
                }

            });


            // number of selected items
            function counter() {
                if ($('li.selected').length > 0)
                    $('.send').addClass('selected');
                else
                    $('.send').removeClass('selected');
                $('.send').attr('data-counter', $('li.selected').length);
            }


        })
        ;
    </script>


@endsection