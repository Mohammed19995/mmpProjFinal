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

    </style>

@endsection
<?php

use App\Http\Controllers\FatawiCon;
?>

@section('content')
    <header class="page-header" style="margin-bottom: 10px">
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
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" style="margin-left: 10px" class="close"
                            data-dismiss="modal">&times;
                    </button>
                    <h3 style="margin-right: 30% ; margin-top: 40px"><span class="fa fa-edit"></span> Add Answer <span
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
                                <input type="hidden" id="m_email">
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

                                <select class="form-control  " id="m_category">

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
                                    style=" font-size: 15px ; padding-left :15px ;margin-top: 7px"> Privacy </h3>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group ">

                                <input disabled type="text" name="mufti" id="m_privacy" class="form-control ">


                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ; padding-left :15px ;margin-top: 7px"> Created at </h3>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group ">

                                <input disabled type="text" name="created" id="m_created" class="form-control ">


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
                            <h3 class="h4">View Fawa Not Answer</h3>
                        </div>

                        <div class="card-body">

                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="hidden"></th>
                                    <th>Qustion</th>
                                    <th>Category name</th>
                                    <th>Privacy</th>
                                    <th>Show</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th class="hidden"></th>
                                    <th>Qustion</th>
                                    <th>Category name</th>
                                    <th>Privacy</th>
                                    <th>Show</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                foreach ($allNotA as $arr){?>
                                <tr class="aa">

                                    <td class="hidden">
                                        <span class="id_hidden "><?php echo $arr->id ?></span>

                                        <span class="created"><?php  echo $arr->created_at ?></span>
                                        <span class="email hidden"><?php
                                            $userName = FatawiCon::getUserName($arr->user_id);
                                            echo $userName['email'];
                                            ?></span>
                                    </td>
                                    <td class="question"><?php  echo $arr->question ?></td>
                                    <td class="category"><span class="id_cat hidden"><?php echo $arr->cat_id ?></span>
                                        <?php

                                        $catName = FatawiCon::getNameCat($arr->cat_id);
                                        echo $catName->name;

                                        ?></td>
                                    <td class="privacy"><?php
                                        $privacyName = FatawiCon::getPrivacy($arr->private);
                                        echo $privacyName->name;
                                        ?></td>


                                    <td><input type="button" value="Add Answer " class="btn btn-success show"></td>
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

    <script>
        $(document).ready(function () {
            $('.success').addClass('hidden');
            var table = $('#example').DataTable({

                "scrollX": true,
                "aoColumnDefs": [
                    {"bSearchable": false, "aTargets": [0]}
                ]
            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

            var thisRow;
            $('.show').click(function () {

                $("#myModal2").modal();
                var question = $(this).parent().parent().find('.question').text();
                var answer = $(this).parent().parent().find('.answer').text();
                var mufti = $(this).parent().parent().find('.mufti').text();
                var category = $(this).parent().parent().find('.category').text();
                var privacy = $(this).parent().parent().find('.privacy').text();
                var created = $(this).parent().parent().find('.created').text();
                var id_cat = $(this).parent().parent().find('.id_cat').text();
                var id_hidden = $(this).parent().parent().find('.id_hidden').text();
                var email = $(this).parent().parent().find('.email').text();
                $(".print-error-msg").hide();

                $('#m_question').val(question);
                $('#m_answer').val(answer);
                $('#m_mufti').val(mufti);

                $('#m_privacy').val(privacy);
                $('#m_category option')
                    .filter(function (index) {
                        return $(this).val() === id_cat;
                    })
                    .prop('selected', true);
                $('#m_id_hide').val(id_hidden);
                $('#m_created').val(created);
                $('#m_email').val(email);
                thisRow = $(this).parent().parent();
            });

            $('.save').click(function () {
                var e_question = $('#m_question').val();
                var e_answer = $('#m_answer').val();
                var e_mufti = $('#m_mufti').val();
                var e_cat = $('select#m_category option:selected').val();
                var e_id_hidden = $('#m_id_hide').val();
                var e_email =$('#m_email').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('editAnswer')}}",
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
                            thisRow.hide('slow');
                            // $("#myModal2").modal('hide');
                            $('.success').removeClass('hidden');
                            $('.success').show('slow');
                            setTimeout(function () {
                                $(".success").hide('slow');
                            }, 1000);
                            setTimeout(function () {
                                $('#myModal2').modal('hide');
                            }, 2000);

                            $(".print-error-msg").hide();
                        } else {
                            printErrorMsg(e.error);
                        }

                    }


                });

                $.ajax({
                    url: "{{url('mail')}}",
                    method: "get",
                    data: {

                        e_question: e_question,
                        e_answer: e_answer,
                        e_mufti: e_mufti,
                        e_email:e_email,
                        e_id_hidden:e_id_hidden

                    },
                    success: function (e) {
                      alert(e)

                    }


                });

            });
        });


    </script>
@endsection