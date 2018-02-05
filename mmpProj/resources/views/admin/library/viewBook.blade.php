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

                        <div class="col-sm-4">
                            <div class="form-group ">
                                <input type="text" class="form-control" id="m_name">

                            </div>

                        </div>

                        <div class="col-sm-2" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Edition </h3></div>

                        <div class="col-sm-3">
                            <div class="form-group ">
                                <input type="number" min="0" class="form-control" id="m_edition">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Category </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <select id="selCat" class="form-control">
                                    <?php
                                    foreach ($allCat as $c) {
                                    ?>
                                    <option value="<?php echo $c->id;?>"><?php echo $c->name;?></option>
                                    <?php }

                                    ?>

                                </select>

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Summary </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <textarea class="form-control" id="m_summary"></textarea>

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> publish </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input type="date" class="form-control" id="m_publish">
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
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Author </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input id="m_author" type="text"
                                       data-role="tagsinput"/>

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Keyword </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input id="m_keyword" type="text"
                                       data-role="tagsinput"/>

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="padding-right: 30px"><h3
                                    style=" font-size: 15px ;padding-left :15px;margin-top: 7px"> Outline </h3></div>

                        <div class="col-sm-9">
                            <div class="form-group ">
                                <input id="m_outline" type="text"
                                       data-role="tagsinput"/>

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
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <input type="hidden" value="" class="fileBookIdIncHidden">
            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 style="margin-right: 40%"><span class="fa fa-edit"></span> Update <span
                                style="padding-left:10px; " id="m_title"></span><span
                                class="nameProdModel"></span></h3>
                </div>

                <div class="modal-body getAllTypeLangBook">


                </div>

                <div class=" text-center">

                    <h3 style="margin-bottom: 20px"><span class="fa fa-plus"></span> Add New </h3>
                    <div class="alert alert-danger hidden checkError"></div>

                    <div class="alert alert-danger print-error-msg2" style="display:none; margin: 10px;">
                        <ul></ul>
                    </div>

                    <form method="post" enctype="multipart/form-data">
                        <div class="container addNewLang">

                            <div class="form-group row imm">

                                <div class="col-sm-3 ">
                                    <select class="form-control selFileLang">
                                        <?php foreach ($getAllLang as $p) {
                                        ?>
                                        <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>

                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-3 ">
                                    <select class="form-control selTypeFile">
                                        <?php foreach ($getAllType as $p) {
                                        ?>
                                        <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>

                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <input type="file"
                                           class="form-control fileLangType"
                                           placeholder="upload your img..">

                                </div>

                                <div class="col-sm-2">
                                    <button type='button' class="btn btn-success add-fileBook"><i
                                                class="fa fa-plus"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                class="fa fa-remove"></span> Cancel
                    </button>
                    <button class="btn btn-primary hand addNewBookFile">
                        <i class="fa fa-spinner fa-spin loaddingAddNewPlusFile hidden" style="font-size:24px"></i>
                        add new
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
                                    <th><input type="checkbox" class="hand checkBoxDelThead" value="all" style="height: 17px;width: 17px;"></th>
                                    <th>Image</th>
                                    <th>Book name</th>
                                    <th>Edition</th>
                                    <th>Category</th>
                                    <th>Add date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
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

                                <?php foreach ($getAllBook as $p) {

                                $imgPath = str_replace("public/", "", $p->img);

                                $authors = LibraryCon::getAuthorBook($p->id);
                                $keywords = LibraryCon::getKeywordBook($p->id);
                                $outlines = LibraryCon::getOutlineBook($p->id);

                                foreach ($allCat as $cat) {
                                    if ($cat->id == $p->cat_id) {
                                        $catName = $cat->name;
                                    }
                                }
                                ?>
                                <tr>

                                    <input type="hidden" class="bookId" value="<?php echo $p->id;?>">
                                    <input type="hidden" class="img" value="<?php echo $p->img;?>">
                                    <input type="hidden" class="summaryBook" value="<?php echo $p->summary;?>">
                                    <input type="hidden" class="catId" value="<?php echo $p->cat_id;?>">
                                    <input type="hidden" class="publish" value="<?php echo $p->publish->format('Y-m-d');?>">

                                    <td class="plusData" data-placement="left" data-toggle="tooltip" href="#" data-original-title="more details">
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-spinner fa-spin hidden" style="font-size:24px"></i>
                                    </td>
                                    <td><input type="checkbox" class="hand checkBoxDel" style="width: 100%;height: 17px;"></td>
                                    <td class="imgBook"><img width="50" height="50"
                                                             src="{{asset('storage/'.$imgPath)}}"></td>
                                    <td class="nameBook"><?php echo $p->name;?></td>
                                    <td class="editionBook"><?php echo $p->edition;?></td>
                                    <td class="catBook"><?php echo $catName;?></td>
                                    <td class="publishBook"><?php echo $p->created_at;?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> edit
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete"><i class="fa fa-remove"></i> delete
                                        </button>
                                    </td>

                                    <input class="authorBook" type="hidden"
                                           value="<?php foreach ($authors as $au) {
                                               echo $au->author . ",";
                                           } ?>"/>

                                    <input class="keywordBook" type="hidden"
                                           value="<?php foreach ($keywords as $a) {
                                               echo $a->word . ",";
                                           } ?>"/>

                                    <input class="outlineBook" type="hidden"
                                           value="<?php foreach ($outlines as $a) {
                                               echo $a->outline . ",";
                                           } ?>"/>


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

            function printErrorMsg2(msg) {


                $(".print-error-msg2").find("ul").html('');
                $(".print-error-msg2").css('display', 'block');
                var arrErrors = [];
                $.each(msg, function (key, value) {
                    $(".print-error-msg2").find("ul").append('<li>' + value + '</li>');

                    /*
                    arrErrors.push(value.replace('file' + key, 'file'));
                    if (key != 0 && arrErrors[key] == arrErrors[key - 1]) {

                    } else {
                        $(".print-error-msg2").find("ul").append('<li>' + value.replace('file' + key, 'file') + '</li>');

                    }
                    */
                });
            }

            var table = $('#example').DataTable({

                "scrollX": true,
                dom: 'Bfrtip',
                language: {search: ""},

                buttons: [
                    'pdfHtml5'
                ],
                order: [],
                columnDefs: [ { orderable: false, targets: [1]}],
               // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "pageLength": 10,

                initComplete: function () {
                    this.api().columns(5).every(function () {
                        var column = this;
                        var select = $('<select class="form-control selCatOption" style="width: 200px;float: right;"><option value="">select category</option></select>')
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
                        $('#myModal #selCat option').each(function (d, j) {
                            var selVal = $(this).val();
                            var selText = $(this).text();
                            select.append('<option value="' + selText + '">' + selText + '</option>')
                        });
                    });

                }
            });


            $('a.dt-button').text('');
            $('a.buttons-pdf').append("<img src='{{asset('icons/library/pdf.ico')}}' style= height='30' width='30' />");
            $('a.buttons-csv').append("<img src='{{asset('icons/library/excel.ico')}}' style= height='30' width='30' />");
            $('a.buttons-copy').append("<img src='{{asset('icons/library/copy.ico')}}' style= height='30' width='30' />");




            $('#example_filter').find('label input').attr('placeholder', 'Search');

            $('#example_filter').append('<div class="container">' +
                '<div class="row visibleCol">' +

                '<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0" style="margin-right: 5px;">' +
                '<input type="checkbox" checked class="custom-control-input">' +
                '<span class="custom-control-indicator"></span>' +
                '<span class="custom-control-description colName" >name</span>' +
                '</label>' +

                '<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0" style="margin-left: 10px;">' +
                '<input type="checkbox" checked class="custom-control-input">' +
                '<span class="custom-control-indicator"></span>' +
                '<span class="custom-control-description colName">edition</span>' +
                '</label>' +

                '<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0"  style="margin-left: 10px;">' +
                '<input type="checkbox" checked class="custom-control-input">' +
                '<span class="custom-control-indicator"></span>' +
                '<span class="custom-control-description colName">category</span>' +
                '</label>' +

                '<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0"  style="margin-left: 10px;">' +
                '<input type="checkbox" checked class="custom-control-input">' +
                '<span class="custom-control-indicator"></span>' +
                '<span class="custom-control-description colName">date</span>' +
                '</label>' +

                '</div>' +
                '</div>' +
                '');


            $('#example_filter').append('<div class="row delSelRow hidden" style="margin-top: 5px;">' +
                '<div class="col-sm-2">' +
                '<button class="btn btn-danger btn-sm deleteSelect ">Delete selected <i class="fa fa-remove"></i></button>' +
                '</div>' +
                '<div class="col-sm-8"></div>' +
                '</div>');

            $('#example_filter').on('change', '.visibleCol label:nth-child(1)', function () {
                if ($(this).find('input').is(':checked')) {
                    var column = table.column(2);
                    column.visible(!column.visible());
                } else {
                    var column = table.column(2);
                    column.visible(!column.visible());
                }
            });
            $('#example_filter').on('change', '.visibleCol label:nth-child(2)', function () {
                if ($(this).find('input').is(':checked')) {
                    var column = table.column(3);
                    column.visible(!column.visible());
                } else {
                    var column = table.column(3);
                    column.visible(!column.visible());
                }
            });
            $('#example_filter').on('change', '.visibleCol label:nth-child(3)', function () {
                if ($(this).find('input').is(':checked')) {
                    var column = table.column(4);
                    column.visible(!column.visible());
                } else {
                    var column = table.column(4);
                    column.visible(!column.visible());
                }
            });
            $('#example_filter').on('change', '.visibleCol label:nth-child(4)', function () {
                if ($(this).find('input').is(':checked')) {
                    var column = table.column(5);
                    column.visible(!column.visible());
                } else {
                    var column = table.column(5);
                    column.visible(!column.visible());
                }
            });

            var thisRow;

            var cellNameBook;
            var cellEdition;
            var cellCatName;
            $('#example tbody').on('click', 'tr .edit', function () {
                thisRow = $(this).parents('tr');

                $('.successMsg').addClass('hidden');
                $(".print-error-msg").hide();

                $('#myModal').modal('show');

                cellNameBook = table.cell($(this).parents('tr').find('.nameBook'));
                cellEdition = table.cell($(this).parents('tr').find('.editionBook'));
                cellCatName = table.cell($(this).parents('tr').find('.catBook'));


                var nameBook = $(this).parents('tr').find('.nameBook').text();
                var editionBook = $(this).parents('tr').find('.editionBook').text();
                var catId = $(this).parents('tr').find('.catId').val();
                var publish = $(this).parents('tr').find('.publish').val();
                var summary = $(this).parents('tr').find('.summaryBook').val();

                $('#m_title').text(nameBook);
                $('#id_hidden').val($(this).parents('tr').find('.bookId').val());
                $('#m_name').val(nameBook);
                $('#m_edition').val(editionBook);
                $('#m_publish').val(publish);
                $('#m_summary').val(summary);


                $('#selCat option')
                    .filter(function (index) {
                        return $(this).val() === catId;
                    })
                    .prop('selected', true);

                var author = $(this).parents('tr').find('.authorBook').val();
                $('#m_author').tagsinput('removeAll');
                $('#m_author').tagsinput('add', author);

                var keyword = $(this).parents('tr').find('.keywordBook').val();
                $('#m_keyword').tagsinput('removeAll');
                $('#m_keyword').tagsinput('add', keyword);

                var outline = $(this).parents('tr').find('.outlineBook').val();
                $('#m_outline').tagsinput('removeAll');
                $('#m_outline').tagsinput('add', outline);


            });

            $('#myModal .save').on('click', function () {

                var thisSave = $(this);
                var id_hidden = $('#id_hidden').val();
                var cat_id = $('select#selCat option:selected').val();
                var cat_name = $('select#selCat option:selected').text();

                //  var file_data = $('#file_to_upload').prop('files')[0];

                var form_data = new FormData();

                var checkImgBook = 1;
                var bookImg = $('#m_img').prop('files')[0];

                if (bookImg == null) {
                    checkImgBook = 0;
                }
                form_data.append('IdBook', $('#id_hidden').val());
                form_data.append('nameBook', $('#m_name').val());
                form_data.append('editionBook', $('#m_edition').val());
                form_data.append('cat_id', cat_id);
                form_data.append('publish', $('#m_publish').val());
                form_data.append('summaryBook', $('#m_summary').val());
                form_data.append('author', $('#m_author').val());
                form_data.append('keyword', $('#m_keyword').val());
                form_data.append('outline', $('#m_outline').val());
                form_data.append('file', bookImg);
                form_data.append('checkImgBook', checkImgBook);

                thisSave.find('.loadingUpdate').removeClass('hidden');
                thisSave.find('.saveIcon').addClass('hidden');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });

                $.ajax({
                    url: '{{url('editBook')}}',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (e) {
                        var jsonVar = $.parseJSON(e);
                        $('.loadingUpdate').addClass('hidden');
                        if (jsonVar.success == 1) {
                            $('.successMsg').removeClass('hidden');
                            $(".print-error-msg").hide();


                            // thisRow.find('.nameBook').text($('#m_name').val());
                            //  thisRow.find('.editionBook').text($('#m_edition').val());
                            // thisRow.find('.catBook').text(cat_name);

                            thisRow.find('.catId').val(cat_id);
                            thisRow.find('.publish').val($('#m_publish').val());
                            thisRow.find('.summaryBook').val($('#m_summary').val());

                            thisRow.find('.authorBook').val($('#m_author').val());
                            thisRow.find('.keywordBook').val($('#m_keyword').val());
                            thisRow.find('.outlineBook').val($('#m_outline').val());
                            $('#m_title').text($('#m_name').val());
                            $('#m_img').val('');
                            cellNameBook.data($('#m_name').val()).draw();
                            cellEdition.data($('#m_edition').val()).draw();
                            cellCatName.data(cat_name).draw();

                            thisSave.find('.loadingUpdate').addClass('hidden');
                            thisSave.find('.saveIcon').removeClass('hidden');

                            if (checkImgBook == 1) {
                                var link = "{{asset('storage')}}";
                                var str = jsonVar.path;
                                var res = str.replace("public/", "");
                                // alert(res);
                                thisRow.find('.imgBook img').attr('src', link + "/" + res);
                            }

                        } else {
                            printErrorMsg(jsonVar.error);
                        }
                    }
                });


            });

            $('#example tbody').on('click', 'tr .delete', function () {
                var thisRowToDel = $(this).parents('tr');
                var idBook = $(this).parents('tr').find('.bookId').val();

                var r = confirm("Are you sure!");
                if (r == true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('deleteBook')}}",
                        method: "get",
                        data: {idBook: idBook},
                        success: function (e) {
                           // thisRowToDel.remove();
                            table
                                .row(thisRowToDel )
                                .remove()
                                .draw();
                        }

                    });

                } else {

                }


            });

            $('#example tbody ').on('mouseenter' , 'tr .plusData',function() {
                $(this).tooltip('show');
            });

            $('#example tbody').on('click', 'tr .plusData', function () {


                var thisRowToDel = $(this).parents('tr');
                var idBook = $(this).parents('tr').find('.bookId').val();
                var thisCol = $(this);

                $(".print-error-msg2").hide();
                $('#myModal2 .fileBookIdIncHidden').val(idBook);
                $('#myModal2 #m_title').text($(this).parents('tr').find('.nameBook').text());

                thisCol.find('i:nth-child(1)').addClass('hidden');
                thisCol.find('i:nth-child(2)').removeClass('hidden');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('getPlusData')}}",
                    method: "get",
                    data: {idBook: idBook},
                    success: function (e) {

                        var jsonData = $.parseJSON(e);

                        $('.getAllTypeLangBook').html('');
                        var link = "{{asset('storage')}}";
                        $.each(jsonData.fileBook, function (k, v) {
                            var path = v.path;
                         //   var newPath = path.replace('public/', '');
                            var newPath2 = path.replace('public/book/typeFile/', '');

                            var urlPath = "{{url('downloadFile')}}"+"/"+newPath2;
                            $('.getAllTypeLangBook').append(" <div class='row'>" +

                                "<div class='col-sm-1'>" +
                                "<a style='margin: 3px;' target='_blank' href='" +
                                urlPath +
                                "' >" +

                                "<i class='fa fa-download fa-lg'  aria-hidden='true'></i>" +
                                "</a>" +

                                "" +
                                "<input type='hidden' class='fileBookIdInc' value='" +
                                v.id +
                                "'>" +
                                "" +
                                "<input type='hidden' class='langId' value='" +
                                v.lang_id +
                                "'>" +
                                "" +

                                "<input type='hidden' class='fileBookId' value='" +
                                v.id +
                                "'>" +
                                "" +
                                "<input type='hidden' class='typeId' value='" +
                                v.type_id +
                                "'>" +
                                "" +
                                "<div class='form-group '>" +
                                "</div>" +
                                "</div>" +
                                "<div class='col-sm-4'>" +
                                "<div class='form-group ' >" +
                                "<select class='form-control fileLang' style='height: 45px'>" +
                                "</select>" +
                                "</div>" +
                                "</div>" +
                                "<div class='col-sm-3'>" +
                                " <div class='form-group '>" +
                                "<select class='form-control fileType' style='height: 45px' disabled>" +
                                "</select>" +
                                " </div>" +
                                "</div>" +
                                " <div class='col-sm-2'>" +
                                " <div class='form-group '>" +
                                "<button class='btn btn-primary editFileDetail'><i class='fa fa-save'></i></button>" +
                                "</div>" +
                                "</div>" +
                                "<div class='col-sm-1'>" +
                                "<div class='form-group '>" +
                                "<button class='btn btn-danger delFileDetail'><i class='fa fa-remove'></i></button>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                ""
                            )
                            ;

                        });


                        $.each(jsonData.fileLang, function (k, v) {

                            $('.getAllTypeLangBook .fileLang').append("" +
                                "<option value='" +
                                v.id +
                                "'>" +
                                v.name +
                                "</option>" +
                                "");
                        });

                        $.each(jsonData.fileType, function (k, v) {

                            $('.getAllTypeLangBook .fileType').append("" +
                                "<option value='" +
                                v.id +
                                "'>" +
                                v.name +
                                "</option>" +
                                "");
                        });

                        $('.getAllTypeLangBook .row').each(function (k, v) {
                            var langId = $(this).find('.langId').val();
                            var typeId = $(this).find('.typeId').val();

                            $(this).find('.fileLang option')
                                .filter(function (index) {
                                    return $(this).val() === langId;
                                })
                                .prop('selected', true);

                            $(this).find('.fileType option')
                                .filter(function (index) {
                                    return $(this).val() === typeId;
                                })
                                .prop('selected', true);
                        });


                        thisCol.find('i:nth-child(1)').removeClass('hidden');
                        thisCol.find('i:nth-child(2)').addClass('hidden');
                        $('#myModal2').modal('show');
                    }

                });


            });


            $('.getAllTypeLangBook').on('click', '.editFileDetail', function () {

                var langId = $(this).parents('.row').find('select.fileLang option:selected').val();
                var typeId = $(this).parents('.row').find('select.fileType option:selected').val();
                var bookId = $(this).parents('.row').find('.fileBookId').val();

                var arrLangCheck = [];
                var arrTypeCheck = [];
                $('.getAllTypeLangBook .row').each(function (k, v) {
                    var langId = $(this).find('select.fileLang option:selected').val();
                    var typeId = $(this).find('select.fileType option:selected').val();
                    arrLangCheck.push(langId);
                    arrTypeCheck.push(typeId);
                });


                /*             */

                var arrCheckTwo = [];
                for (var t = 0; t < arrLangCheck.length; t++) {
                    arrCheckTwo.push(arrLangCheck[t]+""+arrTypeCheck[t]);
                }

                var numCheckTwo = [];
                for (var m = 0; m < arrCheckTwo.length; m++) {
                    var numOccurences = $.grep(arrCheckTwo, function (elem) {
                        return elem === arrCheckTwo[m];
                    }).length;
                    numCheckTwo.push(numOccurences);
                }


                var finalCheckTwo = 1;
                for (var m = 0; m < numCheckTwo.length; m++) {
                    if(numCheckTwo[m] > 1) {
                        finalCheckTwo = 0;
                        break;
                    }
                }


                if(finalCheckTwo != 1) {
                    alert('There is duplicate in language fields');

                    var idbookModalHidden = $('#myModal2 .fileBookIdIncHidden').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('getPlusData')}}",
                        method: "get",
                        data: {idBook: idbookModalHidden},
                        success: function (e) {

                            var jsonData = $.parseJSON(e);

                            $('.getAllTypeLangBook').html('');
                            var link = "{{asset('storage')}}";
                            $.each(jsonData.fileBook, function (k, v) {
                                var path = v.path;
                                //   var newPath = path.replace('public/', '');
                                var newPath2 = path.replace('public/book/typeFile/', '');

                                var urlPath = "{{url('downloadFile')}}"+"/"+newPath2;
                                $('.getAllTypeLangBook').append(" <div class='row'>" +

                                    "<div class='col-sm-1'>" +
                                    "<a target='_blank' href='" +
                                    urlPath +
                                    "' >" +

                                    "<i class='fa fa-download fa-lg'  aria-hidden='true'></i>" +
                                    "</a>" +

                                    "" +
                                    "<input type='hidden' class='fileBookIdInc' value='" +
                                    v.id +
                                    "'>" +
                                    "" +
                                    "<input type='hidden' class='langId' value='" +
                                    v.lang_id +
                                    "'>" +
                                    "" +

                                    "<input type='hidden' class='fileBookId' value='" +
                                    v.id +
                                    "'>" +
                                    "" +
                                    "<input type='hidden' class='typeId' value='" +
                                    v.type_id +
                                    "'>" +
                                    "" +
                                    "<div class='form-group '>" +
                                    "</div>" +
                                    "</div>" +
                                    "<div class='col-sm-4'>" +
                                    "<div class='form-group '>" +
                                    "<select class='form-control fileLang' style='height: 45px'>" +
                                    "</select>" +
                                    "</div>" +
                                    "</div>" +
                                    "<div class='col-sm-3'>" +
                                    " <div class='form-group '>" +
                                    "<select class='form-control fileType' style='height: 45px' disabled>" +
                                    "</select>" +
                                    " </div>" +
                                    "</div>" +
                                    " <div class='col-sm-2'>" +
                                    " <div class='form-group '>" +
                                    "<button class='btn btn-primary editFileDetail'><i class='fa fa-save'></i></button>" +
                                    "</div>" +
                                    "</div>" +
                                    "<div class='col-sm-1'>" +
                                    "<div class='form-group '>" +
                                    "<button class='btn btn-danger delFileDetail'><i class='fa fa-remove'></i></button>" +
                                    "</div>" +
                                    "</div>" +
                                    "</div>" +
                                    ""
                                )
                                ;

                            });


                            $.each(jsonData.fileLang, function (k, v) {

                                $('.getAllTypeLangBook .fileLang').append("" +
                                    "<option value='" +
                                    v.id +
                                    "'>" +
                                    v.name +
                                    "</option>" +
                                    "");
                            });

                            $.each(jsonData.fileType, function (k, v) {

                                $('.getAllTypeLangBook .fileType').append("" +
                                    "<option value='" +
                                    v.id +
                                    "'>" +
                                    v.name +
                                    "</option>" +
                                    "");
                            });

                            $('.getAllTypeLangBook .row').each(function (k, v) {
                                var langId = $(this).find('.langId').val();
                                var typeId = $(this).find('.typeId').val();

                                $(this).find('.fileLang option')
                                    .filter(function (index) {
                                        return $(this).val() === langId;
                                    })
                                    .prop('selected', true);

                                $(this).find('.fileType option')
                                    .filter(function (index) {
                                        return $(this).val() === typeId;
                                    })
                                    .prop('selected', true);
                            });

                        }

                    });


                }else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('editFileTypeLang')}}",
                        method: "get",
                        data: {bookId: bookId, typeId: typeId, langId: langId},
                        success: function (e) {
                            alert("done");
                        }

                    });

                }
                /*             */


            });

            $('.getAllTypeLangBook').on('click', '.delFileDetail', function () {


                var fileBookIdInc = $(this).parents('.row').find('.fileBookIdInc').val();
                var thisRowToDelFileBook = $(this).parents('.row');

                var r = confirm("Are you sure!");

                if (r == true) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('delFileDetail')}}",
                        method: "get",
                        data: {fileBookIdInc: fileBookIdInc},
                        success: function (e) {
                            alert("done");
                            thisRowToDelFileBook.remove();
                        }

                    });
                }


            });


            var dataLang = [];
            var dataLangId = [];
            $('#myModal2 .selFileLang option').each(function (k, v) {
                dataLang.push($(this).text());
                dataLangId.push($(this).val());

            });


            var datatype = [];
            var dataTypeId = [];
            $('#myModal2 .selTypeFile option').each(function (k, v) {
                datatype.push($(this).text());
                dataTypeId.push($(this).val());

            });


            $('.add-fileBook').click(function () {


                var a = " <div class='row imm' style='margin-bottom: 10px'>" +

                    "<div class='col-sm-3 '>" +
                    "<select class='form-control selFileLang' >" +
                    "</select>" +

                    "</div>" +
                    "<div class='col-sm-3 '>" +
                    "<select class='form-control selTypeFile ' >" +
                    "</select>" +
                    "</div>" +
                    "<div class='col-sm-4'>" +
                    "<input type='file'  class='form-control fileLangType'  placeholder='upload your img..'>" +
                    "</div>" +
                    "<div class='col-sm-2'>" +
                    "<button type='button' class='btn btn-danger hide-img'><i class='fa fa-minus'></i></button>" +
                    "</div>" +
                    "</div>" +
                    "<div align='center' class='uploadImgError' style='color: Red;'></div>" +
                    "";

                $('.addNewLang').append(a);

                var sel1 = $('.addNewLang').find('.selFileLang').last();
                for (var i = 0; i < dataLangId.length; i++) {
                    sel1.append('<option value="' +
                        dataLangId[i] +
                        '"> ' +
                        dataLang[i] +
                        ' </option>');
                }

                var sel2 = $('.addNewLang').find('.selTypeFile').last();
                for (var i = 0; i < dataTypeId.length; i++) {
                    sel2.append('<option value="' +
                        dataTypeId[i] +
                        '"> ' +
                        datatype[i] +
                        ' </option>');
                }

                $('.hide-img').click(function () {
                    $(this).parents('.imm').remove();

                });

            });

            $('#myModal2 .addNewBookFile').on('click', function () {
                var idBook = $(this).parents('#myModal2').find('.fileBookIdIncHidden').val();

                var thisButton = $(this);
                var arrLangFilePlus = [];
                var arrTypeFilePlus = [];
                var arrFilePlus = [];
                var arrTypeTextFilePlus = [];


                var form_data = new FormData();
                var f = 0;
                $('#myModal2 .addNewLang .imm').each(function (k, v) {
                    arrLangFilePlus.push($(this).find('select.selFileLang option:selected').val());
                    arrTypeFilePlus.push($(this).find('select.selTypeFile option:selected').val());
                    arrFilePlus.push($(this).find('.fileLangType').prop('files')[0]);
                    form_data.append('file' + f, $(this).find('.fileLangType').prop('files')[0]);
                    arrTypeTextFilePlus.push($(this).find('select.selTypeFile option:selected').text().trim());
                    f = f + 1;
                });

                var checkFileBookAttr = 1;

                if (dataLang.length == 0 || datatype.length == 0) {
                    checkFileBookAttr = 0;
                }


                var arrCheckTwo = [];
                $('.getAllTypeLangBook .row').each(function (k, v) {
                    var langId = $(this).find('select.fileLang option:selected').val();
                    var typeId = $(this).find('select.fileType option:selected').val();
                    arrCheckTwo.push(langId+""+typeId);
                });


                for (var t = 0; t < arrLangFilePlus.length; t++) {
                    arrCheckTwo.push(arrLangFilePlus[t]+""+arrTypeFilePlus[t]);
                }

                var numCheckTwo = [];
                for (var m = 0; m < arrCheckTwo.length; m++) {
                    var numOccurences = $.grep(arrCheckTwo, function (elem) {
                        return elem === arrCheckTwo[m];
                    }).length;
                    numCheckTwo.push(numOccurences);
                }


                var finalCheckTwo = 1;
                for (var m = 0; m < numCheckTwo.length; m++) {
                    if(numCheckTwo[m] > 1) {
                        finalCheckTwo = 0;
                        break;
                    }
                }

                form_data.append('idBook', idBook);
                form_data.append('lang', arrLangFilePlus);
                form_data.append('type', arrTypeFilePlus);
                form_data.append('arrTypeTextFilePlus', arrTypeTextFilePlus);
                form_data.append('checkFileBookAttr', checkFileBookAttr);
                form_data.append('f', f);
                form_data.append('finalCheckTwo', finalCheckTwo);
                // form_data.append('file' ,arrFilePlus);


                thisButton.find('.loaddingAddNewPlusFile').removeClass('hidden');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });

                $.ajax({
                    url: '{{url('addNewFileBookPlus')}}',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (data) {
                        var jsonData = $.parseJSON(data);
                        thisButton.find('.loaddingAddNewPlusFile').addClass('hidden');
                        if (jsonData.success == 1) {
                            alert("done");
                            $(".print-error-msg2").hide();
                            $('.getAllTypeLangBook').html('');
                          //  var link = "{{asset('storage')}}";
                            $.each(jsonData.fileBook, function (k, v) {
                                var path = v.path;
                               // var newPath = path.replace('public/', '');

                                var newPath2 = path.replace('public/book/typeFile/' , '');
                                var urlDownload = "{{url('downloadFile')}}"+"/"+newPath2;
                                $('.getAllTypeLangBook').append(" <div class='row'>" +

                                    "<div class='col-sm-2'>" +
                                    "<a target='_blank' href='" +
                                    urlDownload +
                                    "' >" +
                                    "<i class='fa fa-download fa-lg'  aria-hidden='true'></i>" +
                                    "</a>" +
                                    "" +
                                    "<input type='hidden' class='fileBookIdInc' value='" +
                                    v.id +
                                    "'>" +
                                    "" +
                                    "<input type='hidden' class='langId' value='" +
                                    v.lang_id +
                                    "'>" +
                                    "" +

                                    "<input type='hidden' class='fileBookId' value='" +
                                    v.id +
                                    "'>" +
                                    "" +
                                    "<input type='hidden' class='typeId' value='" +
                                    v.type_id +
                                    "'>" +
                                    "" +
                                    "<div class='form-group '>" +
                                    "</div>" +
                                    "</div>" +
                                    "<div class='col-sm-3'>" +
                                    "<div class='form-group '>" +
                                    "<select class='form-control fileLang'>" +
                                    "</select>" +
                                    "</div>" +
                                    "</div>" +
                                    "<div class='col-sm-3'>" +
                                    " <div class='form-group '>" +
                                    "<select class='form-control fileType' >" +
                                    "</select>" +
                                    " </div>" +
                                    "</div>" +
                                    " <div class='col-sm-2'>" +
                                    " <div class='form-group '>" +
                                    "<button class='btn btn-primary editFileDetail'><i class='fa fa-save'></i></button>" +
                                    "</div>" +
                                    "</div>" +
                                    "<div class='col-sm-1'>" +
                                    "<div class='form-group '>" +
                                    "<button class='btn btn-danger delFileDetail'><i class='fa fa-remove'></i></button>" +
                                    "</div>" +
                                    "</div>" +
                                    "</div>" +
                                    ""
                                )
                                ;

                            });


                            $.each(jsonData.fileLang, function (k, v) {

                                $('.getAllTypeLangBook .fileLang').append("" +
                                    "<option value='" +
                                    v.id +
                                    "'>" +
                                    v.name +
                                    "</option>" +
                                    "");
                            });

                            $.each(jsonData.fileType, function (k, v) {

                                $('.getAllTypeLangBook .fileType').append("" +
                                    "<option value='" +
                                    v.id +
                                    "'>" +
                                    v.name +
                                    "</option>" +
                                    "");
                            });

                            $('.getAllTypeLangBook .row').each(function (k, v) {
                                var langId = $(this).find('.langId').val();
                                var typeId = $(this).find('.typeId').val();

                                $(this).find('.fileLang option')
                                    .filter(function (index) {
                                        return $(this).val() === langId;
                                    })
                                    .prop('selected', true);

                                $(this).find('.fileType option')
                                    .filter(function (index) {
                                        return $(this).val() === typeId;
                                    })
                                    .prop('selected', true);
                            });

                            $('.addNewLang .imm').each(function (i, v) {
                                if (i == 0) {
                                    $(this).find('.fileLangType').val('')
                                }
                                if (i != 0) {
                                    $(this).remove();
                                }
                            });
                        } else {

                            printErrorMsg2(jsonData.error);
                        }

                    }
                });

            });


            $('.checkBoxDelThead').on('click' , function() {

                if($(this).is(':checked')) {
                    $('#example tbody tr').each(function(k , v) {
                        $(this).find('.checkBoxDel').prop('checked' , true);
                        $('#example_filter').find('.delSelRow').removeClass('hidden');
                    });

                }else {
                    $('#example tbody tr').each(function(k , v) {
                        $(this).find('.checkBoxDel').prop('checked' , false);
                        $('#example_filter').find('.delSelRow').addClass('hidden');
                    });
                }
            });
            $('#example ').on('click', 'tr .checkBoxDel', function (){

                $('#example_filter').find('.delSelRow').removeClass('hidden');
                var t = 0;
                $('#example tbody tr').each(function(k , v) {
                    if($(this).find('.checkBoxDel').is(':checked')) {
                        t = t +1 ;
                    }
                });

                if(t == 0 ){
                    $('#example_filter').find('.delSelRow').addClass('hidden');
                }

            });
            $('.deleteSelect').on('click', function () {


                var thisRowToDelArr =[] ;
                var id_hidden = [];
                $('#example tbody tr').each(function(k , v) {
                    if($(this).find('.checkBoxDel').is(':checked')) {
                        thisRowToDelArr.push($(this));
                        id_hidden.push($(this).find('.bookId').val());
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
                        url:"{{url('deleteSelBook')}}" ,
                        method:"get" ,
                        data:{id_hidden:id_hidden } ,
                        success:function (e) {
                            alert("done");
                            for(var i =0 ; i<thisRowToDelArr.length ; i++) {
                                table
                                    .row(thisRowToDelArr[i] )
                                    .remove()
                                    .draw();
                            }
                            $('.checkBoxDelThead').prop('checked' , false);
                            $('#example_filter').find('.delSelRow').addClass('hidden');
                        }

                    });
                }

            });

        });

    </script>
@endsection