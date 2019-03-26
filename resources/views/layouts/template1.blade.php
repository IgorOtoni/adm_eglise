<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{asset('template_igreja/template-padrao/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template_igreja/template-padrao/css/bootstrap-rtl.min.css" rel="stylesheet')}}" type="text/css">
    <link href="{{asset('template_igreja/template-padrao/plugins/mediaelement/mediaelementplayer.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template_igreja/template-padrao/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template_igreja/template-padrao/css/rtl.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template_igreja/template-padrao/plugins/prettyphoto/css/prettyPhoto.css')}}" rel="stylesheet" type="text/css">
    <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie8.css" media="screen" /><![endif]-->
    <!-- Color Style -->
    <link href="{{asset('template_igreja/template-padrao/colors/color1.css')}}" rel="stylesheet" type="text/css"> 
    <link href="{{asset('template_igreja/template-padrao/css/custom.css')}}" rel="stylesheet" type="text/css">
    <!-- SCRIPTS
    ================================================== -->
    <script src="{{asset('template_igreja/template-padrao/js/modernizr.js')}}"></script><!-- Modernizr -->

</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->
    <div class="body"> 
        <!-- Start Site Header -->
        <header class="site-header">
        <div class="topbar">
            <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-8">
                <h1 class="logo"> <a href="index.html"><img style="witdh: 100px; height: 50px;" id="logo" src="{{asset('/storage/'.(($igreja->logo != null) ? 'igrejas/'.$igreja->logo : 'no-logo.jpg' ))}}" alt="Logo"></a> </h1>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-4">
                <ul class="top-navigation hidden-sm hidden-xs">
                    <li><a href="plan-visit.html"><h3>{{$igreja->nome}}</h3></a></li>
                </ul>
                <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a> </div>
            </div>
            </div>
        </div>
        <div class="main-menu-wrapper">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <nav class="navigation">
                    <ul class="sf-menu">
                    <li><a href="about.html">About Us</a>
                        <ul class="dropdown">
                        <li><a href="about.html">Overview</a></li>
                        <li><a href="contact.html">Where we meet</a></li>
                        <li><a href="our-staff.html">Our Staff</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </li>
                    <li><a href="events.html">Events</a>
                        <ul class="dropdown">
                        <li><a href="events.html">Events Listing</a></li>
                        <li><a href="events-timeline.html">Events Timeline</a></li>
                        <li><a href="google-calendar.html">Google Calender</a></li>
                        <li><a href="events-calendar.html">Events Calender</a></li>
                        <li><a href="events-grid.html">Events Masonry Grid</a></li>
                        <li><a href="single-event.html">Single Event</a></li>
                        </ul>
                    </li>
                    <li><a href="sermons.html">Sermons</a>
                        <ul class="dropdown">
                        <li><a href="sermon-albums.html">Sermon Albums</a></li>
                        <li><a href="sermons.html">Sermons Archive</a></li>
                        <li><a href="single-sermon.html">Single Sermon</a></li>
                        </ul>
                    </li>
                    <li><a href="gallery-2cols-pagination.html">Gallery</a>
                        <ul class="dropdown">
                        <li><a href="gallery-2cols-pagination.html">With Pagination</a>
                            <ul class="dropdown">
                            <li><a href="gallery-2cols-pagination.html">2 Columns</a></li>
                            <li><a href="gallery-3cols-pagination.html">3 Columns</a></li>
                            <li><a href="gallery-4cols-pagination.html">4 Columns</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery-2cols-filter.html">With Filter</a>
                            <ul class="dropdown">
                            <li><a href="gallery-2cols-filter.html">2 Columns</a></li>
                            <li><a href="gallery-3cols-filter.html">3 Columns</a></li>
                            <li><a href="gallery-4cols-filter.html">4 Columns</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery-masonry.html">Masonry Grid</a></li>
                        </ul>
                    </li>
                    <li><a href="blog-masonry.html">Blog</a>
                        <ul class="dropdown">
                        <li><a href="blog-masonry.html">Masonry Blog</a></li>
                        <li><a href="blog-full-width.html">Full Width Blog</a></li>
                        <li><a href="blog-timeline.html">Timeline Blog</a></li>
                        <li><a href="blog-medium-thumbnails.html">Medium Thumbnails</a></li>
                        <li><a href="blog-post.html">Single Blog Post</a></li>
                        </ul>
                    </li>
                    <li><a href="causes.html">Causes</a>
                        <ul class="dropdown">
                        <li><a href="causes.html">Causes List</a></li>
                        <li><a href="causes-grid.html">Causes Grid</a></li>
                        <li><a href="single-cause.html">Single Cause</a></li>
                        </ul>
                        </li>
                    </ul>
                </nav>
                </div>
            </div>
            </div>
        </div>
        </header>
        @yield('content')
        <!-- Start Footer -->
        <!-- <footer class="site-footer">
            <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 widget footer-widget">
                <h4 class="footer-widget-title">About our Church</h4>
                <img src="images/logo.png" alt="Logo">
                <div class="spacer-20"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis consectetur adipiscing elit. Nulla convallis egestas rhoncus</p>
                </div>
                <div class="col-md-4 col-sm-4 widget footer-widget">
                <h4 class="footer-widget-title">Blogroll</h4>
                <ul>
                    <li><a href="index.html">Church Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="events.html">All Events</a></li>
                    <li><a href="sermons.html">Sermons Archive</a></li>
                    <li><a href="blog-masonry.html">Our Blog</a></li>
                </ul>
                </div>
                <div class="col-md-4 col-sm-4 widget footer-widget">
                <h4 class="footer-widget-title">Our Church on twitter</h4>
                <ul class="twitter-widget">
                </ul>
                </div>
            </div>
            </div>
        </footer>-->
        <footer class="site-footer-bottom">
            <div class="container">
            <div class="row">
                <div class="copyrights-col-left col-md-6 col-sm-6">
                <p>&copy; 2014 NativeChurch. All Rights Reserved</p>
                </div>
                <div class="copyrights-col-right col-md-6 col-sm-6">
                <div class="social-icons"> <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a> <a href="http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a> <a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a> <a href="http://www.pinterest.com/" target="_blank"><i class="fa fa-youtube"></i></a> <a href="#"><i class="fa fa-rss"></i></a> </div>
                </div>
            </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>

    <script src="{{asset('template_igreja/template-padrao/js/jquery-2.0.0.min.js')}}"></script> <!-- Jquery Library Call --> 
    <script src="{{asset('template_igreja/template-padrao/plugins/prettyphoto/js/prettyphoto.js')}}"></script> <!-- PrettyPhoto Plugin --> 
    <script src="{{asset('template_igreja/template-padrao/js/helper-plugins.js')}}"></script> <!-- Plugins --> 
    <script src="{{asset('template_igreja/template-padrao/js/bootstrap.js')}}"></script> <!-- UI --> 
    <script src="{{asset('template_igreja/template-padrao/js/waypoints.js')}}"></script> <!-- Waypoints --> 
    <script src="{{asset('template_igreja/template-padrao/plugins/mediaelement/mediaelement-and-player.min.js')}}"></script> <!-- MediaElements --> 
    <script src="{{asset('template_igreja/template-padrao/js/init.js')}}"></script> <!-- All Scripts --> 
    <script src="{{asset('template_igreja/template-padrao/plugins/flexslider/js/jquery.flexslider.js')}}"></script> <!-- FlexSlider --> 
    <script src="{{asset('template_igreja/template-padrao/plugins/countdown/js/jquery.countdown.min.js')}}"></script> <!-- Jquery Timer -->
</body>
</html>