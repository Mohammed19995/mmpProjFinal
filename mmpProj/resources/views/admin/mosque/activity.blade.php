@extends('admin.app')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/dataTable/css/dataTable.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="{{asset('admin/froala/css/froala_editor.css')}}">
    <link rel="stylesheet" href="{{asset('admin/froala/css/froala_style.css')}}">

    <link rel="stylesheet" href="{{asset('admin/froala/css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('admin/froala/css/table.css')}}">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">



    <style>
        #example_filter label {
            display: block;
        }

        .hand {
            cursor: pointer;
        }

        section {
            padding: 20px;
        }

        .form-control-label {
            font-size: 15px;
            font-weight: bold;
        }

        section.forms form span {
            color: #000000;
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

        #map {
            height: 400px;
            width: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {

            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;

        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

        #target {
            width: 345px;
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
        #editor .fr-wrapper {
          height: 250%;
        }
        #editor2 .fr-wrapper {

        }

    </style>
@endsection
@section('content')


    <header class="page-header" style="margin-bottom: 50px">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Activity</h2>
        </div>
    </header>


    <div class="modal  bd-example-modal-lg" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="width: 48px">

                <div class="loader"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal2" role="dialog" >
        <div class="modal-dialog modal-lg">

            <input type="hidden" value="" class="fileBookIdIncHidden">
            <!-- Modal content-->
            <div class="modal-content " >
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 style="margin-right: 40%"><span class="fa fa-edit"></span> Update <span
                                style="padding-left:10px; " id="m_title0"></span><span></span></h3>

                </div>


                <div class="modal-body">


                    <div class="alert alert-danger print-error-msg" style="display:none; margin: 10px;">
                        <ul></ul>
                    </div>

                    <div class="alert alert-success hidden successMsg"> the updating is done.</div>


                    <input type="hidden" id="id_hidden">

                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Name </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input type="text" class="form-control" id="m_title">

                            </div>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Mosque </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">

                                <input type="hidden" id="m_mosqueId">

                                <input id="m_mosque" autocomplete="off" list="mosquesM"
                                       class="form-control"/>


                                <datalist id="mosquesM">
                                    <option></option>
                                    <?php
                                    foreach ($getBook as $p) {
                                    ?>
                                    <option class="dataList"
                                            id="<?php echo $p->id;?>"
                                            value="<?php echo $p->name;?>"></option>
                                    <?php }

                                    ?>
                                </datalist>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px">Content</h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">

                                <div id="editor2">
                                    <div id="edit2" class="form-control"
                                         style="width: 100%;height: 50%;">

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                class="fa fa-remove"></span> Cancel
                    </button>

                    <button type="button" class="btn btn-success btn-default pull-left save"><span
                                class=" fa fa-save saveIcon"></span><i
                                class="fa fa-spinner fa-spin loadingUpdate hidden" style="font-size:24px"></i> save
                    </button>

                </div>

            </div>

        </div>
    </div>

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
                                <h3 class="h4">Add activity</h3>
                            </div>

                            <div class="card-body">

                                @if(session('success'))
                                    <div class="alert alert-success">{{session('success')}}</div>
                                @endif

                                @if($errors->has('activityName') || $errors->has('title') || $errors->has('mosqueId'))

                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endif

                            <!-- <form class="form-horizontal"> -->
                                <form method="post" action="{{url('Mosque/addActivity')}}">
                                    {{ csrf_field() }}

                                    <div class="form-group row">

                                        <label class="col-sm-2 form-control-label ">Title</label>
                                        <div class="col-sm-9">

                                            <input type="text" class="form-control" name="title"
                                                   value="{{old('title')}}">
                                        </div>

                                    </div>

                                    <div class="form-group row ui-widget">

                                        <label class="col-sm-2 form-control-label ">Mosque</label>
                                        <div class="col-sm-9 ">

                                            <input type="hidden" id="mosqueId" name="mosqueId">

                                            <input id="getMosque" name="getMosque" autocomplete="off" list="mosques"
                                                   class="form-control"
                                                   value="{{old('getMosque')}}"/>

                                            <datalist id="mosques">
                                                <option></option>
                                                <?php
                                                foreach ($getBook as $p) {
                                                ?>
                                                <option class="dataList"
                                                        id="<?php echo $p->id;?>"
                                                        value="<?php echo $p->name;?>"></option>
                                                <?php }

                                                ?>
                                            </datalist>

                                        </div>

                                    </div>
                                    <div class="form-group row" >

                                        <label class="col-sm-2 form-control-label ">Content</label>
                                        <div class="col-sm-9">

                                            <div id="editor">
                                                   <textarea id="edit" class="form-control" name="activityName"
                                                             style="width: 100%;height: 100%;">{{old('activityName')}}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary addNewmMosque">Add mosque
                                            </button>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>


                </div>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="card">

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">View Books</h3>
                            </div>

                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" class="hand checkBoxDelThead" value="all"
                                                   style="height: 17px;width: 17px;"></th>
                                        <th>Title</th>
                                        <th>Mosque</th>
                                        <th>Content</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Mosque</th>
                                        <th>Content</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    foreach ($getAllActivity as $a) {

                                    $mosqueName = '';
                                    foreach ($getBook as $e) {
                                        if ($e->id == $a->mosque_id) {
                                            $mosqueName = $e->name;
                                        }
                                    }

                                    ?>
                                    <tr>

                                        <input class="idHidden" type="hidden" value="<?php echo $a->id;?>">
                                        <input type="hidden" class="mosqueId" value="<?php echo $a->mosque_id;?>">
                                        <td><input type="checkbox" class="hand checkBoxDel"
                                                   style="width: 100%;height: 17px;"></td>
                                        <td class="title"><?php echo $a->title;?></td>
                                        <td class="mosque"><?php echo $mosqueName;?></td>
                                        <td class="content"><?php echo $a->content;?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm edit"><i class="fa fa-edit"></i>
                                                Edit
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm delete"><i class="fa fa-remove"></i>
                                                delete
                                            </button>
                                        </td>
                                    </tr>
                                    <?php }

                                    ?>


                                    </tbody>
                                </table>
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
    <script src="{{asset('admin/dataTable/js/dataTable.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableBootStrap.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableButtons.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTablePdfMake.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableFonts.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableBtnHtml.js')}}"></script>
    <!--
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    -->
    <script src="{{asset('admin/froala/js/froala_editor.min.js')}}"></script>
    <script src="{{asset('admin/froala/js/font_size.min.js')}}"></script>
    <script src={{asset('admin/froala/js/font_family.min.js')}}></script>

    <script src={{asset('admin/froala/js/link.min.js')}}></script>
    <script src={{asset('admin/froala/js/lists.min.js')}}></script>
    <script src={{asset('admin/froala/js/table.min.js')}}></script>
    <script src={{asset('admin/froala/js/url.min.js')}}></script>
    <script src={{asset('admin/froala/js/colors.min.js')}}></script>
    <script>
        $(function () {
            $('#edit').froalaEditor({
                zIndex: 10
            });
            $('#edit2').froalaEditor({
                zIndex: 10
            })
        });
    </script>

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

            var table = $('#example').DataTable({

                "scrollX": true,
                dom: 'Bfrtip',
                language: {search: ""},
                buttons: [],
                order: [],
                columnDefs: [{orderable: false, targets: [0]}],
                // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "pageLength": 10,
                initComplete: function () {
                    this.api().columns(2).every(function () {
                        var column = this;
                        var select = $('<select class="form-control selCatOption" style="width: 200px;float: right;                                              "><option value="">select mosque</option></select>')
                            .prependTo($('#example_filter'))
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });


                        /*
                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });

*/
                        $('#mosques option.dataList').each(function (d, j) {
                            var selVal = $(this).val();
                            select.append('<option value="' + selVal + '">' + selVal + '</option>')
                        });
                    });

                }

            });

            $('#example_filter').find('label input').attr('placeholder', 'Search');

            $('#example_filter').append('<div class="row delSelRow hidden">' +
                '<div class="col-sm-2">' +
                '<button class="btn btn-danger btn-sm deleteSelect ">Delete selected <i class="fa fa-remove"></i></button>' +
                '</div>' +
                '<div class="col-sm-8"></div>' +
                '</div>');

            $('#getMosque').on('input', function () {
                var selectedOption = $('option.dataList[value="' + $(this).val() + '"]');
                if (selectedOption.length) {
                    $('#mosqueId').val(selectedOption.attr('id'));
                } else {
                    $('#mosqueId').val('');
                }
            });

            $('#m_mosque').on('input', function () {
                var selectedOption = $('option.dataList[value="' + $(this).val() + '"]');
                if (selectedOption.length) {
                    $('#m_mosqueId').val(selectedOption.attr('id'));
                } else {
                    $('#m_mosqueId').val('');
                }
            });

            var thisRowInTable;
            var cellTitle;
            var cellMosque;
            var cellMosqueId;
            var cellContent;

            $('#example').on('click', 'tr .edit', function () {
                thisRowInTable = $(this).parents('tr');
                $('#myModal2').modal('show');
                $('.successMsg').addClass('hidden');
                $(".print-error-msg").hide();

                cellTitle = table.cell($(this).parents('tr').find('.title'));
                cellMosque = table.cell($(this).parents('tr').find('.mosque'));
                cellContent = table.cell($(this).parents('tr').find('.content'));

                var title = $(this).parents('tr').find('.title').text();
                var mosque = $(this).parents('tr').find('.mosque').text();
                var mosqueId = $(this).parents('tr').find('.mosqueId').val();
                var content = $(this).parents('tr').find('.content').html();

                $('#myModal2').find('#id_hidden').val($(this).parents('tr').find('.idHidden').val());
                $('#myModal2').find('#m_title0').text(title);
                $('#myModal2').find('#m_title').val(title);
                $('#myModal2').find('#m_mosque').val(mosque);
                $('#myModal2').find('#m_mosqueId').val(mosqueId);
                $('#edit2').find('.fr-element').html(content);



            });

            $('#myModal2').on('click', '.save', function () {

                var id_hidden = $(this).parents('#myModal2').find('#id_hidden').val();

                var title = $(this).parents('#myModal2').find('#m_title').val();
                var mosqueId = $(this).parents('#myModal2').find('#m_mosqueId').val();
                var contentData = $(this).parents('#myModal2').find('.fr-element').html();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('editActivity')}}",
                    method: "get",
                    data: {id_hidden: id_hidden, title: title, mosqueId: mosqueId, contentData: contentData},
                    success: function (e) {

                        if (e.success == 1) {

                            $(".print-error-msg").hide();
                            $('.successMsg').removeClass('hidden');
                            thisRowInTable.find('.mosqueId').val($('#myModal2').find('#m_mosqueId').val());
                            cellTitle.data($('#myModal2').find('#m_title').val());
                            cellMosque.data($('#myModal2').find('#m_mosque').val());
                            cellContent.data($('#myModal2').find('.fr-element').html());
                        } else {
                            printErrorMsg(e.error);
                        }

                    }

                });
            });

            $('#example').on('click', 'tr .delete', function () {


                var thisRowToDel = $(this).parents('tr');
                var id_hidden = $(this).parents('tr').find('.idHidden').val();
                var r = confirm("Are you sure!");
                if (r == true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('deleteActivity')}}",
                        method: "get",
                        data: {id_hidden: id_hidden},
                        success: function (e) {
                            alert("done");
                            table
                                .row(thisRowToDel)
                                .remove()
                                .draw();
                        }

                    });
                }

            });


            $('.checkBoxDelThead').on('click', function () {

                if ($(this).is(':checked')) {
                    $('#example tbody tr').each(function (k, v) {
                        $(this).find('.checkBoxDel').prop('checked', true);
                        $('#example_filter').find('.delSelRow').removeClass('hidden');
                    });

                } else {
                    $('#example tbody tr').each(function (k, v) {
                        $(this).find('.checkBoxDel').prop('checked', false);
                        $('#example_filter').find('.delSelRow').addClass('hidden');
                    });
                }
            });


            $('#example ').on('click', 'tr .checkBoxDel', function () {

                $('#example_filter').find('.delSelRow').removeClass('hidden');
                var t = 0;
                $('#example tbody tr').each(function (k, v) {
                    if ($(this).find('.checkBoxDel').is(':checked')) {
                        t = t + 1;
                    }
                });

                if (t == 0) {
                    $('#example_filter').find('.delSelRow').addClass('hidden');
                }

            });

            $('.deleteSelect').on('click', function () {


                var thisRowToDelArr = [];
                var id_hidden = [];
                $('#example tbody tr').each(function (k, v) {
                    if ($(this).find('.checkBoxDel').is(':checked')) {
                        thisRowToDelArr.push($(this));
                        id_hidden.push($(this).find('.idHidden').val());
                    }
                });

                var r = confirm("Are you sure!");
                if (r == true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('deleteSelActivity')}}",
                        method: "get",
                        data: {id_hidden: id_hidden},
                        success: function (e) {
                            alert("done");
                            for (var i = 0; i < thisRowToDelArr.length; i++) {
                                table
                                    .row(thisRowToDelArr[i])
                                    .remove()
                                    .draw();
                            }
                            $('.checkBoxDelThead').prop('checked', false);
                            $('#example_filter').find('.delSelRow').addClass('hidden');

                        }

                    });
                }


            });
        });
    </script>
@endsection