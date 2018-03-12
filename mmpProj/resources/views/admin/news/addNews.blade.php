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

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .bd-example-modal-lg .modal-dialog {
            display: table;
            position: relative;
            margin: 0 auto;
            top: calc(30% - 24px);

        }

        .bd-example-modal-lg .modal-dialog .modal-content {
            background-color: transparent;
            border: none;

        }

    </style>

@endsection
@section('content')
    <header class="page-header" style="margin-bottom: 50px">
        <div class="container-fluid">
            <h3 class="no-margin-bottom">Add Book</h3>
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
                                <h3 class="h4">Add Book</h3>
                            </div>

                            <div class="card-body">
                                <div class="alert alert-danger print-error-msg" style="display:none; margin: 10px;">
                                    <ul></ul>
                                </div>

                                <div class="successMsg alert alert-success hidden">
                                    The adding is done
                                </div>
                                <!-- <form class="form-horizontal"> -->
                                <form method="post" id="addBookForm" enctype="multipart/form-data">
                                    <div class="form-group row">

                                        {{ csrf_field() }}
                                        <label class="col-sm-2 form-control-label ">titel</label>
                                        <div class="col-sm-5">
                                            <input type="text" id="titel" name="titel" class="form-control">
                                        </div>

                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">discretion </label>
                                        <div class="col-sm-8">
                                            <input type="text" id="discretion" name="discretion" class="form-control">
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">

                                        <label class="col-sm-2 form-control-label">Image </label>
                                        <div class="col-sm-8">
                                            <input name="fileImg" id="fileImg" type="file" accept="image/*"
                                                   class="form-control">
                                        </div>


                                        <div class="col-sm-2"></div>
                                    </div>



                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-3">
                                            <button type="button" class="btn btn-primary addNewBook">Add book
                                            </button>
                                        </div>
                                    </div>

                                </form>
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

            function printErrorMsg(msg) {

                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                var arrError = [];
                $.each(msg, function (key, value) {

                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

            $('.addNewBook').click(function () {

 var checkImg = 1 ;
                var file_data = $('#fileImg').prop('files')[0];
                var form_data = new FormData();

                var titel = $('#titel').val();
                var discretion = $('#discretion').val();

                if(file_data == null) {
                    checkImg = 0;
                }
                form_data.append('file', file_data);
                form_data.append('titel', titel);
                form_data.append('discretion', discretion);
                form_data.append('checkImg', checkImg);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: '{{url('addNews')}}',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (e) {
                        var jsonVar = $.parseJSON(e);
                        if (jsonVar.success == 1) {

                            alert("add is done");

                             $('#titel').val('');
                            $('#discretion').val('');
                             $('#fileImg').val('');
                            $(".print-error-msg").hide();
                        } else {
                            printErrorMsg(jsonVar.error);
                        }








                    }
                });


            });

        });
    </script>


@endsection