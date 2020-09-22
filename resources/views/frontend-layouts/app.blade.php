
@extends('frontend-layouts.header')
@yield('content')

<body class="home page-template-default page page-id-5 wp-custom-logo site-layout-fluid global-layout-no-sidebar">

        <div id="page" class="container hfeed site">
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
        <div id="tophead">
        <div class="container">
            <div id="quick-contact">
                <ul>
                    <li class="quick-call"><a href="tel:917879822222">+91-78798-22222</a></li>
                        <li class="quick-email"><a href="mailto:support@lisnagda.org">support@lisnagda.org</a></li>
                </ul>
            </div>

        </div> <!-- .container -->
    </div><!--  #tophead -->

    <header id="masthead" class="site-header" role="banner"><div class="container">     
        <div class="site-branding">

            <a href="http://lisnagda.org/" class="custom-logo-link" rel="home" itemprop="url"><img width="170" height="139" src="http://lisnagda.org/wp-content/uploads/2020/01/LIS_Logo-1.png" class="custom-logo" alt="" itemprop="logo"></a>

                <div id="site-identity">
                  <p class="site-title"><a href="http://lisnagda.org/" rel="home">Lakshya International School, Nagda</a></p>

                    <p class="site-description">CBSE Affiliation No. 1031030</p>
                </div><!-- #site-identity -->
            
        </div><!-- .site-branding -->

            <div class="search-section">
                <form role="search" method="get" class="search-form" action="http://lisnagda.org/">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                </label>
                <input type="submit" class="search-submit" value="Search" />
            </form>         
        </div>
        
        </div><!-- .container -->
    </header><!-- #masthead -->    
    <div id="main-nav" class="clear-fix">
        <div class="container-fluid">
        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i>
            Menu</button>
                    <div class="wrap-menu-content">
                        <div class="menu-menu1-container">
                            <ul id="primary-menu" class="menu">
                                <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-12">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103"><a href="{{url('about-us')}}">About Us</a>
                            </li>
                        <li id="menu-item-101" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-101">
                            <a href="{{url('academics')}}">Academics</a>
                        </li>
                        <li id="menu-item-1558" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1558">
                            <a href="{{url('extra-curricular-activities')}}">Extra Curricular Activities</a>
                        </li>
                        <li id="menu-item-102" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-102">
                            <a href="{{url('admissions')}}">Admissions</a>
                        </li>
                        <li id="menu-item-1809" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1809">
                            <a href="#">CBSE Section</a>
                        <ul class="sub-menu">
                            <li id="menu-item-1847" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1847"><a href="http://lisnagda.org/cbse-information-disclosure/"><a href="{{url('cbsc-information')}}" target="_blank">CBSE Information</a></a></li>
                            <li id="menu-item-1657" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1657"><a href="{{url('committees')}}">Committees</a></li>
                            <li id="menu-item-1674" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1674"><a href="{{url('transfer-certificate')}}">Transfer Certificate</a></li>
                            <li id="menu-item-1850" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1850"><a href="{{url('auditors-report')}}">Auditor&#8217;s Report</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99">
                        <a href="{{url('contact-us')}}">Contact Us</a>
                    </li> 
                    <li id="menu-item-1053" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1053"><a href="#">More</a>
                        <ul class="sub-menu">
                            <li id="menu-item-258" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-258"><a href="{{url('gallery')}}">Gallery</a></li>
                            <li id="menu-item-861" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-861"><a href="{{url('openings')}}">Openings</a></li>
                            <li id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100"><a href="{{url('principals-message')}}">Principal’s Message</a></li>
                        </ul>
                    <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="{{url('login')}}">Login</a>
                    </li>
                </li>
            </ul>
        </div>            
    </div><!-- .menu-content -->
        </nav><!-- #site-navigation -->
       </div> <!-- .container -->
    </div> <!-- #main-nav -->
<div class="rev-slider">
    <!-- START REVOLUTION SLIDER 4.5.9 fullwidth mode -->

<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:450px;">
    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:450px;height:450px;">
