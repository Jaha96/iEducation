@extends('masters')
    @section('page')
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        @include('header')

        <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">

            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide dark" style="background-image: url('assets/images/slider/swiper/1.jpg');">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp">Welcome to Canvas</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on your own Canvas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp">Beautifully Flexible</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
                            </div>
                        </div>
                        <div class="video-wrap">
                            <video poster="assets/images/videos/explore-poster.jpg" preload="auto" loop autoplay muted>
                                <source src='assets/images/videos/explore.mp4' type='video/mp4' />
                                <source src='assets/images/videos/explore.webm' type='video/webm' />
                            </video>
                            <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="background-image: url('assets//images/slider/swiper/3.jpg'); background-position: center top;">
                        <div class="container clearfix">
                            <div class="slider-caption">
                                <h2 data-caption-animate="fadeInUp">Great Performance</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
            </div>

            <script>
                jQuery(document).ready(function($){
                    var swiperSlider = new Swiper('.swiper-parent',{
                        paginationClickable: false,
                        slidesPerView: 1,
                        grabCursor: true,
                        loop: true,
                        onSwiperCreated: function(swiper){
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 750; } else { toAnimateDelayTime = 750; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                            SEMICOLON.slider.swiperSliderMenu();
                        },
                        onSlideChangeStart: function(swiper){
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                $toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('not-animated');
                            });
                            SEMICOLON.slider.swiperSliderMenu();
                        },
                        onSlideChangeEnd: function(swiper){
                            $('#slider').find('.swiper-slide').each(function(){
                                if($(this).find('video').length > 0) { $(this).find('video').get(0).pause(); }
                                if($(this).find('.yt-bg-player').length > 0) { $(this).find('.yt-bg-player').pauseYTP(); }
                            });
                            $('#slider').find('.swiper-slide:not(".swiper-slide-active")').each(function(){
                                if($(this).find('video').length > 0) {
                                    if($(this).find('video').get(0).currentTime != 0 ) $(this).find('video').get(0).currentTime = 0;
                                }
                                if($(this).find('.yt-bg-player').length > 0) {
                                    $(this).find('.yt-bg-player').getPlayer().seekTo( $(this).find('.yt-bg-player').attr('data-start') );
                                }
                            });
                            if( $('#slider').find('.swiper-slide.swiper-slide-active').find('video').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('video').get(0).play(); }
                            if( $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').playYTP(); }

                            $('#slider .swiper-slide.swiper-slide-active [data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 300; } else { toAnimateDelayTime = 300; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                        }
                    });

                    $('#slider-arrow-left').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipePrev();
                    });

                    $('#slider-arrow-right').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipeNext();
                    });
                });
            </script>

        </section>

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">
            <div class="section nobottommargin">
                    <div class="container clear-bottommargin clearfix style="background: rgba(0, 0, 0, 0.51);" style="padding-left:150px;padding-right: 150px;">

                        <div class="row topmargin-sm clearfix">
                        <div class="col-md-12 bottommargin text-center">
                                <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                    <h4>Our Goals</h4>
                                </div>
                                <p>Our sale purpose is to provide assistance information and cultural and guidance to 
                                historical sites, museums and at venues of other significant interests. 
                                We offer free basic Mongolian furthermore language video classes.</p>
                            </div>
                        </div>
                    </div>
            </div>


                <div class="container clearfix">

                    <div class="row topmargin-lg bottommargin-sm">

                        <div class="heading-block center">
                            <h2>6 great reasons to travel Mongolia</h2>
                        </div>

                        <div class="col-md-4 col-sm-6 bottommargin">

                            <div class="feature-box fbox-right topmargin" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-heart"></i></a>
                                </div>
                                <h3>Eat the world’s weirdest breakfast</h3>
                                <p>Boodog is an ancient steppe cooking technique still used today when herdsmen find themselves far from home.</p>
                                <a href="#"  data-toggle="modal" data-target="#myModal1">See More</a>
                            </div>
                        <!-- Modal -->
            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            <img src="assets/images/reasons/1.jpg">
                            <h5 style="padding-top: 20px">Boodog is an ancient steppe cooking technique still used today when herdsmen find themselves far from home.</h5><p>

