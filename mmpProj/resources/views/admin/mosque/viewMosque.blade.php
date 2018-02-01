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
            <h2 class="no-margin-bottom">View Book</h2>
        </div>
    </header>

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

                    <div class="alert alert-success hidden successMsg"> the updating is done.</div>


                    <input type="hidden" id="id_hidden">

                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Name </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input type="text" class="form-control" id="m_name">

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Emam Name </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input type="text" class="form-control" id="m_emammName">

                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Email </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input type="text" class="form-control" id="m_email">

                            </div>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Phone </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input type="text" class="form-control" id="m_phone">


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
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                            <label class="custom-control custom-checkbox hand">
                                <input type="checkbox" id="friday_prayer" name="friday_prayer"
                                       class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <h5 style="margin: 3px;font-size: 15px;">Friday prayer</h5>
                            </label>

                        </div>
                        <div class="col-sm-5">
                            <label class="custom-control custom-checkbox hand">
                                <input type="checkbox" id="woman_chapel" name="woman_chapel"
                                       class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <h5 style="margin: 3px;font-size: 15px;">Woman chapel</h5>
                            </label>
                        </div>
                        <div class="col-sm-1"></div>


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
                            <h3 class="h4">View Books</h3>
                        </div>

                        <div class="card-body">

                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>

                                    <th></th>
                                    <th>Image</th>
                                    <th>Mosque name</th>
                                    <th>Imam Name</th>
                                    <th>contact information</th>
                                    <th>Mosque information</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th>Book name</th>
                                    <th>Edition</th>
                                    <th>Category</th>
                                    <th>publish</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                <?php foreach ($allMosque as $p) {

                                $imgPath = str_replace("public/", "", $p->image);

                                ?>
                                <tr>

                                    <input type="hidden" class="mosqueId" value="<?php echo $p->id;?>">


                                    <td class="plusData" data-placement="left" data-toggle="tooltip" href="#"
                                        data-original-title="more details">
                                        <form method="get" action="{{url('adminApp/mosque/getUpdatLocation'."/".$p->id)}}" class="form-inline">
                                            <button type="submit" class=" btn btn-primary">
                                                <i class="fa fa-map-marker fa-1x"></i>
                                            </button>

                                        </form>
                                     </td>

                                    <td class="imgMosque"><img width="50" height="50"
                                                               src="{{asset('storage/'.$imgPath)}}"></td>
                                    <td class="nameMosque"><?php echo $p->name;?></td>
                                    <td class="emamName"><?php echo $p->imam_name;?></td>
                                    <td>
                                        <div><span class=" email fa  fa-envelope-open"> <?php echo $p->email;?> </span>
                                        </div>
                                        <div><span class="phone fa fa-phone"> <?php echo $p->phone;?> </span></div>
                                    </td>
                                    <td>
                                        <div class="friday_prayer2"  >
                                            <span class="hidden friday_prayer"> <?php echo $p->friday_prayer;?> </span>
                                            <?php
                                            if ($p->friday_prayer == 1) {
                                                echo "Friday pray : yes";
                                            } else {
                                                echo "Friday pray : No";
                                            }

                                            ;?></div>
                                        <div class="woman_chapel2">
                                            <span class="hidden woman_chapel"> <?php echo $p->woman_chapel;?> </span>
                                            <?php
                                            if ($p->woman_chapel == 1) {
                                                echo "Woman Chapel : yes";
                                            } else {
                                                echo "Woman Chapel : No";
                                            }

                                            ?></div>
                                    </td>
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


                var nameMosque = $(this).parents('tr').find('.nameMosque').text();
                var emamName = $(this).parents('tr').find('.emamName').text();
                var email = $(this).parents('tr').find('.email').text();
                var phone = $(this).parents('tr').find('.phone').text();
                var friday_prayer = $(this).parents('tr').find('.friday_prayer').text();
                var woman_chapel = $(this).parents('tr').find('.woman_chapel').text();


                $('#m_title').text(nameMosque);
                $('#id_hidden').val($(this).parents('tr').find('.mosqueId').val());
                $('#m_name').val(nameMosque);
                $('#m_emammName').val(emamName);
                $('#m_email').val(email);
                $('#m_phone').val(phone);
                     if(friday_prayer == 1){
                    $('#friday_prayer').attr('checked', true)
                }else {
                    $('#friday_prayer').attr('checked', false)
                }

                if(woman_chapel == 1){
                    $('#woman_chapel').attr('checked', true)
                }else {
                    $('#woman_chapel').attr('checked', false)
                }



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
                var friday_prayer = 0;
                var woman_chapel = 0;

                if ($('#friday_prayer').is(':checked')) {
                    friday_prayer = 1;
                }
                if ($('#woman_chapel').is(':checked')) {
                    woman_chapel = 1;
                }

                form_data.append('IdMosque', $('#id_hidden').val());
                form_data.append('nameMosque', $('#m_name').val());
                form_data.append('nameImam', $('#m_emammName').val());
                form_data.append('email', $('#m_email').val());
                form_data.append('phone', $('#m_phone').val());
                form_data.append('friday_prayer', friday_prayer);
                form_data.append('woman_chapel',woman_chapel);
                form_data.append('file', fileImge);
                form_data.append('checkImgBook', checkImgBook);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: '{{url('editMosque')}}',
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

                                thisRow.find('.imgMosque img').attr('src', link + "/" + res);

                            }
                            thisRow.find('.nameMosque').text($('#m_name').val());
                            thisRow.find('.emamName').text($('#m_emammName').val());
                            thisRow.find('.email').text($('#m_email').val());
                            thisRow.find('.phone').text($('#m_phone').val());
                            if($('#friday_prayer').is(':checked')){
                                thisRow.find('.friday_prayer2').text("Friday pray : yes");
                            }else {
                                thisRow.find('.friday_prayer2').text("Friday pray : No");
                            }
                            if($('#woman_chapel').is(':checked')){
                                thisRow.find('.woman_chapel2').text("Woman Chapel : yes");
                            }else {
                                thisRow.find('.woman_chapel2').text("Woman Chapel : No");
                            }




                        }else {
                            printErrorMsg(jsonVar.error);
                        }
                    }
                });




            });

            $('#example tbody').on('click', 'tr .delete', function () {
                var thisRowToDel = $(this).parents('tr');
                var idMosque = $(this).parents('tr').find('.mosqueId').val();

                var r = confirm("Are you sure!");
                if (r == true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('deleteMosque')}}",
                        method: "get",
                        data: {idMosque: idMosque},
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