<ul>   
 <!-- SLIDE  -->
    <li data-transition="boxslide" data-slotamount="7" data-masterspeed="300"  data-fstransition="slideleft" data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off" >
        <!-- MAIN IMAGE -->
        <img src="http://lisnagda.org/wp-content/uploads/2017/03/LIS-BANNER-03-1.jpg"  alt="LIS-BANNER-03-1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
        <!-- LAYERS -->
    </li>
    <!-- SLIDE  -->
    <li data-transition="random,slideup" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
        <!-- MAIN IMAGE -->
        <img src="http://lisnagda.org/wp-content/uploads/2020/01/LIS-BANNER-02-1024x375.jpg"  alt="LIS-BANNER-02-1024x375"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
        <!-- LAYERS -->
    </li>
    <!-- SLIDE  -->
    <li data-transition="slidevertical,scaledownfromright" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
        <!-- MAIN IMAGE -->
        <img src="http://lisnagda.org/wp-content/uploads/2020/01/sd1.png"  alt="sd1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
        <!-- LAYERS -->
    </li>
    <!-- SLIDE  -->
    <li data-transition="random" data-slotamount="7"  data-saveperformance="off" >
        <!-- MAIN IMAGE -->
        <img src="http://lisnagda.org/wp-content/uploads/2020/01/fdf.png"  alt="fdf"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
        <!-- LAYERS -->
    </li>
</ul>
<div class="tp-bannertimer"></div>  </div>
</div>
     <script type="text/javascript">

                /******************************************
                    -   PREPARE PLACEHOLDER FOR SLIDER  -
                ******************************************/
                var setREVStartSize = function() {
                    var tpopt = new Object();
                        tpopt.startwidth = 960;
                        tpopt.startheight = 450;
                        tpopt.container = jQuery('#rev_slider_1_1');
                        tpopt.fullScreen = "off";
                        tpopt.forceFullWidth="off";

                    tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
                };
                /* CALL PLACEHOLDER */
                setREVStartSize();
                var tpj=jQuery;
                tpj.noConflict();
                var revapi1;
                tpj(document).ready(function() {
                if(tpj('#rev_slider_1_1').revolution == undefined)
                    revslider_showDoubleJqueryError('#rev_slider_1_1');
                else
                   revapi1 = tpj('#rev_slider_1_1').show().revolution(
                    {
                        dottedOverlay:"none",
                        delay:9000,
                        startwidth:960,
                        startheight:450,
                        hideThumbs:200,

                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:4,

                        navigationType:"bullet",
                        navigationArrows:"solo",
                        navigationStyle:"round",

                        touchenabled:"on",
                        onHoverStop:"on",

                        swipe_velocity: 0.7,
                        swipe_min_touches: 1,
                        swipe_max_touches: 1,
                        drag_block_vertical: false,
                        
                        
                        keyboardNavigation:"off",

                        navigationHAlign:"center",
                        navigationVAlign:"bottom",
                        navigationHOffset:0,
                        navigationVOffset:20,

                        soloArrowLeftHalign:"left",
                        soloArrowLeftValign:"center",
                        soloArrowLeftHOffset:20,
                        soloArrowLeftVOffset:0,

                        soloArrowRightHalign:"right",
                        soloArrowRightValign:"center",
                        soloArrowRightHOffset:20,
                        soloArrowRightVOffset:0,

                        shadow:0,
                        fullWidth:"on",
                        fullScreen:"off",

                        spinner:"spinner3",

                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,

                        shuffle:"off",

                        autoHeight:"off",
                        forceFullWidth:"off",
                        
                        
                        
                        hideThumbsOnMobile:"off",
                        hideNavDelayOnMobile:1500,
                        hideBulletsOnMobile:"off",
                        hideArrowsOnMobile:"off",
                        hideThumbsUnderResolution:0,

                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        startWithSlide:0                    
                    });

                }); /*ready*/

            </script>
        <style type="text/css">
    #rev_slider_1_1_wrapper .tp-loader.spinner3 div { background-color: #FFFFFF !important; }
</style>
<style type="text/css">
    .rev-slider {
    margin-top: 49px;
}               
</style>
        <!-- END REVOLUTION SLIDER -->  
    </div>
    <div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
                
<article id="post-5" class="post-5 page type-page status-publish hentry">
    <header class="entry-header">
            </header><!-- .entry-header -->

    <div class="entry-content">
            <p><div class="row "><div class="col-lg-4 col-md-12 col-xs-12 col-sm-12"><span style="color: #333399;"><br />
