@extends('admin.app')
@section('css')
    <style>
        section {
            padding: 0px;
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

        .hand {
            cursor: pointer;
        }

        .hidden {
            display: none;
        }


    </style>
@endsection
@section('content')
    <header class="page-header" style="margin-bottom: 50px">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Category</h2>
        </div>
    </header>
    <div class="content-inner">

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content ">
                    <div class="modal-header ">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 style="margin-right: 40%"><span class="fa fa-edit"></span> Update <span
                                    style="padding-left:10px; " id="m_title"></span><span
                                    class="nameProdModel"></span></h3>
                    </div>
                    <div class="modal-body">


                        <div class="alert alert-danger print-error-msg" style="display:none; margin: 10px;">
                            <ul></ul>
                        </div>

                        <div class="row">
                            <div class="col-sm-4" style="padding-right: 30px"><h3
                                        style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Name </h3></div>

                            <div class="col-sm-8">
                                <div class="form-group ">
                                    <input type="text" class="form-control" id="m_name">
                                    <input type="hidden" id="m_id_hide">
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                    class="fa fa-remove"></span> Cancel
                        </button>
                        <button type="submit" class="btn btn-success btn-default pull-left saveCat"><span
                                    class=" fa fa-save"></span> save
                        </button>

                    </div>
                </div>

            </div>
        </div>

        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2"></div>

                    <div class="col-sm-10">
                        <div class="card">

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Add Category</h3>
                            </div>

                            <div class="card-body">

                                @if(session('success'))
                                    <div class="alert alert-success">{{session('success')}}</div>
                                @endif

                                @if($errors->has('categoryName'))

                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <form method="post" action="{{url('addCategory')}}" class="form-inline"
                                      style="margin-left: 50px">
                                    {{ csrf_field() }}
                                    <div class="form-group">

                                        <input id="inlineFormInput" type="text" name="categoryName"
                                               placeholder="Enter your category"
                                               class="mx-sm-3 form-control">
                                    </div>

                                    <div class="form-group">

                                        <button type="submit" class="mx-sm-3 btn btn-primary"><i class="fa fa-plus"></i>
                                            Add Category
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- Page Footer-->


        <section class="tables">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="card">

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Category</h3>

                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($allCat as $i=>$p) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $i + 1;?></th>
                                        <input type="hidden" class="id_hidden" value="<?php echo $p->id;?>">
                                        <td class="CatName"><?php echo $p->name;?></td>
                                        <td>
                                            <button class="btn btn-success btn-sm editCat"><i class="fa fa-edit"></i>
                                                Edit
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm removeCat"><i class="fa fa-remove"></i>
                                                Delete
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


                </div>
            </div>
        </section>

    </div>
@endsection


@section('script')

    <script>
        $(document).ready(function () {

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

            var id_hidden;
            var catName;
            $('.editCat').click(function () {
                $(".print-error-msg").hide();
                $('#myModal').modal();
                id_hidden = $(this).parents('tr').find('.id_hidden').val();
                catName = $(this).parents('tr').find('.CatName');

                $('#m_name').val(catName.text());
                $('#m_title').text(catName);
            });
            $('.saveCat').click(function () {

                var m_name = $('#m_name').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('editCat')}}",
                    method: "get",
                    data: {id_hidden: id_hidden, m_name: m_name},
                    success: function (e) {
                        if ($.isEmptyObject(e.error)) {
                            alert(e.success);
                            catName.text(m_name);
                            $(".print-error-msg").hide();
                        } else {
                            printErrorMsg(e.error);
                        }
                    }

                });
            });
            $('.removeCat').click(function () {
                var id_hiddenToDel = $(this).parents('tr').find('.id_hidden').val();
                var this_row = $(this).parents('tr');
                var r = confirm("Are you sure");
                if (r == true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('delCat')}}",
                        method: "get",
                        data: {id_hiddenToDel: id_hiddenToDel},
                        success: function (e) {
                            alert(e);
                            this_row.hide('slow');
                        }

                    });
                } else {

                }

            });

        });
    </script>
@endsection