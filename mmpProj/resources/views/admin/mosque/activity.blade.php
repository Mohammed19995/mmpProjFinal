@extends('admin.app')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/dataTable/css/dataTable.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
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

                                            <input id="getMosque" name="getMosque" list="mosques" class="form-control"
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
                                    <div class="form-group row">

                                        <label class="col-sm-2 form-control-label ">Content</label>
                                        <div class="col-sm-9">
                                            <textarea name="activityName"
                                                      style="width: 100%;height: 100px;">{{old('activityName')}}</textarea>
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
                                        <th>Title</th>
                                        <th>Mosque</th>
                                        <th>Content</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
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

                                        <td class="name"><?php echo $a->title;?></td>
                                        <td class="editionBook"><?php echo $mosqueName;?></td>
                                        <td class="catBook"><?php echo $a->content;?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> edit
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

    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({

                "scrollX": true,
                dom: 'Bfrtip',
                language: {search: ""},
                buttons: [],
                // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "pageLength": 10,
                initComplete: function () {
                    this.api().columns(1).every(function () {
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


            $('#getMosque').on('input', function () {
                var selectedOption = $('option.dataList[value="' + $(this).val() + '"]');
                if (selectedOption.length) {
                    $('#mosqueId').val(selectedOption.attr('id'));
                } else {
                    $('#mosqueId').val('');
                }
            });

        });
    </script>
@endsection