</span></p>
<h1 style="text-align: left;"><strong>Art</strong></h1>
<div class="thumbnail-hidden"><img src="http://lisnagda.org/wp-content/uploads/2017/03/Art-300X200.jpg" class="img-responsive oscitas-res-image" alt=""></div>
<p>A well prepared Art Room that creates confidence of the student and their aptitude like drawing, painting, stoneware, models etc.</div>
<div class="col-lg-4 col-md-12 col-xs-12 col-sm-12"><span style="color: #333399;"><br />
</span></p>
<h1><strong>Theater and Drama</strong></h1>
<div class="thumbnail-hidden"><img src="http://lisnagda.org/wp-content/uploads/2017/03/drama.JPG" class="img-responsive oscitas-res-image" alt=""></div>
<p>Theater and drama classes for the students to present all aspects of theater which incorporates lighting, production, stage design and costumes.</div>
<div class="col-lg-4 col-md-12 col-xs-12 col-sm-12"><span style="color: #333399;"><br />
</span></p>
<h1 style="text-align: left;"><strong>Swimming Pool</strong></h1>
<div class="thumbnail-hidden"><img src="http://lisnagda.org/wp-content/uploads/2017/03/MT-SWIMMING-1-300x200.jpg" class="img-responsive oscitas-res-image" alt=""></div>
<div class="thumbnail-hidden">A well designed Swimming pool for both recreational and wellness purpose to keep the kids cool while empowering physical development.</div>
<p></div>
</div><br />
<img src="http://lisnagda.org/wp-content/uploads/2016/11//saparator.png"><br />
<div class="row "><div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"><span style="color: #333399;"><br />
</span></p>
<h2 style="text-align: center;"><strong>Facilities offered</strong></h2>
<p>At LIS, The prime objective is to provide an opportunity for students to build up their own particular potential. We believe in overall growth of children. While it comes to imparting knowledge, we create a platform wherein each child takes an interest in learning through experience by joy and fun.</div>
</div></p>
<p><img src="http://lisnagda.org/wp-content/uploads/2016/11//saparator.png"></p>
<div class="row "><div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
<img src="http://lisnagda.org/wp-content/uploads/2017/03/about-1.jpg" class="img-responsive oscitas-res-image" alt="">
</div>
<div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
The School is established with the goal of superior educational development of the students by enhancing their personality and developing their mind, through sharpening intellect, sustaining imagination and reinforcing their mind. The fundamental objective of the school is to create and support a teaching learning environment in which children learn, explore, discover and achieve.</div>
</div>
<p><img src="http://lisnagda.org/wp-content/uploads/2016/11/saparator.png"></p>
                <br>    
            </div><!-- .entry-content -->
    <footer class="entry-footer">
            </footer><!-- .entry-footer -->
</article><!-- #post-## -->

        </main><!-- #main -->
    </div><!-- #primary -->

