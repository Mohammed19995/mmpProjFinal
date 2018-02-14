@extends('mmpApp.mmpApp')


@section('content')
    <style>
        .hidden {
            display: none;
        }

        #gallery-grid-header {
            cursor: pointer;
        }

        .active {
            color: #02baa6;
        }

        .pagination {
            margin-left: 35%;
        }

        .panel-heading .muft a {
            text-decoration: none;
        }

        .panel-group .panel .panel-heading .panel-title a .aa::after {
            background-color: red;
        }

        .panel-group .panel .panel-heading .panel-title > a.collapsed::after {
            content: "\f128";
        }

    </style>


    <?php

    use App\Http\Controllers\FatawiCon;
    $valueInput = 0;
    if (isset($_GET['r'])) {
        $valueInput = 1;
    } else {
        $valueInput = 2;
    }
    ?>

    <input type="hidden" class="getInput" value="<?php echo $valueInput?>">
    <div id="page-title" class="parallax dark-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Fatwa</h1>

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home </a></li>
                        <li><a href="blog-listing1.html">Fatwa </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE/BREADCRUMB -->

    <!-- BEGIN CONTENT WRAPPER -->
    <div class="content">
        <div class="  container">
            <div class="row" style="margin-top: 50px ">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    @if(auth()->check())
                        <div id="gallery-grid-header">

                            <a class="publicFatwa active">public</a>

                            <a class="privateFatwa">private</a>


                        </div>
                    @endif
                </div>

                <div class="col-sm-5">
                    <div class="widget widget_search">
                        <form id="searchform" role="search" method="post"
                              action="{{url('resultSearch')}}">
                            {{ csrf_field() }}
                            <input id="s" class="search" value="" placeholder="Search.." name="search"
                                   type="text">
                            <button id="submit_btn" class="search-submit" type="submit"><i
                                        class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row fatwaCat">

                <div class=" col-sm-3">
                    <div class="row " style="margin-top: 20px">
                        <div class="widget widget_categories">
                            <h2 class="section-title"><strong>Categories</strong></h2>
                            <ul class="categories">

                          <span class=" hidden catName"><?php
                              if ($id_cat == 0) {
                                  echo "all";
                              } else {
                                  $catName = FatawiCon::getNameCat($id_cat);
                                  echo $catName->name;
                              }
                              ?></span>


                                <li data-class="all" class=""><a href="{{url('mmpApp/advisory')}}"
                                                                 style="cursor: pointer;"> All</a></li>


                                <?php
                                foreach ($allCat as $arr){
                                $catName2 = FatawiCon::countAdvisoryCat($arr->id);

                                ?>

                                <li data-class="<?php echo "." . $arr->name?>" class="oo"><a
                                            href="{{url('mmpApp/advisory')."/".$arr->id}}"><?php  echo $arr->name ?>
                                        <span class="hidden yy"><?php  echo $arr->name ?></span>
                                        <span>(
                                            <?php echo $catName2;?>
                                            ) </span>
                                    </a></li>
                                <?php   }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">

                        <div class="panel-group">
                            @if(auth()->check())
                                <div id="accordion" class="private hidden">
                                    <?php
                                    foreach ($userFatwa as $arr2){ ?>
                                    <div class="panel ">
                                        <div class="panel-heading">
                                            <h4 class="panel-title" data-toggle="tooltip" data-placement="right"
                                                title="<?php
                                                $catName = FatawiCon::getNameCat($arr2->cat_id);
                                                echo "category : " . $catName->name;
                                                ?>">
                                                <a data-toggle="collapse" data-parent="#accordion2"
                                                   href="#"
                                                   class="collapsed  bb">
                                                    <?php   echo $arr2->question?>
                                                    <span class=" hidden id_toggel2"><?php echo $arr2->id; ?></span>

                                                </a>
                                            </h4>
                                            <div class="row muft">
                                                <div class="col-sm-3" style="  cursor: pointer; border-left: 6px solid #02baa6;
                                                 background-color: lightgrey; margin-left: 15px;">
                                                    <a href="{{url('mmpApp/advisory2')."/".$arr2->mufti}}">
                                                        <span style="font-family: bold ; font-size: 1.075em; color: #172646">
                                                            <?php echo "Mufti : " . $arr2->mufti?></span></a></div>
                                                <div class="col-sm-7"></div>
                                                <div class="col-sm-2" style="  cursor: pointer; border-right: 6px solid #02baa6;
                                                 background-color: lightgrey; margin-left: 452px;">

                                                        <span style="font-family: bold ; font-size: 1.075em; color: #172646">
                                                            <?php echo $arr2->created_at->format('M-d-Y')?></span></div>


                                            </div>
                                        </div>
                                        <div id="collapseTwo<?php echo $arr2->id; ?>" class=" collapse">
                                            <div class="panel-body">
                                                <div class="row">

                                                    <div class="col-sm-12">
                                                        <?php   echo $arr2->answer?>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <?php  }       ?>
                                    {{$userFatwa->links()}}

                                </div>
                            @endif
                            <div id="accordion2" class="public hidden">
                                <?php
                                foreach ($allAnswer as $arr){
                                ?>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" data-toggle="tooltip" data-placement="right"
                                            title="<?php
                                            $catName = FatawiCon::getNameCat($arr->cat_id);
                                            echo "category : " . $catName->name;
                                            ?>">
                                            <a data-toggle="collapse" data-parent="#accordion2"
                                               href="#"
                                               class="collapsed  aa">
                                                <?php   echo $arr->question?>
                                                <span class=" hidden id_toggel"><?php echo $arr->id; ?></span>

                                            </a>
                                        </h4>
                                        <div class="row muft">
                                            <div class="col-sm-3" style="  cursor: pointer; border-left: 6px solid #02baa6;
                                                 background-color: lightgrey; margin-left: 15px;">
                                                <a href="{{url('mmpApp/advisory2')."/".$arr->mufti}}">
                                                        <span style="font-family: bold ; font-size: 1.075em; color: #172646">
                                                            <?php echo "Mufti : " . $arr->mufti?></span></a></div>
                                            <div class="col-sm-7"></div>
                                            <div class="col-sm-2" style="  cursor: pointer; border-right: 6px solid #02baa6;
                                                 background-color: lightgrey; margin-left: 452px;">

                                                        <span style="font-family: bold ; font-size: 1.075em; color: #172646">
                                                            <?php echo $arr->created_at->format('M-d-Y')?></span></div>


                                        </div>
                                    </div>
                                    <div id="collapseOne<?php echo $arr->id; ?>" class=" collapse">
                                        <div class="panel-body">
                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <?php   echo $arr->answer?>

                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>

                                <?php  }       ?>
                                {{$allAnswer->links()}}
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-1"></div>
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

                                <textarea name="Message" placeholder="Message"
                                          class="form-control required Message"></textarea>
                                    <select class="form-control " id="optionCat">
                                        <option value="0">Select your Category</option>
                                        <?php
                                        foreach ($allCat as $arr){
                                        ?>
                                        <option value=<?php echo $arr->id ?> ><?php echo $arr->name ?></option>
                                        <?php    }
                                        ?>
                                    </select>
                                    <div class="checkbox " style="margin-top: 30px">
                                        <label><input type="checkbox" id="myCheckbox" value="cc">private Message</label>
                                    </div>

                                </div>

                                <div class="center">
                                    <input type="button" class="btn btn-default submit_form sendFatwa"
                                           value="Send Message">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- END CONTENT WRAPPER -->
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

            //     $('.panel-group .panel .panel-heading .panel-title > a.collapsed::after').css('color','red');

            $('.aa').click(function () {
                var check = $(this).parent().find('a[aria-expanded]').attr('aria-expanded');
                var check2 = $(this).parent().find('.id_toggel').text();
                var check3 = "#collapseOne" + check2;


                $(this).parents('.panel').find('#collapseOne' + check2).toggle("slow");
                // $(this).parents('.panel').find('#collapseOne' + check2).addClass('collapse');

            });
            $('.bb').click(function () {
                var check2 = $(this).parent().find('.id_toggel2').text();
                var check3 = "#collapseTwo" + check2;


                $(this).parents('.panel').find('#collapseTwo' + check2).toggle("slow");
                // $(this).parents('.panel').find('#collapseOne' + check2).addClass('collapse');

            });

            $('[data-toggle="tooltip"]').tooltip();
            $('.rd-navbar-nav-wrap ul li').each(function (e, v) {
                $(this).removeClass('active');
            });

            $('.rd-navbar-nav-wrap li.fatwa ').addClass('active');

            $('.widget_categories .categories li').each(function () {
                $(this).removeClass('active');
            });

            $('.widget_categories .categories li').each(function () {
                var catIdHidden = $('.catName').text();


                if (catIdHidden == 'all') {
                    if ($(this).data('class') == catIdHidden) {
                        $(this).addClass('active');
                    }

                } else {
                    // alert(catIdHidden);
                    if ($(this).data('class') == "." + catIdHidden) {
                        $(this).addClass('active');
                    }
                }
                //
            });


            $('.sendFatwa').click(function () {
                var subject = $('.subject').val();
                var message = $('.Message').val();
                var category = $('select#optionCat option:selected').val();
                var private;
                if ($('#myCheckbox').is(':checked')) {
                    private = 1;
                } else {
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
                    data: {subject: subject, message: message, category: category, private: private},
                    success: function (e) {
                        if (e == 1) {
                            window.location = "{{url('login')}}"
                        } else {
                            if ($.isEmptyObject(e.error)) {
                                alert(e.success);
                                $('.subject').val("");
                                $('.Message').val("");
                                $('select#optionCat option[value="0"]').attr("selected", true);
                                $(".print-error-msg").hide();
                            } else {
                                printErrorMsg(e.error);
                            }
                        }


                    }

                });

            });
            var a = $('.getInput').val();


            if (a == 2) {
                $('.public').removeClass('hidden');
                $('.privateFatwa').click(function () {
                    $(this).addClass('active');
                    $('.publicFatwa').removeClass('active');
                    $('.public').addClass('hidden');
                    $('.private').removeClass('hidden');
                });
                $('.publicFatwa').click(function () {
                    $(this).addClass('active');
                    $('.privateFatwa').removeClass('active');
                    $('.public').removeClass('hidden');
                    $('.private').addClass('hidden');
                });
            } else if (a == 1) {
                $('.public').addClass('hidden');
                $('.private').removeClass('hidden');
                $('.privateFatwa').click(function () {

                    $('.public').addClass('hidden');
                    $('.private').removeClass('hidden');
                });
                $('.publicFatwa').click(function () {
                    $('.public').removeClass('hidden');
                    $('.private').addClass('hidden');
                });
            }
        });

    </script>
@endsection