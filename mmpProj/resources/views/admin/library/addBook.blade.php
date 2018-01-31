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
                                        <label class="col-sm-2 form-control-label ">Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" id="nameBook" name="nameBook" class="form-control">
                                        </div>

                                        <label class="col-sm-2 form-control-label">Edition</label>
                                        <div class="col-sm-3">
                                            <input type="number" id="editionBook" class="form-control">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">Category </label>
                                        <div class="col-sm-8">
                                            <select id="selCat" class="form-control" style="height: 45px;">
                                                <?php foreach ($getAllCat as $p) {
                                                ?>
                                                <option style="line-height: 2" value="<?php echo $p->id;?>"><?php echo $p->name;?></option>

                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">

                                        <label class="col-sm-2 form-control-label">Summary </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="summary"></textarea></div>
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
                                        <label class="col-sm-2 form-control-label">publish</label>
                                        <div class="col-sm-8">
                                            <input type="date" id="datePublish" class="form-control">
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">Author</label>
                                        <div class="col-sm-8">
                                            <input id="author" type="text"
                                                   data-role="tagsinput"/>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">keyword</label>
                                        <div class="col-sm-8">
                                            <input id="keyword" type="text"

                                                   data-role="tagsinput"/>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">Outline </label>
                                        <div class="col-sm-8">
                                            <input id="outline" type="text"
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

                                        <div class="alert alert-danger msgErrorLang hidden">
                                            please , All field is required.
                                        </div>
                                        <div class="form-group row imm">

                                            <label class="col-sm-2 form-control-label">Language</label>

                                            <div class="col-sm-3 ">
                                                <select class="form-control selFileLang" style="height: 45px;">
                                                    <?php foreach ($getAllLang as $p) {
                                                    ?>
                                                    <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-2 ">
                                                <select class="form-control selTypeFile" style="height: 45px;">
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
                $('.successMsg').addClass('hidden');
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                var arrError = [];
                $.each(msg, function (key, value) {
                    /*
                    arrError.push(value);
                    if(key != 0 && arrError[key] == arrError[key-1] ) {

                    }else {
                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                    }
*/
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

            var dataLang = [];
            var dataLangId = [];
            $('.addNewLang .selFileLang option').each(function (k, v) {
                dataLang.push($(this).text());
                dataLangId.push($(this).val());

            });


            var datatype = [];
            var dataTypeId = [];
            $('.addNewLang .selTypeFile option').each(function (k, v) {
                datatype.push($(this).text());
                dataTypeId.push($(this).val());

            });


            $('.add-img').click(function () {


                var a = " <div class='row imm immPlus' style='margin-bottom: 10px'>" +
                    "<label class='col-sm-2 form-control-label'>Language</label>" +

                    "<div class='col-sm-3 '>" +
                    "<select class='form-control selFileLang' >" +
                    "</select>" +

                    "</div>" +
                    "<div class='col-sm-2 '>" +
                    "<select class='form-control selTypeFile ' >" +
                    "</select>" +
                    "</div>" +
                    "<div class='col-sm-4'>" +
                    "<input type='file'  class='form-control fileLangType'  placeholder='upload your img..'>" +
                    "</div>" +
                    "<div class='col-sm-1'>" +
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


            $('.addNewBook').click(function () {


                var file_data = $('#fileImg').prop('files')[0];
                var form_data = new FormData();

                var nameBook = $('#nameBook').val();
                var editionBook = $('#editionBook').val();
                var selCatVal = $('select#selCat option:selected').val();
                var selCattext = $('select#selCat option:selected').text();
                var datePublish = $('#datePublish').val();
                var summary = $('#summary').val();
                var author = $("#author").val().split(',');
                var keyword = $("#keyword").val().split(',');
                var outline = $("#outline").val().split(',');

                var arrLang = [];
                var arrTypeText = [];
                var arrTypeFile = [];
                var arrFile = [];


                $('.addNewLang .imm').each(function () {
                    arrLang.push($(this).find('select.selFileLang option:selected').val());
                    arrTypeFile.push($(this).find('select.selTypeFile option:selected').val());
                    arrFile.push($(this).find('.fileLangType').prop('files')[0]);
                    arrTypeText.push($(this).find('select.selTypeFile option:selected').text().trim());
                });
//
                var checkFile = 1;
                for (var i = 0; i < arrFile.length; i++) {
                    if (arrFile[i] == null) {
                        checkFile = 0;
                    }
                }



                var arrCheckTwo = [];
                for (var t = 0; t < arrLang.length; t++) {
                    arrCheckTwo.push(arrLang[t]+""+arrTypeFile[t]);
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

                for (var f = 0; f < arrFile.length; f++) {
                    form_data.append('arrFile' + f, arrFile[f]);
                }


                var checkDataLang = 1;
                var checkImgBook = 1;
                if (checkFile == 0 || datatype.length == 0 || dataLang.length == 0) {
                    //$('.msgErrorLang').removeClass('hidden');
                    checkDataLang = 0;
                    // printErrorMsg(["Language fields must all required"]);
                }
                if (file_data == null) {
                    checkImgBook = 0;
                }

                form_data.append('file', file_data);
                form_data.append('nameBook', nameBook);
                form_data.append('editionBook', editionBook);
                form_data.append('summary', summary);
                form_data.append('selCatVal', selCatVal);
                form_data.append('selCattext', selCattext);
                form_data.append('datePublish', datePublish);
                form_data.append('author', author);
                form_data.append('keyword', keyword);
                form_data.append('outline', outline);
                form_data.append('arrLang', arrLang);
                form_data.append('arrTypeFile', arrTypeFile);
                form_data.append('arrFileLength', f);
                form_data.append('checkDataLang', checkDataLang);
                form_data.append('checkImgBook', checkImgBook);
                form_data.append('arrTypeText', arrTypeText);
                form_data.append('finalCheckTwo', finalCheckTwo);

                $('#myModal').modal('show');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: '{{url('addBook')}}',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (e) {

                        $('#myModal').modal('hide');

                        var jsonVar = $.parseJSON(e);
                        if (jsonVar.success == 1) {

                            alert("is done");
                            $('#nameBook').val('');
                            $('#editionBook').val('');
                            $('#fileImg').val('');
                            $('#datePublish').val('');
                            $('#summary').val('');
                            $("#author").tagsinput('removeAll');
                            $("#keyword").tagsinput('removeAll');
                            $("#outline").tagsinput('removeAll');

                            $('.addNewLang .imm').each(function (i, v) {
                                if (i == 0) {
                                    $(this).find('.fileLangType').val('')
                                }
                                if (i != 0) {
                                    $(this).remove();
                                }
                            });

                            $('html, body').animate({
                                scrollTop: $(".card-header").offset().top
                            }, 2000);
                            $('.successMsg').removeClass('hidden');
                            $(".print-error-msg").hide();
                        } else {

                            $('html, body').animate({
                                scrollTop: $(".card-header").offset().top
                            }, 2000);
                            printErrorMsg(jsonVar.error);
                        }


                    }
                });


            });

        });
    </script>


@endsection