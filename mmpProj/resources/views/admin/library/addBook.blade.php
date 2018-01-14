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


    </style>

@endsection
@section('content')
    <header class="page-header" style="margin-bottom: 50px">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Add Book</h2>
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
                                <!-- <form class="form-horizontal"> -->
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group row">

                                        {{ csrf_field() }}
                                        <label class="col-sm-2 form-control-label ">Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" id="nameBook" class="form-control">
                                        </div>

                                        <label class="col-sm-2 form-control-label">Edition</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">Category </label>
                                        <div class="col-sm-8">
                                            <select class="form-control">
                                                <option> Arabic</option>
                                                <option> English</option>
                                                <option> Franch</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">

                                        <label class="col-sm-2 form-control-label">Summary </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control"></textarea></div>
                                        <div class="col-sm-2"></div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">

                                        <label class="col-sm-2 form-control-label">Image </label>
                                        <div class="col-sm-8">
                                            <input name="fileImg" id="fileImg" type="file" class="form-control">
                                        </div>


                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">publish</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">Auther</label>
                                        <div class="col-sm-8">
                                            <input id="SS" type="text" value="Amsterdam,Washington,Sydney"
                                                   data-role="tagsinput"/>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">keyword</label>
                                        <div class="col-sm-8">
                                            <input id="tagInput" type="text"
                                                   value="Amsterdam,Washington,Sydney,Beijing,Cairo"
                                                   data-role="tagsinput"/>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">Outline </label>
                                        <div class="col-sm-8">
                                            <input id="SS" type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo"
                                                   data-role="tagsinput"/>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>

                                    <div class="container addNewLang">
                                        <!-- <div class="newLang">
                                             <div class="form-group row lang"
                                                  style="border: 1px solid #00A8FF ;padding: 15px">

                                                 <label class="col-sm-2 form-control-label">Language </label>
                                                 <div class="col-sm-4">

                                                     <select class="form-control">
                                                         <option> Arabic</option>
                                                         <option> English</option>
                                                         <option> Franch</option>
                                                     </select>
                                                 </div>
                                                 <div class="col-sm-6 ">
                                                     <div class="row" style="margin-bottom: 15px">
                                                         <input type='file'>
                                                     </div>
                                                     <div class="row" style="margin-bottom: 15px">
                                                         <input type='file'>
                                                     </div>
                                                     <div class="row">
                                                         <input type='file'>
                                                     </div>

                                                 </div>

                                             </div>
                                         </div> -->

                                        <div class="form-group row imm">

                                            <label class="col-sm-2 form-control-label">Language</label>

                                            <div class="col-sm-3 ">
                                                <select class="form-control">
                                                    <option>Arabic</option>
                                                    <option>English</option>
                                                    <option>Franch</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-2 ">
                                                <select class="form-control ">
                                                    <option>Pdf</option>
                                                    <option>PowerPoint</option>
                                                    <option>Word</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4">
                                                <input type="file"
                                                       class="form-control"
                                                       placeholder="upload your img..">
                                            </div>

                                            <div class="col-sm-1">
                                                <button type='button' class="btn btn-success add-img"><i
                                                            class="fa fa-plus"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-3">
                                            <button type="button" class="btn btn-primary addNewBook">Save changes
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

            $('.add-img').click(function () {


                var a = " <div class='row imm' style='margin-bottom: 10px'>" +
                    "<label class='col-sm-2 form-control-label'>Language</label>" +

                    "<div class='col-sm-3 '>" +
                    "<select class='form-control ' >" +
                    "<option>Arabic </option>" +
                    "<option>English </option>" +
                    "<option>Franch </option>" +
                    "</select>" +
                    "</div>" +
                    "<div class='col-sm-2 '>" +
                    "<select class='form-control  ' >" +
                    "<option>Pdf</option>" +
                    "<option>PowerPoint</option>" +
                    "<option>Word</option>" +
                    "</select>" +
                    "</div>" +
                    "<div class='col-sm-4'>" +
                    "<input type='file'  class='form-control '  placeholder='upload your img..'>" +
                    "</div>" +
                    "<div class='col-sm-1'>" +
                    "<button type='button' class='btn btn-danger hide-img'><i class='fa fa-minus'></i></button>" +
                    "</div>" +
                    "</div>" +
                    "<div align='center' class='uploadImgError' style='color: Red;'></div>" +
                    "";

                $('.addNewLang').append(a);

                $('.hide-img').click(function () {
                    $(this).parents('.imm').remove();

                });

            });


            $('.addNewBook').click(function () {

                var file_data = $('#fileImg').prop('files')[0];
                var form_data = new FormData();

                form_data.append('file', file_data);
                form_data.append('name1', $('#nameBook').val());

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: '{{url('testImg2')}}',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (data) {
                        alert(data);

                    }
                });


            });

        });
    </script>


@endsection