An animal – usually a marmot – is sliced open and stuffed with river stones heated on a fire, creating a primeval pressure cooker (they have been known to explode on occasion). The fur is then singed off and the meat carved up to eat. If you’re lucky you might get treated to this, ahem, delicacy as the morning sun warms your ger. It’s the preserve of men, which is hardly surprising – there’s no washing-up. A posher version is the khorkhog – a goat cooked with hot stones inside a milk churn.
</p>
                        </div>
                    </div>
                </div>
            </div>

                            <div class="feature-box fbox-right topmargin" data-animate="fadeIn" data-delay="200">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-paper"></i></a>
                                </div>
                                <h3>Go glamping</h3>
                                <p>Mongolian ger.</p>
                                <a href="#"  data-toggle="modal" data-target="#myModal2">See More</a>
                            </div>

                        <!-- Modal -->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            <img src="assets/images/reasons/2.jpg">
                            <h5 style="padding-top: 20px">Mongolian ger</h5>
                            <p>
Sleeping in a rough-and-ready Mongolian ger is a quintessential grassland experience, but a growing number of tour operators are establishing sustainable, nomad-run ger camps that target the posh adventurer with innovative luxuries. Nomadic Journeys operates gercamps at pristine wilderness sites that feature heated eco-showers, hand-painted beds with thick yak’s wool blankets, and even a sauna ger. For the truly adventurous, they’ll open up an airstrip and fly people into the great Mongolian void – 365 degrees of pristine emptiness, and it’s all yours.
</p>
                        </div>
                    </div>
                </div>
            </div>

                            <div class="feature-box fbox-right topmargin" data-animate="fadeIn" data-delay="400">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-layers"></i></a>
                                </div>
                                <h3>Get spiritual</h3>
                                <p>The Erdene Zuu Khiid monastery, Mongolia's most important Buddhist site</p>
                                <a href="#"  data-toggle="modal" data-target="#myModal3">See More</a>
                            </div>
                            <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            <img src="assets/images/reasons/3.jpg">
                            <h5 style="padding-top: 20px">The Erdene Zuu Khiid monastery, Mongolia's most important Buddhist site</h5>
                            <p>The Erdene Zuu Khiid monastery, Mongolia's most important Buddhist site 
 (Buddhism came to Mongolia via Nepal and China), was constructed out of the rubble of Chinggis Khan’s capital, Karakorum. But the country’s far older shamanistic tradition reveals itself on crags and hilltops –heaps of stones called ovoos are laced with horse skulls and strips of blue cloth, the colour symbolising sky worship. A few days on the steppe and you start to understand: the green grassland is a constant – it’s the ever-changing ‘eternal blue sky’, with its puffy banks of buffeting clouds, rain, wind and azure stillness, that lends form to every vista.
</p>
                        </div>
                    </div>
                </div>
            </div>

                        </div>

                        <div class="col-md-4 hidden-sm bottommargin center">
                            <img src="assets/images/services/iphone7.png" alt="iphone 2">
                        </div>

                        <div class="col-md-4 col-sm-6 bottommargin">

                            <div class="feature-box topmargin" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-power"></i></a>
                                </div>
                                <h3>Sip the milk of the horse</h3>
                                <p>Lip-puckeringly sour, it’s an acquired taste, but the locals live by it. Airag is the tonic of weddings, funerals, and frankly any other excuse for a knees-up.</p>
                                <a href="#"  data-toggle="modal" data-target="#myModal4">See More</a>
                            </div>
                             <!-- Modal -->
            <div class="modal fade" id="myModal4" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            <img src="assets/images/reasons/4.jpg">
                            <h5 style="padding-top: 20px">Lip-puckeringly sour, it’s an acquired taste, but the locals live by it. Airag is the tonic of weddings, funerals, and frankly any other excuse for a knees-up.</h5>
                            <p>In the countryside, little girls in frilly dresses sit by the roadside hawking plastic bottles of airag – horse’s milk left to ferment outside a ger in a leather bag until it becomes alcoholic. Lip-puckeringly sour, it’s an acquired taste, but the locals live by it. Airag is the tonic of weddings, funerals, and frankly any other excuse for a knees-up. One reason for producing airag is that the fermentation process reduces the high levels of lactose (a natural laxative) found in mare’s milk.</p>
                        </div>
                    </div>
                </div>
            </div>

                            <div class="feature-box topmargin" data-animate="fadeIn" data-delay="200">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-check"></i></a>
                                </div>
                                <h3>Munch on mutton</h3>
                                <p>Dairy product</p>
                                <a href="#"  data-toggle="modal" data-target="#myModal5">See More</a>
                            </div>
                                            <!-- Modal -->
            <div class="modal fade" id="myModal5" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            <img src="assets/images/reasons/5.jpg">
                            <h5 style="padding-top: 20px">Munch on mutton</h5>
                            <p>You can eat everything from Asian fusion to KFC in Ulaanbaatar, but outside the capital, the flesh (and milk) of the sheep and goat are staples. After a summer ‘white season’ of mostly dairy foods, Mongolians quench their ‘meat hunger’ with mutton – boiled, fried or cooked in dumplings called buuz or pastries known as khuushuur. Milk is heated to make a clotted cream called orom, spread thick and yellow over slabs of Russian bread, and made into cheese curds called as aaruul, like rock-hard, lemony gobstoppers.</p>
                        </div>
                    </div>
                </div>
            </div>
                            <div class="feature-box topmargin" data-animate="fadeIn" data-delay="400">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-bulb"></i></a>
                                </div>
                                <h3>Explore the capital</h3>
                                <p>Originally a sort of mobile yurt monastery, Ulaanbaatar has become Mongolia’s only true city.</p>
                                <a href="#"  data-toggle="modal" data-target="#myModal6">See More</a>
                            </div>
                                                      <!-- Modal -->
            <div class="modal fade" id="myModal6" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            <img src="assets/images/reasons/6.jpg">
                            <h5 style="padding-top: 20px">Explore the capital</h5>
                            <p>Originally a sort of mobile yurt monastery, Ulaanbaatar has become Mongolia’s only true city.

 Best visited during the brief summer season, it has a curious, weather-worn appeal – a muddle of crumbling Soviet-era apartments, ger ghettos and shiny Chinese-built high-rises. Recently, a cafe culture has taken hold, complemented by some excellent restaurants, cashmere fashions, a monument to the Beatles, and, oddly, one of the finest LEGO shops outside Denmark. Culturally, the ramshackle Choijin Lama Temple presents gruesome murals of Buddhist hell, while at the State Youth & Children's Theatre, the Tumen Ekh ensemble specialises in the stirring art of throat-singing, the epic ‘long song’, shamanist dancing and contortionism.
