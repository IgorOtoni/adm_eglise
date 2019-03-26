<!DOCTYPE html>
<html class="no-js" lang="pt">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Native Church</title>
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
                    <div class="col-md-8 col-sm-6 col-xs-4">
                    <ul class="top-navigation hidden-sm hidden-xs">
                        <h4>{{$igreja->nome}}</h4>
                    </ul>
                    <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a> </div>
                    <div class="col-md-4 col-sm-6 col-xs-8">
                    <h1 class="logo"> <a href="#"><img style="witdh: 100px; height: 50px;" src="{{asset('/storage/'.(($igreja->logo != null) ? 'igrejas/'.$igreja->logo : 'no-logo.jpg' ))}}" alt="Logo"></a> </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-wrapper">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <nav class="navigation">
                    <ul class="sf-menu">
                    <li><a href="#" style="background-color: #007F7B; border-radius: 2px; color: honeydew;">Login</a></li>
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
                            <li><a href="#">Visite nos</a></li>
                            <li><a href="#">Visões e valores</a></li>
                            <li><a href="#">Ministros</a></li>
                            <li><a href="#">Contato</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    if(in_array(5, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="#">Eventos</a>
                            <ul class="dropdown">
                            <li><a href="#">Events fixos</a></li>
                            <li><a href="#">Linha do tempo</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    if(in_array(5, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="sermons.html">Sermões</a></li><?php
                    }
                    if(in_array(10, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="gallery-2cols-pagination.html">Galeria</a></li>
                        <?php
                    }
                    if(in_array(9, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="blog-masonry.html">Notícias</a></li>
                        <?php
                    }
                    if(in_array(11, $ids_modulos_permitidos)){
                        ?>
                        <li><a href="causes.html">Doações</a>
                            <ul class="dropdown">
                            <li><a href="causes.html">Doações para congregação</a></li>
                            <li><a href="causes-grid.html">Projetos e causas</a></li>
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
                <div class="social-icons"> <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a> <a href="http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a> <a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a> <a href="http://www.pinterest.com/" target="_blank"><i class="fa fa-youtube"></i></a> <a href="#"><i class="fa fa-rss"></i></a> </div>
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
</body>
</html>