</div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content -->
    <div  id="footer-widgets" ><div class="container"><div class="inner-wrapper"><div class="footer-active-4 footer-widget-area"><aside id="widget_tlp_port_owl_carousel-4" class="widget widget_tlp_port_owl_carousel"><h3 class="widget-title">     Facilities</h3>            <div class="tlp-portfolio">
            <div class='rt-container-fluid tlp-portfolio'><div class="row"><div id='widget_tlp_port_owl_carousel-4-port-carousel' class='slider'><div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'><div class="tlp-portfolio-item"><div class="tlp-portfolio-thum tlp-item"><img class="img-responsive" src="http://lisnagda.org/wp-content/uploads/2016/11/02222-350x250.jpg" alt="Transport"/><div class="tlp-overlay"><p class="link-icon"><a class="tlp-zoom" href="http://lisnagda.org/wp-content/uploads/2016/11/02222.jpg"><i class="fa fa-search-plus"></i></a><a target="_blank" href="http://lisnagda.org/portfolio/transport/"><i class="fa fa-external-link"></i></a></p></div></div><div class="tlp-content"><div class="tlp-content-holder"><h3><a href="http://lisnagda.org/portfolio/transport/">Transport</a></h3><p> </p></div></div></div></div><div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'><div class="tlp-portfolio-item"><div class="tlp-portfolio-thum tlp-item"><img class="img-responsive" src="http://lisnagda.org/wp-content/uploads/2016/11/Computer-Lab-Pic-300x250.jpg" alt="Computer Lab"/><div class="tlp-overlay"><p class="link-icon"><a class="tlp-zoom" href="http://lisnagda.org/wp-content/uploads/2016/11/Computer-Lab-Pic.jpg"><i class="fa fa-search-plus"></i></a><a target="_blank" href="http://lisnagda.org/portfolio/computer-lab/"><i class="fa fa-external-link"></i></a></p></div></div><div class="tlp-content"><div class="tlp-content-holder"><h3><a href="http://lisnagda.org/portfolio/computer-lab/">Computer Lab</a></h3><p> </p></div></div></div></div><div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'><div class="tlp-portfolio-item"><div class="tlp-portfolio-thum tlp-item"><img class="img-responsive" src="http://lisnagda.org/wp-content/uploads/2016/11/Library-Pic-2-300x250.jpg" alt="Library"/><div class="tlp-overlay"><p class="link-icon"><a class="tlp-zoom" href="http://lisnagda.org/wp-content/uploads/2016/11/Library-Pic-2.jpg"><i class="fa fa-search-plus"></i></a><a target="_blank" href="http://lisnagda.org/portfolio/library/"><i class="fa fa-external-link"></i></a></p></div></div><div class="tlp-content"><div class="tlp-content-holder"><h3><a href="http://lisnagda.org/portfolio/library/">Library</a></h3><p> </p></div></div></div></div><div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'><div class="tlp-portfolio-item"><div class="tlp-portfolio-thum tlp-item"><img class="img-responsive" src="http://lisnagda.org/wp-content/uploads/2016/11/LIS-BANNER-02-350x250-300x250.jpg" alt="Classroom"/><div class="tlp-overlay"><p class="link-icon"><a class="tlp-zoom" href="http://lisnagda.org/wp-content/uploads/2016/11/LIS-BANNER-02-350x250.jpg"><i class="fa fa-search-plus"></i></a><a target="_blank" href="http://lisnagda.org/portfolio/classroom/"><i class="fa fa-external-link"></i></a></p></div></div><div class="tlp-content"><div class="tlp-content-holder"><h3><a href="http://lisnagda.org/portfolio/classroom/">Classroom</a></h3><p> </p></div></div></div></div><div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'><div class="tlp-portfolio-item"><div class="tlp-portfolio-thum tlp-item"><img class="img-responsive" src="http://lisnagda.org/wp-content/uploads/2016/11/drama-300x250.jpg" alt="Theatre and Drama"/><div class="tlp-overlay"><p class="link-icon"><a class="tlp-zoom" href="http://lisnagda.org/wp-content/uploads/2016/11/drama.jpg"><i class="fa fa-search-plus"></i></a><a target="_blank" href="http://lisnagda.org/portfolio/theatre-and-drama/"><i class="fa fa-external-link"></i></a></p></div></div><div class="tlp-content"><div class="tlp-content-holder"><h3><a href="http://lisnagda.org/portfolio/theatre-and-drama/">Theatre and Drama</a></h3><p> </p></div></div></div></div>
        </div>
        </div>
        </div>            
        </div>

            </aside>
        </div><!-- .footer-widget-area -->
        <div class="footer-active-4 footer-widget-area">
            <aside id="text-10" class="widget widget_text">
                <h3 class="widget-title">Social Icons</h3>         
                <div class="textwidget"><p><i class="fa fa-facebook"></i> <i class="fa fa-twitter"></i><br />
                We provide best education and facilities to the students, to make them achieve new landmarks and success in various fields.</p>
                </div>
        </aside>
    </div><!-- .footer-widget-area -->
    <div class="footer-active-4 footer-widget-area">
        <aside id="text-11" class="widget widget_text">
            <h3 class="widget-title">About LIS</h3>            
            <div class="textwidget">
                <p>Lakshya International school (LIS) Nagda is an  English medium, coeducational, day cum residential school founded in 2015 by the Lakshya Shiksha Avam Unnati Samiti. The school is affiliated to CBSE.<br />
                At LIS we are providing world class facilities and environment for children to learn and grow.</p>
            </div>
        </aside>
    </div><!-- .footer-widget-area -->
    <div class="footer-active-4 footer-widget-area">
        <aside id="nav_menu-5" class="widget widget_nav_menu">
            <h3 class="widget-title">Quick Links</h3>
            <div class="menu-menu2-container">
                <ul id="menu-menu2" class="menu">
                    <li id="menu-item-1691" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-1691">
                        <a href="http://lisnagda.org/">Home</a>
                    </li>
        <li id="menu-item-1692" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1692">
            <a href="http://lisnagda.org/about-us/">About Us</a>
        </li>
        <li id="menu-item-1693" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1693">
            <a href="http://lisnagda.org/academics/">Academics</a>
        </li>
        <li id="menu-item-1726" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1726">
            <a href="http://lisnagda.org/auditors-report-pdf/">Admission</a>
        </li>
        <li id="menu-item-1695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1695">
            <a href="http://lisnagda.org/cbse-info/">CBSE Section</a>
        </li>
        <li id="menu-item-1696" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1696">
            <a href="http://lisnagda.org/contact-us/">Contact Us</a>
        </li>
        <li id="menu-item-1697" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1697">
            <a href="http://lisnagda.org/extra-curricular-activities/">Extra Curricular Activities</a>
        </li>
        </ul>
    </div>
