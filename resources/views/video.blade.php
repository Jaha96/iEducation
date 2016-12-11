@extends('masters')
    @section('page')
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        @include('header')

        <!-- Page Title
        ============================================= -->
        <section id="page-title" class="page-title-parallax page-title-dark page-title-video">

            <div class="video-wrap">
                <video poster="assets/images/videos/explore-poster.jpg" preload="auto" loop autoplay muted>
                    <source src='assets/images/videos/explore.mp4' type='video/mp4' />
                    <source src='assets/images/videos/explore.webm' type='video/webm' />
                </video>
                <div class="video-overlay"></div>
            </div>

            <div class="container clearfix">
                <h1>Video lesson</h1>
                
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

             <div class="container clearfix">

                    <div class="heading-block center">
                        <h1>Video lesson</h1>
                        <span>Learn Mongolian with Talk To Me In Mongolian</span>
                    </div>

                    <!-- Posts
                    ============================================= -->
                    <div id="posts">

                        <div class="entry clearfix">
                        
                            <div class="entry-title">
                                <h2><a href="blog-single.html">Welcome to Talk To Me In Mongolian</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 10th December 2016</li>
                        
                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13 Comments</a></li>
                                <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                <p>You can learn to speak Mongolian on our website, whether you are already taking formal courses or studying completely on your own. We have more than 1,000 lessons you can use right away, as well as textbooks, workbooks, e-books and video courses. The MongolianGuide team is based in Ulaanbaatar, Mongolia and is working hard every day to bring you good-quality and useful Mongolian lessons.</a>
                            </div>
                        </div>

                       <div class="entry clearfix">
                            <div class="entry-image">
                                <iframe src="http://player.vimeo.com/video/87701971" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                           
                        </div>

                    </div><!-- #posts end -->

                    <!-- Pagination
                    ============================================= -->
                
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