</p>
                        </div>
                    </div>
                </div>
            </div>

                        </div>

                    </div>

                </div>


                

               

                <script type="text/javascript">

                    jQuery(window).load(function(){

                        var $container = $('#portfolio');

                        $container.isotope({
                            transitionDuration: '0.65s',
                            masonry: {
                                columnWidth: $container.find('.portfolio-item:not(.wide)')[0]
                            }
                        });

                        $('#page-menu a').click(function(){
                            $('#page-menu li').removeClass('current');
                            $(this).parent('li').addClass('current');
                            var selector = $(this).attr('data-filter');
                            $container.isotope({ filter: selector });
                            return false;
                        });

                        $(window).resize(function() {
                            $container.isotope('layout');
                        });

                    });

                </script>

                <div class="clear"></div>

                <a href="portfolio.html" class="button button-full button-dark center tright bottommargin-lg">
                    <div class="container clearfix">
                        More than 100+ predefined Portfolio Grid Layouts. <strong>See More</strong> <i class="icon-caret-right" style="top:4px;"></i>
                    </div>
                </a>

                <div class="container clearfix">

                    <div class="col_one_third bottommargin-sm center">
                        <img data-animate="fadeInLeft" src="assets/images/services/iphone6.png" alt="Iphone">
                    </div>

                    <div class="col_two_third bottommargin-sm col_last">

                        <div class="heading-block topmargin-sm">
                            <h3>Optimized for Mobile &amp; Touch Enabled Devices.</h3>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero quod consequuntur quibusdam, enim expedita sed quia nesciunt incidunt accusamus necessitatibus modi adipisci officia libero accusantium esse hic, obcaecati, ullam, laboriosam!</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti vero, animi suscipit id facere officia. Aspernatur, quo, quos nisi dolorum aperiam fugiat deserunt velit rerum laudantium cum magnam.</p>

                        <a href="#" class="button button-border button-dark button-rounded button-large noleftmargin topmargin-sm">Learn more</a>

                    </div>

                </div>

                <div class="section parallax dark nobottommargin" style="background-image: url('assets/images/services/home-testi-bg.jpg'); padding: 100px 0;" data-stellar-background-ratio="0.4">

                    <div class="heading-block center">
                        <h3>What Clients Say?</h3>
                    </div>

                    <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
                        <div class="flexslider">
                            <div class="slider-wrap">
                                <div class="slide">
                                    <div class="testi-image">
                                        <a href="#"><img src="assets/images/testimonials/3.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>“It isn’t a circus or a professional event. This is their tradition. They are proud of what they do, their culture and their heritage.”</p>
                                        <div class="testi-meta">
                                            Craig Smith
                                            <span>photographer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="testi-image">
                                        <a href="#"><img src="assets/images/testimonials/2.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>“I still haven’t been to Mongolia. I want to ride a horse across the Mongolian steppes and try to imagine what it was like to be in Genghis Khan’s horde.”</p>
                                        <div class="testi-meta">
                                            Bill clinton
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="testi-image">
                                        <a href="#"><img src="assets/images/testimonials/1.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p> “No matter how much one reads about the tradition by which strangers are welcomed into a random ger, it is remarkable to experience.”</p>
                                        <div class="testi-meta">
                                            Joe Rohde
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="section notopmargin notopborder">
                    <div class="container clearfix">
                        <div class="heading-block center nomargin">
                            <h3>Latest from the Blog</h3>
                        </div>
                    </div>
                </div>

                <div class="container clear-bottommargin clearfix">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 bottommargin">
                            <div class="ipost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img class="image_fade" src="assets/images/magazine/thumb/1.jpg" alt="Image"></a>
                                </div>
                                <div class="entry-title">
                                    <h3><a href="blog-single.html">Bloomberg smart cities; change-makers economic security</a></h3>
                                </div>
                                <ul class="entry-meta clearfix">
                                    <li><i class="icon-calendar3"></i> 13th Jun 2014</li>
                                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 53</a></li>
                                </ul>
                                <div class="entry-content">
                                    <p>Prevention effect, advocate dialogue rural development lifting people up community civil society. Catalyst, grantees leverage.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 bottommargin">
                            <div class="ipost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img class="image_fade" src="assets/images/magazine/thumb/2.jpg" alt="Image"></a>
                                </div>
                                <div class="entry-title">
                                    <h3><a href="blog-single.html">Medicine new approaches communities, outcomes partnership</a></h3>
                                </div>
                                <ul class="entry-meta clearfix">
                                    <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 17</a></li>
                                </ul>
                                <div class="entry-content">
                                    <p>Cross-agency coordination clean water rural, promising development turmoil inclusive education transformative community.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 bottommargin">
                            <div class="ipost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img class="image_fade" src="assets/images/magazine/thumb/3.jpg" alt="Image"></a>
                                </div>
                                <div class="entry-title">
                                    <h3><a href="blog-single.html">Significant altruism planned giving insurmountable challenges liberal</a></h3>
                                </div>
                                <ul class="entry-meta clearfix">
                                    <li><i class="icon-calendar3"></i> 30th Dec 2014</li>
                                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
                                </ul>
                                <div class="entry-content">
                                    <p>Micro-finance; vaccines peaceful contribution citizens of change generosity. Measures design thinking accelerate progress medical initiative.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 bottommargin">
                            <div class="ipost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img class="image_fade" src="assets/images/magazine/thumb/4.jpg" alt="Image"></a>
                                </div>
                                <div class="entry-title">
                                    <h3><a href="blog-single.html">Compassion conflict resolution, progressive; tackle</a></h3>
                                </div>
                                <ul class="entry-meta clearfix">
                                    <li><i class="icon-calendar3"></i> 15th Jan 2014</li>
                                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 54</a></li>
                                </ul>
                                <div class="entry-content">
                                    <p>Community health workers best practices, effectiveness meaningful work The Elders fairness. Our ambitions local solutions globalization.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                

            </div>

        </section><!-- #content end -->


                <div class="row clearfix bottommargin-lg common-height">

                    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #515875;">
                        <div>
                            <i class="i-plain i-xlarge divcenter icon-line2-directions"></i>
                            <div class="counter counter-lined"><span data-from="100" data-to="846" data-refresh-interval="50" data-speed="2000"></span>K</div>
                            <h5>Lines of Codes</h5>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #576F9E;">
                        <div>
                            <i class="i-plain i-xlarge divcenter icon-line2-graph"></i>
                            <div class="counter counter-lined"><span data-from="3000" data-to="21500" data-refresh-interval="100" data-speed="2500"></span></div>
                            <h5>KBs of HTML Files</h5>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #6697B9;">
                        <div>
                            <i class="i-plain i-xlarge divcenter icon-line2-layers"></i>
                            <div class="counter counter-lined"><span data-from="10" data-to="408" data-refresh-interval="25" data-speed="3500"></span></div>
                            <h5>No. of Templates</h5>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #88C3D8;">
                        <div>
                            <i class="i-plain i-xlarge divcenter icon-line2-clock"></i>
                            <div class="counter counter-lined"><span data-from="60" data-to="1400" data-refresh-interval="30" data-speed="2700"></span></div>
                            <h5>Hours of Coding</h5>
                        </div>
                    </div>

                </div>
        <!-- Footer
        ============================================= -->
       @include('footer')

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    @endsection