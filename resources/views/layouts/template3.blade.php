<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>{{$igreja->nome}}</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('template_igreja/template-escuro/style.css')}}">
</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <div class="circle">
            <img src="{{asset('template_igreja/template-escuro/img/core-img/church.png')}}" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Navbar Area -->
        <div class="faith-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="faithNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.html"><img style="witdh: 120px; height: 50px;" src="{{asset('/storage/'.(($igreja->logo != null) ? 'igrejas/'.$igreja->logo : 'no-logo.jpg' ))}}" alt=""></a>{{$igreja->nome}}

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
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
                                        <li><a href="/{{$igreja->url}}/galeria">Galeria</a></li>
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
                                        <?php
                                    }
                                    ?>
                                </ul>

                                <!-- Donate Button -->
                                <div class="donate-btn">
                                    <a href="{{$igreja->url}}/login">Login</a>
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Main Footer Area -->
        <div class="main-footer-area section-padding-100-0 bg-img foo-bg-overlay" style="background-image: url(img/bg-img/bg-1.jpg);">
            <div class="container">
                <div class="row">

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="d-flex flex-wrap mb-100">
                            <div class="footer-widget">
                                <div class="widget-title">
                                    <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                                </div>
                                <div class="footer-social-info">
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="copywrite-text">
                                <p>{{$igreja->nome}}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Contact Us</h6>
                            </div>

                            <!-- Single Contact Area -->
                            <div class="single-contact-area mb-30">
                                <p>Address:</p>
                                <span>1481 Creekside Lane Avila <br>Beach, CA 93424 </span>
                            </div>

                            <!-- Single Contact Area -->
                            <div class="single-contact-area mb-30">
                                <p>Phone:</p>
                                <span>+53 345 7953 32453 <br>+53 345 7557 822112</span>
                            </div>

                            <!-- Single Contact Area -->
                            <div class="single-contact-area mb-30">
                                <p>Email:</p>
                                <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="641d0b111609050d08240309050d084a070b09">[email&#160;protected]</a></span>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Usefull Links</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Sermons</a></li>
                                    <li><a href="#">Ministries</a></li>
                                    <li><a href="#">Causes</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Quotes</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Why Choose us?</h6>
                            </div>
                            <p>Fusce nec ante vitae lacus aliquet vulputate. Donec scelerisque accumsan molestie. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed accumsan neque.</p>
                            <a href="#" class="btn faith-btn mt-70">Sunday Workship: 10:30 AM</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script data-cfasync="false" src="{{asset('template_igreja/template-escuro/js/plugins/email-decode.min.js')}}"></script><script src="{{asset('template_igreja/template-escuro/js/jquery/jquery-2.2.4.min.js')}}" type="dd394fb7c37d66307a7e0305-text/javascript"></script>
    <!-- Popper js -->
    <script src="{{asset('template_igreja/template-escuro/js/bootstrap/popper.min.js')}}" type="dd394fb7c37d66307a7e0305-text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('template_igreja/template-escuro/js/bootstrap/bootstrap.min.js')}}" type="dd394fb7c37d66307a7e0305-text/javascript"></script>
    <!-- All Plugins js -->
    <script src="{{asset('template_igreja/template-escuro/js/plugins/plugins.js')}}" type="dd394fb7c37d66307a7e0305-text/javascript')}}"></script>
    <script src="{{asset('template_igreja/template-escuro/js/plugins/audioplayer.js')}}" type="dd394fb7c37d66307a7e0305-text/javascript"></script>
    <!-- Active js -->
    <script src="{{asset('template_igreja/template-escuro/js/wow.min.js')}}" type="dd394fb7c37d66307a7e0305-text/javascript"></script>
    <!-- Active js -->
    <script src="{{asset('template_igreja/template-escuro/js/active.js')}}" type="dd394fb7c37d66307a7e0305-text/javascript"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="{{asset('template_igreja/template-escuro/js/plugins/js?id=UA-23581568-13')}}" type="dd394fb7c37d66307a7e0305-text/javascript"></script>
    <script type="dd394fb7c37d66307a7e0305-text/javascript">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>


<script src="{{asset('template_igreja/template-escuro/js/plugins/rocket-loader.min.js')}}" data-cf-settings="dd394fb7c37d66307a7e0305-|49" defer=""></script>
@stack('script')
</body>

</html>