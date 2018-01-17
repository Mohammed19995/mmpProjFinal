@extends('mmpApp.mmpApp')


@section('content')
    <style>
        .hidden {
            display: none;
        }
        #gallery-grid-header{
            cursor: pointer;
        }
    </style>
    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
    <div id="page-title" class="parallax dark-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Fatwa</h1>

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home </a></li>
                        <li><a href="blog-listing1.html">Fatwa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE/BREADCRUMB -->

    <!-- BEGIN CONTENT WRAPPER -->
    <div class="content">
        <div class="  container">
            <div class="row fatwaCat">
                <div class=" col-sm-3">
                    <div class="row " style="margin-top: 200px">
                    <div class="widget widget_categories">
                        <h2 class="section-title"><strong>Categories</strong></h2>
                        <ul class="categories">
                            <li><a href="#">Travel tips <span>(2)</span></a></li>
                            <li><a href="#">Photography <span>(1)</span></a></li>
                            <li><a href="#">Travel gear <span>(3)</span></a></li>
                            <li><a href="#">Europe <span>(2)</span></a></li>
                            <li><a href="#">America <span>(6)</span></a></li>
                            <li><a href="#">Asia <span>(1)</span></a></li>
                            <li><a href="#">Blogging advice <span>(1)</span></a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">

                        <div id="accordion" class="panel-group">

                            <h3> Fatwa</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div id="gallery-grid-header">

                                        <a class="publicFatwa">public</a>
                                        @if(auth()->check())
                                        <a  class="privateFatwa">private</a>

                                            @endif
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div class="widget widget_search">
                                        <form id="searchform" role="search" method="get" action="">
                                            <input id="s" class="search" value="" placeholder="Search.." name="s" type="text">
                                            <button id="submit_btn" class="search-submit" type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if(auth()->check())
                            <?php
                            foreach ($userFatwa as $i=>$arr2){ ?>

                            <div class="panel private hidden">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne2<?php echo $i+1; ?>"
                                           class="collapsed">
                                            <?php  echo $arr2->question?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne2<?php echo $i+1; ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php  echo $arr2->answer?>                                    </div>
                                </div>
                            </div>
                            <?php  }       ?>
                            @endif

                            <?php
                            foreach ($allAnswer as $arr){ ?>

                            <div class="panel public hidden">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $arr->id; ?>"
                                           class="collapsed">
                                            <?php  echo $arr->question?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne<?php echo $arr->id; ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php  echo $arr->answer?>                                    </div>
                                </div>
                            </div>
                            <?php  }       ?>



                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="pagination">
                    <div id="previous"><a href="#"><i class="fa fa-angle-left"></i></a></div>
                    <ul>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul>
                    <div id="next"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 30px">
                    <div class="col-sm-2"></div>
                <div class="col-sm-8 contacts">
                    <div class=" row" style="text-align: center ;margin-top: 15px">
                        <h2 class="section-title">Ask your <strong>Question</strong></h2>
                    </div>

                    <div class="row">
                        <div class="alert alert-danger print-error-msg" style="display:none; margin: 10px;">
                            <ul></ul>
                        </div>

                    <form>


                        <div class="col-sm-12">

                            <textarea name="Message" placeholder="Message" class="form-control required Message"></textarea>
                            <select class="form-control "  id="optionCat">
                                <option value="0">Select your Category</option>
                                <?php
                                    foreach ($allCat as $arr){
                                        ?>
                                        <option value=<?php echo $arr->id ?> ><?php echo $arr->name ?></option>
                                <?php    }
                                    ?>
                            </select>
                            <div class="checkbox " style="margin-top: 30px">
                                <label><input type="checkbox"  id="myCheckbox" value="cc">private Message</label>
                            </div>

                        </div>

                        <div class="center">
                            <input type="button" class="btn btn-default submit_form sendFatwa" value="Send Message">
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
    <!-- END CONTENT WRAPPER -->
@endsection


@section('script')

    <script >
        $(document).ready(function () {
            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

            $('.rd-navbar-nav-wrap ul li').each(function (e , v) {
                $(this).removeClass('active');
            });

            $('.rd-navbar-nav-wrap li.fatwa ').addClass('active');



            $('.sendFatwa').click(function () {
                var subject = $('.subject').val();
                var message = $('.Message').val();
                var category = $('select#optionCat option:selected').val();
                var private;
               if($('#myCheckbox').is(':checked') ){
                  private = 1;
               }else {
                   private = 0;
               }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('addMessege')}}",
                    method: "get",
                    data: {subject: subject, message: message, category: category ,private:private},
                    success: function (e) {
                       if(e==1){
                           window.location="{{url('login')}}"
                       }else {
                           if ($.isEmptyObject(e.error)) {
                               alert(e.success);
                               $('.subject').val("");
                               $('.Message').val("");
                               $('select#optionCat option[value="0"]').attr("selected",true);
                               $(".print-error-msg").hide();
                           } else {
                               printErrorMsg(e.error);
                           }
                       }



                    }

                });

            });
            $('.public').removeClass('hidden');
            $('.privateFatwa').click(function () {

                     $('.public').addClass('hidden');
                $('.private').removeClass('hidden');
            });
            $('.publicFatwa').click(function () {
                $('.public').removeClass('hidden');
                $('.private').addClass('hidden');
            });
        });

    </script>
@endsection