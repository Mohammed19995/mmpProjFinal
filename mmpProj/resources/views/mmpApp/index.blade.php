
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
                        <p class="hidden ">
                        <?php
                                $string ="Despite the media, political and intellectual debate over whether the term
                                 applies or does not apply to the nature of contemporary Islamic presence in Europe and the West, there is more than one indication that the concept of European Islam is today a reality that can not be ignored or repealed. The figures show that the Islamic spectrum is strikingly present in European pluralism, not only demographically and humanly, but through various forms of tangible and tangible contribution, at the level of formal education, civil society, social work, scientific research, political participation and economic investment. Therefore, the concept of European Islam derives its existential reality from its extended presence in the structure of European societies, a presence that does not conflict with the nature of the Islamic religion, which
                                 is based on dialogue, tolerance, diversity and openness to different cultures, languages ​​and races.";



                            echo substr($string, 0, 150).'...<a href="europeanIslam">Read More</a>';
                              ?>
                        </p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="350">
                        <i class="fa fa-pencil"></i>
                        <h3>Discover Islam</h3>
                        <p class="hidden">
                            <?php
                            $string ="The friction of the Christian West with Islam is
                            not born today; it has been for centuries that each
                            side tried to discover and recognize the other.
                             However, the need for further discovery remains both existing and sensitive.
                             The emphasis is usually on introducing Islam on the doctrinal and ritual aspects at the expense of other historical, scientific, intellectual, architectural and architectural aspects. This is contrary to the message of Islam, which focuses on the use of reason and seeking knowledge and create a balance between what is mundane and Acharawi. The more the European and the non-Muslim Western can
                             access these cultural aspects of Islam, accept Islam and strive to identify deeply and seriously.";
                            // Starts at the beginning of the string and ends after 100 characters
                            echo substr($string, 0, 150).'...<a href="discoverIslam">Read More</a>';
                            ?>
                        </p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="450">
                        <i class="fa fa-hand-rock-o"></i>
                        <h3>Friends of Islam</h3>
                        <p class="hidden">
                            <?php
                            $string ="There is a Western sect
                             that treats Muslims on the basis of tolerance,
                             respect and charity. In the Western media and intellectual literature,
                              they are called 'the wise men of the West,' because they strive to bring cultures, religions and races closer together and reject the clash of civilizations theory that calls for conflict and confrontation. This wise slice reminds us of the author whose hearts Islam gave them to share the zakat, and by telling the people of the book that it is the best and the good preaching, as stipulated by the Holy Quran. These Western wise men, whose interests and specialties vary, are present in most European and Western societies. In this regard we refer to the names of Hans Kung,
                            Prince Charles, Karen Armstrong, Jürgen Nielsen, Anna Marie Schimmel, van Kuninsfeld .";
                            // Starts at the beginning of the string and ends after 100 characters
                            echo substr($string, 0, 150).'...<a href="friendIslam">Read More</a>';
                            ?>
                        </p>
                    </div>

                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="550">
                        <i class="fa fa-question"></i>
                        <h3>Question and Answer - Consulting</h3>
                        <p class="hidden">
                            <?php
                            $string ="The reality of the consultation of Muslims in Europe is a mess, which requires the urgency of organizing it through the formulation of a digital space that responds to the expectations and questions of the European Muslim. Consultations here are not limited to what is a fatwa of fatwas, but rather what is legal, social, moral, economic and medical. A team of experts and specialists
                             responds objectively and scientifically to the European context in which the target groups live..";
                            // Starts at the beginning of the string and ends after 100 characters
                            echo substr($string, 0, 90).'...<a href="questionAndAnswer">Read More</a>';
                            ?>
                        </p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="services ">
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="250">
                        <i ><img class="mosque1" style="margin-bottom: 15px; " src="{{asset('icons/mosque/mosque.ico')}}">
                            <img class="mosque2 hidden" style="margin-bottom: 15px " src="{{asset('icons/mosque/mosque2.ico')}}">
                        </i>
                        <h3>Mosques and Islamic institutions</h3>
                        <p class="hidden">
                            <?php
                            $string ="The number of mosques and Islamic institutions in Europe is estimated at thousands and offers its varied services to millions of Muslims across the continent. However, they are in constant need of continuous coordination among them at the level of religious and cultural activities, systematic educational cooperation, media communication, . The way in which Islam is represented by these institutions is very flawed, which raises a lot of misunderstandings and dissatisfaction with the official European and governmental bodies. The European Observatory for Moderate Islam aspires to bring this huge momentum of mosques and Islamic institutions to Europe in the form of a comprehensive information bank listing the data, activities and projects of each institution,
                             focusing on the moderate discourse advocated by most Muslim institutions operating in Europe.";
                            // Starts at the beginning of the string and ends after 100 characters
                            echo substr($string, 0, 90).'...<a href="mosquesAndIslamic">Read More</a>';
                            ?>
                        </p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="350">
                        <i class="fa fa-universal-access"></i>
                        <h3>Training and Human Development</h3>
                        <p class="hidden">
                            <?php
                            $string ="The training and human development mechanism is one of the most important practical mechanisms adopted by the Observatory to rehabilitate the European Muslim and the advancement of the Islamic community. The training is organized by Western and Muslim experts and specialists with high experience in the field of human development. These exercises include various fields of debt, media, education, health,
                             law and governance, benefiting the groups of imams, teachers, educators, media professionals, managers, etc..";
                            // Starts at the beginning of the string and ends after 100 characters
                            echo substr($string, 0, 80).'...<a href="training">Read More</a>';
                            ?>
                        </p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="450">
                        <i class="fa fa-book"></i>
                        <h3>Digital Library</h3>
                        <p class="hidden">
                            <?php
                            $string ="The European Observatory aims to establish a digital library that includes two types of sources, the first of which includes books, periodicals, newspapers, CDs, documentaries and educational films. The second is related to publications and publications of the Observatory in partnership with various scientific institutions, universities, research centers, experts, writers and researchers. The focus of these sources is on the European Observatory's vision of various issues of Islam and the West, such as moderation, tolerance, dialogue, innovation, human development, and so on. The digital library is accessible to various segments of society:
                             students, researchers, teachers, media professionals, imams, counselors, politicians and others.";
                            // Starts at the beginning of the string and ends after 100 characters
                            echo substr($string, 0, 100).'...<a href="digitalLibrary">Read More</a>';
                            ?>
                        </p>
                    </div>
                    <div class="item col-sm-3" data-animation-direction="from-bottom" data-animation-delay="550">
                        <i class="fa fa-male"></i>
                        <h3>Great person</h3>
                        <p class="hidden">
                            <?php
                            $string ="This angle is unique to the various leading Islamic
                             figures who have come to balance in the history of Islamic civilization
                              in ancient and modern times. They include various fields and disciplines of religion,
                               literature, philosophy, history, mathematics, medicine, physics, These figures contributed to
                               the formation of the features of Islamic civilization, and even exceeded the impact of the border to other Eastern and Western nations, which is a great cultural Islam of modern Renaissance, and the testimony of thinkers and philosophers who recognize the historical and cultural role played by Islam in the history of humanity. There are many distinguished names in our Islamic civilization which have a distinctive impact on the Western man, who has appreciation and admiration. Perhaps the work of presenting these Islamic figures objectively, smoothly and differently would know more about Islam, religion, civilization and history. The yellow platforms, whose editorial line is based on rumor, exaggeration and misinformation.
";
                            // Starts at the beginning of the string and ends after 100 characters
                            echo substr($string, 0, 115).'...<a href="greatPerson">Read More</a>';
                            ?>
                        </p>
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
