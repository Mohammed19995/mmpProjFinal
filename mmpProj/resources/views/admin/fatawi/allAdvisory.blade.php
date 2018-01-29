@extends('admin.app')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/dataTable/css/dataTable.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }

        a.dt-button {
            background-image: linear-gradient(to bottom, #fff 0%, rgba(173, 194, 253, 0.82) 100%);
            border: none;
            padding: 0;
        }

        .hidden {
            display: none;
        }

        .fa-plus:hover, .fa-minus:hover {
            cursor: pointer;
        }

        #example_wrapper .dt-buttons {
            margin-top: 40px;
        }

        #example_filter label {
            display: block;
            margin-top: 20px;
        }

        .card-body {
            padding-top: 0px;
        }


    </style>

@endsection
<?php

use App\Http\Controllers\FatawiCon;
?>

@section('content')
    <header class="page-header" style="margin-bottom: 20px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"><h2 class="no-margin-bottom">View Fatwa</h2></div>
                <div class="col-sm-5"></div>

                <div class="col-sm-3">
                    <input type="submit" class="btn btn-info" value="visit Fatwa user"
                           onclick="window.location='{{asset('mmpApp/advisory')}}';"/>
                </div>

            </div>
        </div>
    </header>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" style=" margin-left: 10px" class="close"
                            data-dismiss="modal">&times;
                    </button>
                    <h3 style="margin-right: 30% ; margin-top: 40px"><span class="fa fa-edit"></span> Update
                        Qustion<span
                                class="nameProdModel"></span></h3>
                </div>
                <div class="modal-body">

                    <div class="row" style="margin-left: 30% ; margin-top: 10px">
                        <div class="alert alert-success success hidden">The Added is done</div>
                    </div>

                    <div class="row">
                        <div class="alert alert-danger print-error-msg" style="display:none; margin-left: 120px ">
                            <ul></ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Question </h3></div>

                        <div class="col-sm-8">
                            <div class="form-group ">

                                <textarea class="form-control question" id="m_question"></textarea>
                                <input type="hidden" id="m_id_hide">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Answer </h3></div>

                        <div class="col-sm-8">
                            <div class="form-group ">

                                <textarea class="form-control question" id="m_answer"></textarea>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ; padding-left :15px ;margin-top: 7px"> Mufti Name </h3>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group ">
                                <input type="text" name="mufti" id="m_mufti" class="form-control ">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ; padding-left :15px ;margin-top: 7px"> Category </h3>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group ">

                                <select class="form-control  " id="m_category2">

                                    <?php
                                    foreach ($allCat as $arr){
                                    ?>
                                    <option value="<?php echo $arr->id; ?>"><?php echo $arr->name; ?></option>
                                    <?php    }
                                    ?>
                                </select>


                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ; padding-left :15px ;margin-top: 7px"> User name </h3>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group ">

                                <input disabled type="text" name="user" id="m_user" class="form-control ">


                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ; padding-left :15px ;margin-top: 7px"> Privacy </h3>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group ">


                                <input disabled type="text" name="privacy" id="m_privacy" class="form-control ">


                            </div>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                class="fa fa-remove"></span> Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-default pull-left save"><span
                                class=" fa fa-save"></span> save
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
                            <h3 class="h4">View Fatwa Answer</h3>
                        </div>

                        <div class="card-body">


                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th hidden></th>
                                    <th>Qustion</th>
                                    <th>Answer</th>
                                    <th>Category</th>
                                    <th>Mufti</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th hidden></th>
                                    <th>Qustion</th>
                                    <th>Answer</th>
                                    <th>Category</th>
                                    <th>Mufti</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                foreach ($allAdvisory as $arr){
                                $catName = FatawiCon::getNameCat($arr->cat_id);
                                ?>
                                <tr class="rr">
                                    <td class="hidden">
                                        <span class="id_cat hidden"><?php echo $arr->cat_id ?></span>
                                        <span class="id_hidden hidden"><?php echo $arr->id ?></span>
                                        <span class="id_user hidden"><?php
                                            $userName = FatawiCon::getUserName($arr->user_id);
                                            echo $userName['name'];
                                            ?></span>
                                        <span class="privacy hidden"><?php $privacyName = FatawiCon::getPrivacy($arr->private);
                                            echo $privacyName['name'];
                                            ?> </span>
                                        <span class="created_at hidden"><?php echo $arr->created_at ?></span>
                                    </td>
                                    <td class="question"><?php  echo $arr->question ?></td>
                                    <td class="answer"><?php  echo $arr->answer ?></td>
                                    <td class="category">
                                        <?php echo $catName->name;?></td>


                                    <td class="mufti"><?php  echo $arr->mufti ?></td>

                                    <td>
                                        <button class="btn btn-primary edit" data-toggle="modal"
                                                data-target="#exampleModal"><i
                                                    class="fa fa-edit"> Detail & Edit</i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger delete"><i
                                                    class="fa fa-remove"> Delete</i></button>

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

            function filterColumn(i) {
                $('#example').DataTable().column(i).search(
                    $('#col' + i + '_filter').val()
                ).draw();
            }

            function filterGlobal() {
                $('#example').DataTable().search(
                    $('#global_filter').val()
                ).draw();
            }

            $('.success').addClass('hidden');
            var table = $('#example').DataTable({

                "scrollX": true,
                language: {search: ""},
                dom: 'Bfrtip',

                buttons: [{

                    extend: 'pdfHtml5',
                    exportOptions: {
                        rows: ':visible',
                        columns: ':visible'

                    },

                }],


                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                initComplete: function () {
                    this.api().columns(3).every(function () {
                        var column = this;
                        var select = $('<select class="form-control selCatOption" style="width: 260px; margin-left:20px;float: right;"><option value="">select category</option></select>')
                            .prependTo($('#example_filter'))
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });


                        $('#myModal #m_category2 option').each(function (d, j) {
                            var selVal = $(this).val();
                            var selText = $(this).text();
                            select.append('<option value="' + selText + '">' + selText + '</option>')
                        });
                    });

                }


            });

            $('#example_filter').append('' +
                '<div class="row"  style="margin-bottom: 10px; margin-top: 10px;" >' +
                '<div class="col-sm-12"  id="filter_global">' +
                ' <input type="text"placeholder="Search by All" class="global_filter form-control" id="global_filter">' +
                ' </div>' +
                ' </div>' +
                '<div class="row">' +
                '<div class="col-sm-4 tr" id="filter_col2" data-column="1">' +
                '<input type="text" placeholder="Search by Question"' +
                'class="column_filter form-control "   id="col1_filter">' +
                '</div>' +
                '  <div class="col-sm-4 tr" id="filter_col2" data-column="2">' +
                '<input type="text" placeholder="Search by Answer"' +
                'class="column_filter form-control " id="col2_filter">' +
                '</div>' +
                '<div class="col-sm-4 tr" id="filter_col2" data-column="4">' +
                '<input type="text" placeholder="Search by Mufti"' +
                'class="column_filter form-control " id="col4_filter">' +
                ' </div>' +
                ' </div>' +

                ''
            );
            $('input.column_filter').on('keyup click', function () {
                filterColumn($(this).parents('.tr').attr('data-column'));
            });
            $('input.global_filter').on('keyup click', function () {
                filterGlobal();
            });

            $('a.dt-button').text('');
            $('a.buttons-pdf').append("<img src='{{asset('icons/library/pdf.ico')}}' style= height='30' width='30' />");

            $('#example_filter').find('label input').hide();


            $('#example_filter').append('<div class="container">' +
                '<div class="row visibleCol">' +

                '<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0" style="margin-right: 5px;">' +
                '<input type="checkbox" checked class="custom-control-input">' +
                '<span class="custom-control-indicator"></span>' +
                '<span class="custom-control-description colName" >Question</span>' +
                '</label>' +

                '<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0" style="margin-left: 10px;">' +
                '<input type="checkbox" checked class="custom-control-input">' +
                '<span class="custom-control-indicator"></span>' +
                '<span class="custom-control-description colName">Answer</span>' +
                '</label>' +

                '<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0"  style="margin-left: 10px;">' +
                '<input type="checkbox" checked class="custom-control-input">' +
                '<span class="custom-control-indicator"></span>' +
                '<span class="custom-control-description colName">category</span>' +
                '</label>' +

                '<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0"  style="margin-left: 10px;">' +
                '<input type="checkbox" checked class="custom-control-input">' +
                '<span class="custom-control-indicator"></span>' +
                '<span class="custom-control-description colName">Mufti</span>' +
                '</label>' +

                '</div>' +
                '</div>' +
                '');


            $('#example_filter').on('change', '.visibleCol label:nth-child(1)', function () {
                if ($(this).find('input').is(':checked')) {
                    var column = table.column(1);
                    column.visible(!column.visible());
                } else {
                    var column = table.column(1);
                    column.visible(!column.visible());
                }
            });
            $('#example_filter').on('change', '.visibleCol label:nth-child(2)', function () {
                if ($(this).find('input').is(':checked')) {
                    var column = table.column(2);
                    column.visible(!column.visible());
                } else {
                    var column = table.column(2);
                    column.visible(!column.visible());
                }
            });
            $('#example_filter').on('change', '.visibleCol label:nth-child(3)', function () {
                if ($(this).find('input').is(':checked')) {
                    var column = table.column(3);
                    column.visible(!column.visible());
                } else {
                    var column = table.column(3);
                    column.visible(!column.visible());
                }
            });
            $('#example_filter').on('change', '.visibleCol label:nth-child(4)', function () {
                if ($(this).find('input').is(':checked')) {
                    var column = table.column(4);
                    column.visible(!column.visible());
                } else {
                    var column = table.column(4);
                    column.visible(!column.visible());
                }
            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }


            var thisRow;
            var question2;
            var e_answer;
            var mufti2;
            var category2;
            $('#example tbody').on('click', 'tr .edit', function () {
                $(".print-error-msg").hide();
                $("#myModal").modal();
                var question = $(this).parent().parent().find('.question').text();
                var answer = $(this).parent().parent().find('.answer').text();
                var mufti = $(this).parent().parent().find('.mufti').text();
                var category = $(this).parent().parent().find('.category').text();
                var privacy = $(this).parent().parent().find('.privacy').text();
                var id_cat = $(this).parent().parent().find('.id_cat').text();
                var id_user = $(this).parent().parent().find('.id_user').text();
                var id_hidden = $(this).parent().parent().find('.id_hidden').text();

                question2 = $(this).parent().parent().find('.question');
                answer2 = $(this).parent().parent().find('.answer');
                mufti2 = $(this).parent().parent().find('.mufti');
                category2 = $(this).parent().parent().find('.category');


                $('#m_question').val(question);
                $('#m_answer').val(answer);
                $('#m_mufti').val(mufti);
                $('#m_user').val(id_user);
                $('#m_privacy').val(privacy);
                $('#m_category2 option')
                    .filter(function (index) {
                        return $(this).val() === id_cat;
                    })
                    .prop('selected', true);
                $('#m_id_hide').val(id_hidden);
                thisRow = $(this).parent().parent();
            });
            $('.save').click(function () {
                var e_question = $('#m_question').val();
                var e_answer = $('#m_answer').val();
                var e_mufti = $('#m_mufti').val();
                var e_cat = $('select#m_category2 option:selected').val();
                var e_cat2 = $('select#m_category2 option:selected').text();
                var e_id_hidden = $('#m_id_hide').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('editAdvisory')}}",
                    method: "get",
                    data: {
                        e_id_hidden: e_id_hidden,
                        e_question: e_question,
                        e_answer: e_answer,
                        e_mufti: e_mufti,
                        e_cat: e_cat
                    },
                    success: function (e) {
                        if ($.isEmptyObject(e.error)) {
                            alert(e.success);
                            question2.text(e_question);
                            mufti2.text(e_mufti);
                            answer2.text(e_answer);
                            category2.text(e_cat2);
                            //   $("#myModal").modal('hide');
                            $('.success').removeClass('hidden');
                            $('.success').show('slow');
                            setTimeout(function () {
                                $(".success").hide('slow');
                            }, 1000);
                            setTimeout(function () {
                                $('#myModal').modal('hide');
                            }, 2000);
                            $(".print-error-msg").hide();
                        } else {
                            printErrorMsg(e.error);
                        }

                    }


                });

            });

            $('#example tbody').on('click', 'tr .delete', function () {


                var id_hide = $(this).parent().parent().find('.id_hidden').text();
                var thisRow = $(this).parent().parent();

                var r = confirm("Are you sure to delete Fatwa...?");
                if (r == true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('delAdvisory')}}",
                        method: "get",
                        data: {
                            id_hide: id_hide

                        },
                        success: function (e) {
                            thisRow.hide('slow');
                        }
                    });

                } else {

                    alert("The Fatwa not deleted")
                }

            });
        });


    </script>
@endsection