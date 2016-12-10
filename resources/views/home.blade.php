@extends('masters')

    <!-- Document Wrapper

    ============================================= -->
  @section('page')  
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        @include('header')

        <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">

            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide dark" style="background-image: url('./assets/images/slider/swiper/1.jpg');">
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
                    <div class="container clear-bottommargin clearfix">

                        <div class="row topmargin-sm clearfix">

                            <div class="col-md-4 bottommargin">
                                <i class="i-plain color i-large icon-line2-screen-desktop inline-block" style="margin-bottom: 15px;"></i>
                                <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                    <span class="before-heading">Scalable on Devices.</span>
                                    <h4>Responsive &amp; Retina</h4>
                                </div>
                                <p>Employment respond committed meaningful fight against oppression social challenges rural legal aid governance. Meaningful work, implementation, process cooperation, campaign inspire.</p>
                            </div>

                            <div class="col-md-4 bottommargin">
                                <i class="i-plain color i-large icon-line2-energy inline-block" style="margin-bottom: 15px;"></i>
                                <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                    <span class="before-heading">Smartly Coded &amp; Maintained.</span>
                                    <h4>Powerful Performance</h4>
                                </div>
                                <p>Medecins du Monde Jane Addams reduce child mortality challenges Ford Foundation. Diversification shifting landscape advocate pathway to a better life rights international. Assessment.</p>
                            </div>

                            <div class="col-md-4 bottommargin">
                                <i class="i-plain color i-large icon-line2-equalizer inline-block" style="margin-bottom: 15px;"></i>
                                <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                    <span class="before-heading">Flexible &amp; Customizable.</span>
                                    <h4>Truly Multi-Purpose</h4>
                                </div>
                                <p>Democracy inspire breakthroughs, Rosa Parks; inspiration raise awareness natural resources. Governance impact; transformative donation philanthropy, respect reproductive.</p>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="container clearfix">

                    <div class="row topmargin-lg bottommargin-sm">

                        <div class="heading-block center">
                            <h2>LEARNING MONGOLIAN MADE EASY</h2>
                            <span class="divcenter">Philanthropy convener livelihoods, initiative end hunger gender rights local. John Lennon storytelling; advocate, altruism impact catalyst.</span>
                        </div>

                        <div class="col-md-4 col-sm-6 bottommargin">

                            <div class="feature-box fbox-right topmargin" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-heart"></i></a>
                                </div>
                                <h3>Boxed &amp; Wide Layouts</h3>
                                <p>Stretch your Website to the Full Width or make it boxed to surprise your visitors.</p>
                            </div>

                            <div class="feature-box fbox-right topmargin" data-animate="fadeIn" data-delay="200">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-paper"></i></a>
                                </div>
                                <h3>Extensive Documentation</h3>
                                <p>We have covered each &amp; everything in our Docs including Videos &amp; Screenshots.</p>
                            </div>

                            <div class="feature-box fbox-right topmargin" data-animate="fadeIn" data-delay="400">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-layers"></i></a>
                                </div>
                                <h3>Parallax Support</h3>
                                <p>Display your Content attractively using Parallax Sections with HTML5 Videos.</p>
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
                                <h3>HTML5 Video</h3>
                                <p>Canvas provides support for Native HTML5 Videos that can be added to a Background.</p>
                            </div>

                            <div class="feature-box topmargin" data-animate="fadeIn" data-delay="200">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-check"></i></a>
                                </div>
                                <h3>Endless Possibilities</h3>
                                <p>Complete control on each &amp; every element that provides endless customization.</p>
                            </div>

                            <div class="feature-box topmargin" data-animate="fadeIn" data-delay="400">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-bulb"></i></a>
                                </div>
                                <h3>Light &amp; Dark Color Schemes</h3>
                                <p>Change your Website's Primary Scheme instantly by simply adding the dark class.</p>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="container clearfix">

                    <div class="col_one_third">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-monitor"></i></a>
                            </div>
                            <h3>Responsive Layout</h3>
                            <p>Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
                        </div>
                    </div>

                    <div class="col_one_third">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="200">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-eye"></i></a>
                            </div>
                            <h3>Retina Ready Graphics</h3>
                            <p>Looks beautiful &amp; ultra-sharp on Retina Displays with Retina Icons, Fonts &amp; Images.</p>
                        </div>
                    </div>

                    <div class="col_one_third col_last">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="400">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-star"></i></a>
                            </div>
                            <h3>Powerful Performance</h3>
                            <p>Optimized code that are completely customizable and deliver unmatched fast performance.</p>
                        </div>
                    </div>

                    <div class="clear"></div>

                    <div class="col_one_third">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="600">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-play"></i></a>
                            </div>
                            <h3>HTML5 Video</h3>
                            <p>Canvas provides support for Native HTML5 Videos that can be added to a Full Width Background.</p>
                        </div>
                    </div>

                    <div class="col_one_third">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="800">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-params"></i></a>
                            </div>
                            <h3>Parallax Support</h3>
                            <p>Display your Content attractively using Parallax Sections that have unlimited customizable areas.</p>
                        </div>
                    </div>

                    <div class="col_one_third col_last">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="1000">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-circle-check"></i></a>
                            </div>
                            <h3>Endless Possibilities</h3>
                            <p>Complete control on each &amp; every element that provides endless customization possibilities.</p>
                        </div>
                    </div>

                    <div class="clear"></div>

                    <div class="col_one_third bottommargin-sm">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="600">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-bulb"></i></a>
                            </div>
                            <h3>Light &amp; Dark Color Schemes</h3>
                            <p>Change your Website's Primary Scheme instantly by simply adding the dark class to the body.</p>
                        </div>
                    </div>

                    <div class="col_one_third bottommargin-sm">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="800">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-heart2"></i></a>
                            </div>
                            <h3>Boxed &amp; Wide Layouts</h3>
                            <p>Stretch your Website to the Full Width or make it boxed to surprise your visitors.</p>
                        </div>
                    </div>

                    <div class="col_one_third bottommargin-sm col_last">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="1000">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-note"></i></a>
                            </div>
                            <h3>Extensive Documentation</h3>
                            <p>We have covered each &amp; everything in our Documentation including Videos &amp; Screenshots.</p>
                        </div>
                    </div>

                    <div class="clear"></div>

                </div>

                <!-- <div class="section topmargin nobottommargin nobottomborder">
                    <div class="container clearfix">
                        <div class="heading-block center nomargin">
                            <h3>Our Latest Works</h3>
                        </div>
                    </div>
                </div>

                <div id="portfolio" class="portfolio-nomargin portfolio-notitle portfolio-full clearfix">

                    <article class="portfolio-item pf-media pf-icons">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="assets/images/portfolio/4/1.jpg" alt="Open Imagination">
                            </a>
                            <div class="portfolio-overlay">
                                <a href="assets/images/portfolio/full/1.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                            <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                        </div>
                    </article>

                    <article class="portfolio-item pf-illustrations">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="assets/images/portfolio/4/2.jpg" alt="Locked Steel Gate">
                            </a>
                            <div class="portfolio-overlay">
                                <a href="assets/images/portfolio/full/2.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single.html">Locked Steel Gate</a></h3>
                            <span><a href="#">Illustrations</a></span>
                        </div>
                    </article>

                    <article class="portfolio-item pf-graphics pf-uielements">
                        <div class="portfolio-image">
                            <a href="#">
                                <img src="assets/images/portfolio/4/3.jpg" alt="Mac Sunglasses">
                            </a>
                            <div class="portfolio-overlay">
                                <a href="http://vimeo.com/89396394" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
                                <a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single-video.html">Mac Sunglasses</a></h3>
                            <span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
                        </div>
                    </article>

                    <article class="portfolio-item pf-icons pf-illustrations">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="assets/images/portfolio/4/4.jpg" alt="Open Imagination">
                            </a>
                            <div class="portfolio-overlay" data-lightbox="gallery">
                                <a href="assets/images/portfolio/full/4.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                <a href="assets/images/portfolio/full/4-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                <a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single-gallery.html">Morning Dew</a></h3>
                            <span><a href="#"><a href="#">Icons</a>, <a href="#">Illustrations</a></span>
                        </div>
                    </article>

                    <article class="portfolio-item pf-uielements pf-media">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="assets/images/portfolio/4/5.jpg" alt="Console Activity">
                            </a>
                            <div class="portfolio-overlay">
                                <a href="assets/images/portfolio/full/5.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single.html">Console Activity</a></h3>
                            <span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
                        </div>
                    </article>

                    <article class="portfolio-item pf-graphics pf-illustrations">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="assets/images/portfolio/4/6.jpg" alt="Open Imagination">
                            </a>
                            <div class="portfolio-overlay" data-lightbox="gallery">
                                <a href="assets/images/portfolio/full/6.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                <a href="assets/images/portfolio/full/6-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                <a href="assets/images/portfolio/full/6-2.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                <a href="assets/images/portfolio/full/6-3.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                <a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single-gallery.html">Shake It!</a></h3>
                            <span><a href="#">Illustrations</a>, <a href="#">Graphics</a></span>
                        </div>
                    </article>

                    <article class="portfolio-item pf-uielements pf-icons">
                        <div class="portfolio-image">
                            <a href="portfolio-single-video.html">
                                <img src="assets/images/portfolio/4/7.jpg" alt="Backpack Contents">
                            </a>
                            <div class="portfolio-overlay">
                                <a href="http://www.youtube.com/watch?v=kuceVNBTJio" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
                                <a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single-video.html">Backpack Contents</a></h3>
                            <span><a href="#">UI Elements</a>, <a href="#">Icons</a></span>
                        </div>
                    </article>

                    <article class="portfolio-item pf-graphics">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="assets/images/portfolio/4/8.jpg" alt="Sunset Bulb Glow">
                            </a>
                            <div class="portfolio-overlay">
                                <a href="assets/images/portfolio/full/8.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single.html">Sunset Bulb Glow</a></h3>
                            <span><a href="#">Graphics</a></span>
                        </div>
                    </article>

                </div> -->

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
                                        <p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
                                        <div class="testi-meta">
                                            Steve Jobs
                                            <span>Apple Inc.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="testi-image">
                                        <a href="#"><img src="assets/images/testimonials/2.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
                                        <div class="testi-meta">
                                            Collis Ta'eed
                                            <span>Envato Inc.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="testi-image">
                                        <a href="#"><img src="assets/images/testimonials/1.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
                                        <div class="testi-meta">
                                            John Doe
                                            <span>XYZ Inc.</span>
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
                            <h3>DID YOU KNOW?</h3>
                        </div>
                    </div>
                </div>

                <div class="container clear-bottommargin clearfix">
                   <div class="section notopborder topmargin-sm bottommargin-sm noborder nobg">

                    <div class="container clearfix">

                        <div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
                            <i class="i-plain i-xlarge divcenter nobottommargin icon-code"></i>
                            <div class="counter counter-lined"><span data-from="100" data-to="846" data-refresh-interval="50" data-speed="2000"></span>K+</div>
                            <h5>Lines of Codes</h5>
                        </div>

                        <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
                            <i class="i-plain i-xlarge divcenter nobottommargin icon-magic"></i>
                            <div class="counter counter-lined"><span data-from="3000" data-to="15360" data-refresh-interval="100" data-speed="2500"></span>+</div>
                            <h5>KBs of HTML Files</h5>
                        </div>

                        <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
                            <i class="i-plain i-xlarge divcenter nobottommargin icon-file-text"></i>
                            <div class="counter counter-lined"><span data-from="10" data-to="386" data-refresh-interval="25" data-speed="3500"></span>*</div>
                            <h5>No. of Templates</h5>
                        </div>

                        <div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
                            <i class="i-plain i-xlarge divcenter nobottommargin icon-time"></i>
                            <div class="counter counter-lined"><span data-from="60" data-to="1200" data-refresh-interval="30" data-speed="2700"></span>+</div>
                            <h5>Hours of Coding</h5>
                        </div>

                    </div>

                </div>
                </div>

            
            

            </div>

        </section><!-- #content end -->

        <!-- Footer
        ============================================= -->
        @include('footer')

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
   @endsection 