</aside>
</div><!-- .footer-widget-area -->
</div><!-- .inner-wrapper -->
</div><!-- .container -->
</div>
<footer id="colophon" class="site-footer" role="contentinfo"><div class="container">    
        <div class="copyright">
            Copyright. All rights reserved.       
        </div>
          <span class="sep">  </span>
            Developed & maintained By <a href="http://www.libersolution.com/" rel="designer" target="_blank">Liber Solutions Pvt. Ltd.</a>      </div><!-- .site-info -->
            </div><!-- .container -->
        </footer><!-- #colophon -->
</div><!-- #page -->
<a href="#page" class="scrollup" id="btn-scrollup">
    <i class="fa fa-chevron-up"></i>
</a>
<!-- ngg_resource_manager_marker -->
<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"http:\/\/lisnagda.org\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}}};
/* ]]> */
</script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.0.4'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var awsmJobsPublic = {"ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","is_tax_archive":"","job_id":"0","wp_max_upload_size":"268435456","i18n":{"loading_text":"Loading...","form_error_msg":{"general":"Error in submitting your application. Please try again later!","file_validation":"The file you have selected is too large."}}};
/* ]]> */
</script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/wp-job-openings/assets/js/script.min.js?ver=1.1.2'></script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/themes/education-hub/js/skip-link-focus-fix.min.js?ver=20130115'></script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/themes/education-hub/third-party/cycle2/js/jquery.cycle2.min.js?ver=2.1.6'></script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/themes/education-hub/js/custom.min.js?ver=1.0'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var EducationHubScreenReaderText = {"expand":"<span class=\"screen-reader-text\">expand child menu<\/span>","collapse":"<span class=\"screen-reader-text\">collapse child menu<\/span>"};
/* ]]> */
</script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/themes/education-hub/js/navigation.min.js?ver=20120206'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var ajaxsearchlite = {"ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","backend_ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","js_scope":"jQuery"};
var ASL = {"ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","backend_ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","js_scope":"jQuery","detect_ajax":"0","scrollbar":"1","js_retain_popstate":"0","version":"4737","fix_duplicates":"1"};
/* ]]> */
</script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/ajax-search-lite/js/min/jquery.ajaxsearchlite.min.js?ver=4.8'></script>
<script type='text/javascript' src='http://lisnagda.org/wp-includes/js/wp-embed.min.js?ver=4.9.15'></script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/tlp-portfolio/assets/vendor/jquery.magnific-popup.min.js'></script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/tlp-portfolio/assets/vendor/owl.carousel.min.js?ver=4.9.15'></script>
<script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/tlp-portfolio/assets/js/tlpportfolio.js'></script>
<style type="text/css"></style>
<script>(function($){
$("#widget_tlp_port_owl_carousel-4-port-carousel").owlCarousel({
    // Most important owl features
    items : 1,
    paginationSpeed : 800,
    autoPlay : true,
    stopOnHover : true,
    navigation : true,
    navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    pagination : true,
    responsive: true,
    lazyLoad : true,
    autoHeight : true
});
})(jQuery)</script>

</body>
</html>

<!--Generated by Endurance Page Cache-->