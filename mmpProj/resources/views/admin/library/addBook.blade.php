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
                                <div class="alert alert-danger print-error-msg" style="display:none; margin: 10px;">
                                    <ul></ul>
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
                                            <select id="selCat" class="form-control">
                                                <?php foreach ($getAllCat as $p) {
                                                ?>
                                                <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>

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
                                            <input name="fileImg" id="fileImg" type="file" class="form-control">
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
                                                <select  class="form-control selFileLang">
                                                    <?php foreach ($getAllLang as $p) {
                                                    ?>
                                                    <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-2 ">
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

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

            var dataLang = [];
            var dataLangId =[];
            $('.addNewLang .selFileLang option').each(function( k , v){
                dataLang.push($(this).text());
                dataLangId.push($(this).val());

            });


            var datatype = [];
            var dataTypeId =[];
            $('.addNewLang .selTypeFile option').each(function( k , v){
                datatype.push($(this).text());
                dataTypeId.push($(this).val());

            });


            $('.add-img').click(function () {


                var a = " <div class='row imm' style='margin-bottom: 10px'>" +
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
                var keyword =$("#keyword").val().split(',');
                var outline =$("#outline").val().split(',');

                var arrLang = [];
                var arrTypeFile = [];
                var arrFile =[];
                $('.addNewLang .imm').each(function() {
                    arrLang.push($(this).find('select.selFileLang option:selected').text());
                    arrTypeFile.push($(this).find('select.selTypeFile option:selected').text());
                    arrFile.push($(this).find('.fileLangType').prop('files')[0] );
                });
//
                var checkFile = 1;
                for(var i=0 ; i< arrFile.length ; i++) {
                    if(arrFile[i] == null) {
                        checkFile = 0;
                    }
                }




                for(var f=0 ; f< arrFile.length ; f++) {
                    form_data.append('arrFile'+f , arrFile[f]);
                }


                var checkDataLang = 1;
                var checkImgBook = 1;
                if(checkFile == 0 || datatype.length == 0 || dataLang.length == 0) {
                   //$('.msgErrorLang').removeClass('hidden');
                    checkDataLang = 0;
                   // printErrorMsg(["Language fields must all required"]);
                }
                if(file_data == null) {
                    checkImgBook = 0;
                }

                form_data.append('file', file_data);
                form_data.append('nameBook' , nameBook);
                form_data.append('editionBook' , editionBook);
                form_data.append('summary' , summary);
                form_data.append('selCatVal' , selCatVal);
                form_data.append('selCattext' , selCattext);
                form_data.append('datePublish' , datePublish);
                form_data.append('author' , author);
                form_data.append('keyword' , keyword);
                form_data.append('outline' , nameBook);
                form_data.append('arrLang' , arrLang);
                form_data.append('arrTypeFile' , arrTypeFile);
                form_data.append('arrFileLength' , f);
                form_data.append('checkDataLang' , checkDataLang);
                form_data.append('checkImgBook' , checkImgBook);
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
                        var jsonVar = $.parseJSON(e);
                        if(jsonVar.success == 1) {
                            alert("is done");
                        }else {
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