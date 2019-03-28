<!DOCTYPE html>
<html class="no-js" lang="pt">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{$igreja->nome}}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
    ================================================== -->
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
    <!-- Nivo Slider Styles -->
    <!--<link rel="stylesheet" href="{{asset('template_igreja/template-padrao/plugins/nivoslider/themes/default/default.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('template_igreja/template-padrao/plugins/nivoslider/nivo-slider.css')}}" type="text/css" media="screen" />-->
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('template_igreja/template-padrao/css/extralayers.css')}}" media="screen" />	
    <link rel="stylesheet" type="text/css" href="{{asset('template_igreja/template-padrao/plugins/rs-plugin/css/settings.css')}}" media="screen" />
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
                    <h1 class="logo"> <a href="#"><img style="witdh: 100px; height: 50px;" src="{{asset('/storage/'.(($igreja->logo != null) ? 'igrejas/'.$igreja->logo : 'no-logo.jpg' ))}}" alt="Logo"></a> </h1>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-4">
                    <ul class="top-navigation hidden-sm hidden-xs">
                        <h3>{{$igreja->nome}}</h3>
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
                    <li><a href="{{$igreja->url}}/login" style="background-color: #2F4F4F; border-radius: 2px; color: honeydew;">Login</a></li>
                    <?php
                    $ids_modulos_permitidos = array();
                    $x = 0;
                    foreach($modulos as $modulo){
                        $ids_modulos_permitidos[$x++] = $modulo->id_modulo;
                    }
                    if(in_array(8, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="#">Sobre nós</a>
                            <ul class="dropdown">
                            <li><a href="/{{$igreja->url}}/apresentacao">Visões e valores</a></li>
                            <!--<li><a href="#">Ministros</a></li>-->
                            <li><a href="/{{$igreja->url}}/contato">Contato</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    if(in_array(5, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="#">Eventos</a>
                            <ul class="dropdown">
                            <li><a href="/{{$igreja->url}}/eventosfixos">Eventos fixos</a></li>
                            <li><a href="/{{$igreja->url}}/eventos">Linha do tempo</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    if(in_array(5, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="/{{$igreja->url}}/sermoes">Sermões</a></li><?php
                    }
                    if(in_array(10, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="#">Galeria</a></li>
                        <?php
                    }
                    if(in_array(9, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="/{{$igreja->url}}/noticias">Notícias</a></li>
                        <?php
                    }
                    if(in_array(11, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="#">Doações</a>
                            <ul class="dropdown">
                            <li><a href="#">Doações para congregação</a></li>
                            <li><a href="#">Projetos e causas</a></li>
                            </ul>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>
                </nav>
                </div>
            </div>
            </div>
        </div>
        </header>
        @yield('content')
        <footer class="site-footer-bottom">
            <div class="container">
            <div class="row">
                <div class="copyrights-col-left col-md-6 col-sm-6">
                <p>{{$igreja->nome}}</p>
                </div>
                <div class="copyrights-col-right col-md-6 col-sm-6">
                <div class="social-icons"> 
                    <?php if($igreja->facebook != null){ ?>
                        <a href="{{$igreja->facebook}}" target="_blank">
                            <i class="fa fa-facebook"></i></a> 
                    <?php } ?>
                    <?php if($igreja->twitter != null){ ?>
                    <a href="{{$igreja->twitter}}" target="_blank">
                        <i class="fa fa-twitter"></i></a> 
                    <?php } ?>
                    <!--<a href="http://www.pinterest.com/" target="_blank">
                        <i class="fa fa-pinterest"></i></a>-->
                    <!--<a href="https://plus.google.com/" target="_blank">
                        <i class="fa fa-google-plus"></i></a>-->
                    <?php if($igreja->youtube != null){ ?>
                        <a href="{{$igreja->youtube}}" target="_blank">
                            <i class="fa fa-youtube"></i></a>
                    <?php } ?>
                    <!--<a href="#">
                        <i class="fa fa-rss"></i></a>--> 
                </div>
                </div>
            </div>
            </div>
        </footer>
        <!-- End Footer -->
        <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
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
    <!--<script src="{{asset('template_igreja/template-padrao/plugins/nivoslider/jquery.nivo.slider.js')}}"></script>--> <!-- NivoSlider -->
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="{{asset('template_igreja/template-padrao/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>   
    <script type="text/javascript" src="{{asset('template_igreja/template-padrao/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('.tp-banner').show().revolution(
            {
                dottedOverlay:"none",
                delay:6000,
                startwidth:1060,
                startheight:500,
                hideThumbs:200,
                
                thumbWidth:100,
                thumbHeight:50,
                thumbAmount:5,
                
                navigationType:"none",
                navigationArrows:"solo",
                navigationStyle:"preview2",
                
                touchenabled:"on",
                onHoverStop:"on",
                
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
                                        
                                        
                keyboardNavigation:"on",
                
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

                spinner:"spinner0",
                
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
        });	//ready
    </script>
    @stack('script')
</body>
</html>