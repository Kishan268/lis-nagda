@include('frontend-layouts.main')

<div class="rev-slider">
</div>
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

            
                
<article id="post-86" class="post-86 page type-page status-publish hentry">
    <header class="entry-header">
        <h1 class="entry-title">Contact Us</h1> </header><!-- .entry-header -->
            <div class="container">
                <div class="app-title">
                 @if($message = Session::get('success'))
                        
                  <div class="alert alert-success">
                   {{ $message }}
                  </div>
                      @endif
                </div>
            </div>
    <div class="entry-content">
            <p>&nbsp;</p>
<div class="row ">
    <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.517858245568!2d75.3769729500759!3d23.469401905295474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396475731fe9cb1d%3A0xd19c766172f6c61e!2sLakshya+International+School+Nagda+Jn.+Madhya+Pradesh!5e1!3m2!1sen!2sin!4v1456996932509" width="600" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
    </div>
    {{-- <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
        <div role="form" class="wpcf7" id="wpcf7-f85-p86-o1" lang="en-US" dir="ltr">
            <div class="screen-reader-response"></div>
                <form action="{{route('save-contact-us')}}" method="post" class="wpcf7-form" novalidate="novalidate">
                    @csrf
                    <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="85" />
                        <input type="hidden" name="_wpcf7_version" value="5.0.4" />
                        <input type="hidden" name="_wpcf7_locale" value="en_US" />
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f85-p86-o1" />
                        <input type="hidden" name="_wpcf7_container_post" value="86" />
                    </div>
                        <p><label> Your Name (required)<br />
                        <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span> </label></p>
                        <p><label> Your Email (required)<br />
                        <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span> </label></p>
                        <p><label> Your Message<br />
                        <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </label></p>
                        <div class="wpcf7-form-control-wrap">
                        <div data-sitekey="6LcVxdMUAAAAAJVLCXsNHKpYeLUULkXZaSYsZEdC" class="wpcf7-form-control g-recaptcha wpcf7-recaptcha"></div>
                        <noscript>
                            <div style="width: 302px; height: 422px;">
                                <div style="width: 302px; height: 422px; position: relative;">
                                    <div style="width: 302px; height: 422px; position: absolute;">
                                        <iframe src="https://www.google.com/recaptcha/api/fallback?k=6LcVxdMUAAAAAJVLCXsNHKpYeLUULkXZaSYsZEdC" frameborder="0" scrolling="no" style="width: 302px; height:422px; border-style: none;">
                                        </iframe>
                                    </div>
                                    <div style="width: 300px; height: 60px; border-style: none; bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px; background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px;">
                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </noscript>
                    </div>
                <p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" /></p>
                <div class="wpcf7-response-output wpcf7-display-none"></div>
            </form>
        </div>
    </div> --}}
    <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
        <div role="form" {{-- class="wpcf7" id="wpcf7-f85-p86-o1" --}} lang="en-US" dir="ltr">
            <div class="screen-reader-response"></div>
                <form action="{{route('save-contact-us')}}" method="post" class="wpcf7-form" novalidate="novalidate">
                    @csrf
                   
                        <p><label> Your Name (required)<br />
                        <span class="wpcf7-form-control-wrap your-name"><input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span> </label></p>
                        <p><label> Your Email (required)<br />
                        <span class="wpcf7-form-control-wrap your-email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span> </label></p>
                        <p><label> Your Message<br />
                        <span class="wpcf7-form-control-wrap your-message"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </label></p>
                     
                <p>
                    <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" /></p>
            </form>
        </div>
    </div>
<div class="col-lg-4 col-md-12 col-xs-12 col-sm-12"></p>
<h2>Contact Details</h2>
<p><strong>School Campus : Khachrod Jaora Road Junction, Nagda, M.P.</strong></p>
<p><strong>Phone: +91-78798-22222</strong></p>
<p><strong>Email: support@lisnagda.org</strong></p>
<div class="social-icons"><i class="fa fa-facebook"></i><br />
<i class="fa fa-twitter"></i></div>
<p></div>
</div>
<p>&nbsp;</p>
</div><!-- .entry-content -->

<footer class="entry-footer">
 </footer><!-- .entry-footer -->
</article><!-- #post-## -->

</main><!-- #main -->
</div><!-- #primary -->



</div><!-- .inner-wrapper -->
</div><!-- .container -->
</div><!-- #content -->
    

@include('frontend-layouts.footer')

<!--Generated by Endurance Page Cache-->