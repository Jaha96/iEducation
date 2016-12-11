    @extends('masters')
    <!-- Document Wrapper
    ============================================= -->
    @section('page')
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
            

        <!-- Page Title
        ============================================= -->
        <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('./assets/images/about/parallax.jpg'); padding: 120px 0;" data-stellar-background-ratio="0.3">

            <div class="container clearfix">
                <h1>Job Openings</h1>
                <span>Join our Fabulous Team of Intelligent Individuals</span>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Jobs</li>
                </ol>
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="col_three_fifth nobottommargin">

                        <div class="fancy-title title-bottom-border">
                            <h3>Senior Python Developer</h3>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, natus voluptatibus adipisci porro magni dolore eos eius ducimus corporis quos perspiciatis quis iste, vitae autem libero ullam omnis cupiditate quam.</p>

                        <div class="accordion accordion-bg clearfix">

                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Requirements</div>
                            <div class="acc_content clearfix">
                                <ul class="iconlist iconlist-color nobottommargin">
                                    <li><i class="icon-ok"></i>B.Tech./ B.E / MCA degree in Computer Science, Engineering or a related stream.</li>
                                    <li><i class="icon-ok"></i>3+ years of software development experience.</li>
                                    <li><i class="icon-ok"></i>3+ years of Python / Java development projects experience.</li>
                                    <li><i class="icon-ok"></i>Minimum of 4 live project roll outs.</li>
                                    <li><i class="icon-ok"></i>Experience with third-party libraries and APIs.</li>
                                    <li><i class="icon-ok"></i>In depth understanding and experience  of either SDLC or PDLC.</li>
                                    <li><i class="icon-ok"></i>Good Communication Skills</li>
                                    <li><i class="icon-ok"></i>Team Player</li>
                                </ul>
                            </div>

                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>What we Expect from you?</div>
                            <div class="acc_content clearfix">
                                <ul class="iconlist iconlist-color nobottommargin">
                                    <li><i class="icon-plus-sign"></i>Design and build applications/ components using open source technology.</li>
                                    <li><i class="icon-plus-sign"></i>Taking complete ownership of the deliveries assigned.</li>
                                    <li><i class="icon-plus-sign"></i>Collaborate with cross-functional teams to define, design, and ship new features.</li>
                                    <li><i class="icon-plus-sign"></i>Work with outside data sources and API's.</li>
                                    <li><i class="icon-plus-sign"></i>Unit-test code for robustness, including edge cases, usability, and general reliability.</li>
                                    <li><i class="icon-plus-sign"></i>Work on bug fixing and improving application performance.</li>
                                </ul>
                            </div>

                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>What you've got?</div>
                            <div class="acc_content clearfix">You'll be familiar with agile practices and have a highly technical background, comfortable discussing detailed technical aspects of system design and implementation, whilst remaining business driven. With 5+ years of systems analysis, technical analysis or business analysis experience, you'll have an expansive toolkit of communication techniques to enable shared, deep understanding of financial and technical concepts by diverse stakeholders with varying backgrounds and needs. In addition, you will have exposure to financial systems or accounting knowledge.</div>

                        </div>

                        <a href="#" data-scrollto="#job-apply" class="button button-3d button-black nomargin">Apply Now</a>

                        <div class="widget subscribe-widget clearfix">
                            <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                            <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                            <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                                <div class="input-group divcenter">
                                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                                    <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">Subscribe</button>
                                    </span>
                                </div>
                            </form>
                            <script type="text/javascript">
                                jQuery("#widget-subscribe-form").validate({
                                    submitHandler: function(form) {
                                        jQuery(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                        jQuery(form).ajaxSubmit({
                                            target: '#widget-subscribe-form-result',
                                            success: function() {
                                                jQuery(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                                                jQuery('#widget-subscribe-form').find('.form-control').val('');
                                                jQuery('#widget-subscribe-form-result').attr('data-notify-msg', jQuery('#widget-subscribe-form-result').html()).html('');
                                                SEMICOLON.widget.notifications(jQuery('#widget-subscribe-form-result'));
                                            }
                                        });
                                    }
                                });
                            </script>
                        </div>

                        <div class="row">
                            <div id="comment-form">
                                {{ Form::open(['route'=> ['comments.store', $post->id], 'method'=>'POST' ]) }}

                                    
                                {{Form:close()}}
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
    @endsection
