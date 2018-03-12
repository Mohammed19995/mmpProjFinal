@extends('admin.app')

<?php
use App\Http\Controllers\LibraryCon;
?>
@section('css')
    <link rel="stylesheet" href="{{asset('admin/dataTable/css/dataTable.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('admin/css/tagsinput.css')}}">

    <style>
        a.dt-button {
            background-image: linear-gradient(to bottom, #fff 0%, rgba(173, 194, 253, 0.82) 100%);
            border: none;
            padding: 0;
        }

        #example_filter label {
            display: block;
        }

        .hidden {
            display: none;
        }

        .fa-plus:hover, .fa-minus:hover {
            cursor: pointer;
        }

        .imgBook {
            cursor: pointer;
        }

        .modal-header, h4, .close {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }

        .modal-header .close {
            margin: 0;
            padding: 10px;
        }

        #example_filter label {
            cursor: pointer;
        }

        .hand {
            cursor: pointer;
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
            <h2 class="no-margin-bottom">View News</h2>
        </div>
    </header>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 style="margin-right: 40%"><span class="fa fa-edit"></span> Update <span
                                style="padding-left:10px; " id=""></span><span
                                class="nameProdModel"></span></h3>
                </div>
                <div class="modal-body">


                    <div class="alert alert-danger print-error-msg" style="display:none; margin: 10px;">
                        <ul></ul>
                    </div>

                    <div class="alert alert-success hidden successMsg"> the updating is done.</div>


                    <input type="hidden" id="id_hidden">

                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Title </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input type="text" class="form-control" id="m_title">

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Discreption </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input type="text" class="form-control" id="m_discretion">

                            </div>

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Image </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input name="fileImg" id="m_img" type="file" accept="image/*"
                                       class="form-control">

                            </div>

                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                class="fa fa-remove"></span> Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-default pull-left save"><span
                                class=" fa fa-save saveIcon"></span><i
                                class="fa fa-spinner fa-spin loadingUpdate hidden" style="font-size:24px"></i> save
                    </button>

                </div>
            </div>

        </div>
    </div>


    <section>
        <div class="container">

            <div class="row">

                <div class="col-sm-11">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">View News</h3>
                        </div>

                        <div class="card-body">

                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>


                                    <th>Image</th>
                                    <th>Titel</th>
                                    <th>Discreption</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>


                                    <th>Image</th>
                                    <th>Titel</th>
                                    <th>Discreption</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                <?php foreach ($allnews as $p) {

                                $imgPath = str_replace("public/", "", $p->path);

                                ?>
                                <tr>

                                    <input type="hidden" class="newsId" value="<?php echo $p->id;?>">

                                    <td class="imgNews"><img width="50" height="50"
                                                               src="{{asset('storage/'.$imgPath)}}"></td>
                                    <td class="titelNews"><?php echo $p->titel;?></td>
                                    <td class="discretion"><?php echo $p->discretion;?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> edit
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete"><i class="fa fa-remove"></i> delete
                                        </button>
                                    </td>


                                </tr>
                                <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>



@endsection

@section('script')

    <script src="{{asset('admin/dataTable/js/dataTable.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableBootStrap.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableButtons.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTablePdfMake.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableFonts.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableBtnHtml.js')}}"></script>
    <script src="{{asset('admin/js/tagsinput.js')}}"></script>

    <script>
        $(document).ready(function () {

            function printErrorMsg(msg) {
                $('.successMsg').addClass('hidden');
                $('.loadingUpdate').addClass('hidden');
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');

                $.each(msg, function (key, value) {

                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');


                });
            }


            $('#example tbody').on('click', 'tr .edit', function () {
                thisRow = $(this).parents('tr');
                $('.successMsg').addClass('hidden');
                $(".print-error-msg").hide();
                $('#myModal').modal('show');


                var titelNews = $(this).parents('tr').find('.titelNews').text();
                var discretion = $(this).parents('tr').find('.discretion').text();

                 
                $('#id_hidden').val($(this).parents('tr').find('.newsId').val());
                $('#m_title').val(titelNews);
                $('#m_discretion').val(discretion);



            });
            $('#myModal .save').on('click', function () {

                var thisSave = $(this);
                var id_hidden = $('#id_hidden').val();
                var form_data = new FormData();

                var checkImgBook = 1;
                var fileImge = $('#m_img').prop('files')[0];
                if (fileImge == null) {
                    checkImgBook = 0;
                }


                form_data.append('id_hidden', $('#id_hidden').val());
                form_data.append('titelNews', $('#m_title').val());
                form_data.append('discretion', $('#m_discretion').val());
                form_data.append('file', fileImge);
                form_data.append('checkImg', checkImgBook);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: '{{url('editNews')}}',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (e) {
                        var jsonVar = $.parseJSON(e);

                        if (jsonVar.success == 1) {
                            $('.successMsg').removeClass('hidden');
                            $(".print-error-msg").hide();
                            if (checkImgBook == 1) {
                                var link = "{{asset('storage')}}";
                                var str = jsonVar.path;
                                var res = str.replace("public/", "");

                                thisRow.find('.imgNews img').attr('src', link + "/" + res);

                            }
                            thisRow.find('.titelNews').text($('#m_title').val());
                            thisRow.find('.discretion').text($('#m_discretion').val());



                        } else {
                            printErrorMsg(jsonVar.error);
                        }
                    }
                });


            });

            $('#example tbody').on('click', 'tr .delete', function () {
                var thisRowToDel = $(this).parents('tr');
                var idNews = $(this).parents('tr').find('.newsId').val();

                var r = confirm("Are you sure!");
                if (r == true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('deleteNews')}}",
                        method: "get",
                        data: {idNews: idNews},
                        success: function (e) {
                            // thisRowToDel.remove();
                            thisRowToDel.hide('slow');
                        }

                    });

                } else {
                    alert("The mousqe has been not deleted")
                }


            });


        });

    </script>
@endsection