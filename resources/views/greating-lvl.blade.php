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
                <h1>VIDEO LESSON</h1>
                
                
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

             <div class="container clearfix">

                    <div class="heading-block center">
                        <h1>Video lesson</h1>
                        <span>Test Your Mongolian – Level 1 Dialog in 100% Mongolian.</span>
                    </div>

                    <!-- Posts
                    ============================================= -->
                    <div id="posts">

                        <div class="entry clearfix">
                        
                            <div class="entry-title">
                                <h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 10th February 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13 Comments</a></li>
                                <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
                                <a href="blog-single.html"class="more-link">Read More</a>
                            </div>
                        </div>

                       <div class="entry clearfix">
                            <div class="entry-image">
                                <iframe src="http://player.vimeo.com/video/87701971" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                            <div class="entry-title">
                                <h2><a href="blog-single-full.html">This is a Standard post with an Embedded Video</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 16th February 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">Videos</a>, <a href="#">News</a></li>
                                <li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 19 Comments</a></li>
                                <li><a href="#"><i class="icon-film"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis placeat quo unde reprehenderit eum facilis vitae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, reprehenderit!</p>
                                <a href="blog-single-full.html"class="more-link">Read More</a>
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