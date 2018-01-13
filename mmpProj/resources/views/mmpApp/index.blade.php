
@extends('mmpApp.mmpApp')


@section('content')
    <main class="page-content">

        <section class="context-dark bg-dark-blue">
            <!-- Swiper-->
            <div class="swiper-container swiper-slider" data-height="35.5%" data-loop="true" data-dragable="false" data-min-height="480px" data-slide-effect="true">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-slide-bg="{{asset('mmp/images/m3.jpg')}}" style="background-position: center center;">
                        <div class="swiper-slide-caption">
                            <div class="container">
                                <div class="range ">
                                    <div class="row" data-caption-animate="slideInUp"
                                         data-caption-delay="100">
                                        <div class="col-sm-12">
                                            <h1>A partnership based on trust. </h1>
                                        </div>
                                    </div>
                                    <div class="row " data-caption-animate="slideInUp"
                                         data-caption-delay="200">
                                        <div class="col-sm-12">
                                            <p>We strive to ensure that our services have become a benchmark of quality in the field of the delivery. </p>
                                        </div>
                                    </div>
                                    <div class="row " data-caption-animate="slideInUp"
                                         data-caption-delay="300">
                                        <div class="col-sm-12">
                                            <span class="btn"> click hear</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-slide-bg="{{asset('mmp/images/m1.jpg')}}" style="background-position: center center;">
                        <div class="swiper-slide-caption">
                            <div class="container">
                                <div class="range ">
                                    <div class="row ">
                                        <div class="col-sm-12">
                                            <h1>A partnership based on trust. </h1>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-sm-12">
                                            <p>We strive to ensure that our services have become a benchmark of quality in the field of the delivery. </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="btn"> click hear</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-slide-bg="{{asset('mmp/images/m3.jpg')}}" style="background-position: center center;">
                        <div class="swiper-slide-caption">
                            <div class="container">
                                <div class="range ">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1>A partnership based on trust. </h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p>We strive to ensure that our services have become a benchmark of quality in the field of the delivery. </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="btn"> click hear</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Swiper Pagination-->
                <div class="swiper-pagination"></div>

            </div>
        </section>
    </main>

    <!-- BEGIN HIGHLIGHT -->
    <!--
    <section class="section-highlight">
        <div class="container-fluid">
            <div class="row">
                <div class="row-table">
                    <div class="col-sm-5 col-sm-offset-2 padding-top padding-bottom">
                        <h2 class="highlight-heading ucase" data-animation-direction="from-left"
                            data-animation-delay="50"><strong>Rider it's a clean &amp; modern Template!</strong></h2>
                        <p class="highlight-text" data-animation-direction="from-left" data-animation-delay="250">Very
                            professional and highly customizable html5 template with lots of custom pages and useful
                            features.</p>
                        <p data-animation-direction="from-left" data-animation-delay="650">Mauris hendrerit risus a arcu
                            dapibus varius. Quisque dictum, erat molestie vehicula pellentesque, enim elit sodales leo,
                            id pharetra mi tortor at tellus. Etiam ornare, enim at tincidunt congue, nibh dui suscipit
                            augue, pellentesque hendrerit ligula lorem vehicula sapien.</p>
                        <br/>
                        <div data-animation-direction="from-left" data-animation-delay="850"><a href="#"
                                                                                                class="btn btn-default">Buy
                                Rider Template</a></div>
                    </div>

                    <div id="corporate-highlight" class="col-sm-5 highlight-img">
                        <div class="padding-img"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     -->
    <!-- END HIGHLIGHT -->


    <!-- BEGIN OUR SERVICES -->
    <section id="our-services" class="parallax gray-bg no-padding-bottom" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="center"><h1 class="section-title" data-animation-direction="from-bottom"
                                            data-animation-delay="50">Our <strong>Services</strong></h1></div>
                </div>

                <div class="services">
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="250">
                        <i class="fa fa-fort-awesome"></i>
                        <h3>European Islam</h3>
                        <p class="hidden">Describe what it called “European Islam”, which is combine the duties and
                            principles of true Islam with the contemporary European cultures.</p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="450">
                        <i class="fa fa-pencil"></i>
                        <h3>Discover Islam</h3>
                        <p class="hidden">Information about civilized Islam, It has educational materials (Mobile Apps)
                            for children to explain proper Islam.</p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="650">
                        <i ><img class="mosque1" style="margin-bottom: 15px; " src="{{asset('icons/mosque/mosque.ico')}}">
                            <img class="mosque2 hidden" style="margin-bottom: 15px " src="{{asset('icons/mosque/mosque2.ico')}}">
                        </i>
                        <h3>Mosques and Islamic institutions</h3>
                        <p class="hidden">A comprehensive portal includes detailed information about mosques & Islamic
                            institutions in Belgium, and also indicates the quality of services provided by them.</p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="850">
                        <i class="fa fa-line-chart"></i>
                        <h3>Intellectual and jurisprudence revisions</h3>
                        <p class="hidden">This section includes the intellectual and jurisprudence revisions. It clarify
                            the root of the legitimate and stop the violence and to indicate doctrinal errors and
                            correct it.</p>
                    </div>
                </div>
                <div class="services mar-top">
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="250">
                        <i class="fa fa-book"></i>
                        <h3>Digital Library</h3>
                        <p class="hidden">Section contains books, photographs, films, audio and video recordings.</p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="650">
                        <i class="fa fa-question"></i>
                        <h3>Question and Answer - Consulting</h3>
                        <p class="hidden">that aims to provide intelligent, authoritative responses to anyone's question
                            about Islam or any issue of interest to all the people in Europe.</p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="450">
                        <i class="fa fa-hand-rock-o"></i>
                        <h3>Friends of Islam</h3>
                        <p class="hidden">List and information about people who are friends of Islam..</p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="850">
                        <i class="fa fa-picture-o"></i>
                        <h3>Gellary and Vedios</h3>
                        <p class="hidden">Figures and popular human models who have a significant imprint in the lives
                            of humans.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- END OUR SERVICES -->


    <!-- BEGIN WHAT'S NEW -->
    <section class="no-padding-bottom-section padding-top">
        <div class="container">

            <div class="row">
                <div class="grid-style">
                    <div class="col-sm-8">

                        <div class="row">
                            <div class="col-md-12">
                                <h2>News</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="item col-md-3" data-animation-direction="from-bottom"
                                 data-animation-delay="250">
                                <div class="image">
                                    <a href="blog-detail.html">
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/720x448" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> <a href="#">July 30, 2014</a></li>
                                        <li><i class="fa fa-comments-o"></i> <a href="#">2</a></li>
                                        <li><i class="fa fa-tags"></i> <a href="#">Tips</a>, <a href="#">Travel</a>, <a
                                                    href="#">Best Deals</a></li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">News 1</a>
                                    </h3>
                                    <p>Sed rutrum urna id tellus euismod gravida. Praesent placerat, mauris ac
                                        pellentesque
                                        fringilla, tortor libero condimen.</p>
                                </div>
                            </div>
                            <div class="item col-md-3" data-animation-direction="from-bottom"
                                 data-animation-delay="450">
                                <div class="image">
                                    <a href="blog-detail.html">
                                        <i class="fa fa-film"></i>
                                    </a>
                                    <img src="http://placehold.it/720x448" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> <a href="#">July 30, 2014</a></li>
                                        <li><i class="fa fa-comments-o"></i> <a href="#">2</a></li>
                                        <li><i class="fa fa-tags"></i> <a href="#">Tips</a>, <a href="#">Travel</a>, <a
                                                    href="#">Best Deals</a></li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">News 2</a>
                                    </h3>
                                    <p>Sed rutrum urna id tellus euismod gravida. Praesent placerat, mauris ac
                                        pellentesque
                                        fringilla, tortor libero condimen.</p>
                                </div>
                            </div>
                            <div class="item col-md-3" data-animation-direction="from-bottom"
                                 data-animation-delay="650">
                                <div class="image">
                                    <a href="blog-detail.html">
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/720x448" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> <a href="#">July 30, 2014</a></li>
                                        <li><i class="fa fa-comments-o"></i> <a href="#">2</a></li>
                                        <li><i class="fa fa-tags"></i> <a href="#">Tips</a>, <a href="#">Travel</a>, <a
                                                    href="#">Best Deals</a></li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">News 3</a>
                                    </h3>
                                    <p>Sed rutrum urna id tellus euismod gravida. Praesent placerat, mauris ac
                                        pellentesque
                                        fringilla, tortor libero condimen.</p>
                                </div>
                            </div>
                            <div class="item col-md-3" data-animation-direction="from-bottom"
                                 data-animation-delay="650">
                                <div class="image">
                                    <a href="blog-detail.html">
                                        <i class="fa fa-file-text-o"></i>
                                    </a>
                                    <img src="http://placehold.it/720x448" alt=""/>
                                </div>

                                <div class="info-blog">
                                    <ul class="top-info">
                                        <li><i class="fa fa-calendar"></i> <a href="#">July 30, 2014</a></li>
                                        <li><i class="fa fa-comments-o"></i> <a href="#">2</a></li>
                                        <li><i class="fa fa-tags"></i> <a href="#">Tips</a>, <a href="#">Travel</a>, <a
                                                    href="#">Best Deals</a></li>
                                    </ul>
                                    <h3>
                                        <a href="blog-detail.html">News 4</a>
                                    </h3>
                                    <p>Sed rutrum urna id tellus euismod gravida. Praesent placerat, mauris ac
                                        pellentesque
                                        fringilla, tortor libero condimen.</p>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Most read</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget widget_recent_entries">
                                    <ul>
                                        <li>
                                            <div class="image">
                                                <a href="blog-detail.html"></a>
                                                <img src="http://placehold.it/720x750" alt=""/>
                                            </div>

                                            <ul class="top-info">
                                                <li><i class="fa fa-calendar"></i> July 30, 2017</li>
                                            </ul>

                                            <h4><a href="blog-detail.html">10 Tips on How to Save for Travel</a></h4>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <a href="blog-detail.html"></a>
                                                <img src="http://placehold.it/720x750" alt=""/>
                                            </div>

                                            <ul class="top-info">
                                                <li><i class="fa fa-calendar"></i> July 24, 2017</li>
                                            </ul>

                                            <h4><a href="blog-detail.html">Packing Tips for World Travelers</a></h4>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <a href="blog-detail.html"></a>
                                                <img src="http://placehold.it/720x750" alt=""/>
                                            </div>

                                            <ul class="top-info">
                                                <li><i class="fa fa-calendar"></i> July 05, 2017</li>
                                            </ul>

                                            <h4><a href="blog-detail.html">How to Choose the Best Travel Camera</a></h4>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <a href="blog-detail.html"></a>
                                                <img src="http://placehold.it/720x750" alt=""/>
                                            </div>

                                            <ul class="top-info">
                                                <li><i class="fa fa-calendar"></i> July 24, 2017</li>
                                            </ul>

                                            <h4><a href="blog-detail.html">Packing Tips for World Travelers</a></h4>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>
    <!-- END WHAT'S NEW -->

    <!-- BEGIN Great Person -->
    <section id="our-work" class="no-padding-top-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="center"><h1 class="section-title" data-animation-direction="from-bottom"
                                            data-animation-delay="50">Great <strong>Person</strong></h1></div>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <p class="center" data-animation-direction="from-bottom" data-animation-delay="150">Pellentesque
                        elementum libero enim, eget gravida nunc laoreet et. Nullam ac enim auctor, fringilla risus at,
                        imperdiet turpis. Pellentesque elementum libero enim, eget gravida nunc laoreet et.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div id="our-work-carousel" class="owl-carousel carousel-style-1">
                        <div class="item" data-animation-direction="from-bottom" data-animation-delay="150">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item" data-animation-direction="from-bottom" data-animation-delay="300">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item" data-animation-direction="from-bottom" data-animation-delay="450">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>

                        <div class="item">
                            <a href="http://placehold.it/766x515" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><i
                                        class="fa fa-search"></i></a>
                            <img src="http://placehold.it/334x295" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OUR WORK -->


    <!-- BEGIN HIRE US -->
    <section id="hire-us" class="parallax colored-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="center">
                        <h2 class="highlight-heading" data-animation-direction="from-top" data-animation-delay="50">
                            Describe what it called “European Islam”, which is combine the duties and principles of true
                            Islam with the contemporary European cultures..</h2>
                        <div data-animation-direction="from-bottom" data-animation-delay="150"><a href="contacts.html"
                                                                                                  class="btn btn-light">Hire
                                Us !</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $('.services .item').mouseover(function () {

                    $(this).find('.mosque1').addClass('hidden');
                    $(this).find('.mosque2').removeClass('hidden');


            });

            $('.services .item').mouseout(function () {

                    $(this).find('.mosque1').removeClass('hidden');
                    $(this).find('.mosque2').addClass('hidden');


            });
        });
    </script>
@endsection
