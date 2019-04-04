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
    <link rel="icon" href="{{asset('template_igreja/template-vermelho/img/core-img/favicon.ico')}}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('template_igreja/template-vermelho/style.css')}}">
	
</head>

<body>
    <!-- ##### Preloader ##### -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <!-- Line -->
        <div class="line-preloader"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- ***** Navbar Area ***** -->
        <div class="crose-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="croseNav">

                        <!-- Nav brand -->
                        <a href="index.html" class="nav-brand"><img style="witdh: 120px; height: 50px;" src="{{asset('/storage/'.(($igreja->logo != null) ? 'igrejas/'.$igreja->logo : 'no-logo.jpg' ))}}" alt=""></a><h3>{{$igreja->nome}}</h3>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <?php
                                    foreach($menus as $menu){
                                        if($submenus != null && array_key_exists($menu->id, $submenus) && count($submenus[$menu->id]) > 0){ ?>
                                            <li><a href="#">{{$menu->nome}}</a>
                                                <ul class="dropdown">
                                                    <?php foreach($submenus[$menu->id] as $submenu){
                                                        if($subsubmenus != null && array_key_exists($submenu->id, $subsubmenus) && count($subsubmenus[$submenu->id]) > 0){ ?>
                                                            <li><a href="#">{{$submenu->nome}}</a>
                                                                <ul class="dropdown">
                                                                    <?php foreach($subsubmenus[$submenu->id] as $subsubmenu){
                                                                        if($subsubmenu->link != null){
                                                                            ?> <li><a href="/{{$igreja->url}}/{{$subsubmenu->link}}">{{$subsubmenu->nome}}</a></li> <?php
                                                                        }else{
                                                                            ?> <li><a href="/{{$igreja->url}}/#">{{$subsubmenu->nome}}</a></li> <?php
                                                                        }
                                                                    } ?>
                                                                </ul>
                                                            </li>
                                                        <?php }else if($submenu->link != null){
                                                            ?> <li><a href="/{{$igreja->url}}/{{$submenu->link}}">{{$submenu->nome}}</a></li> <?php
                                                        }else{
                                                            ?> <li><a href="/{{$igreja->url}}/#">{{$submenu->nome}}</a></li> <?php
                                                        }
                                                    } ?>
                                                </ul>
                                            </li>
                                            <?php
                                        }else if($menu->link != null){
                                            ?> <li><a href="/{{$igreja->url}}/{{$menu->link}}">{{$menu->nome}}</a></li> <?php
                                        }else{
                                            ?> <li><a href="/{{$igreja->url}}/#">{{$menu->nome}}</a></li> <?php
                                        }
                                    }

                                    /*$ids_modulos_permitidos = array();
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
                                    } ?>
                                    <?php if(in_array(12, $ids_modulos_permitidos) || in_array(10, $ids_modulos_permitidos) || in_array(9, $ids_modulos_permitidos)){ ?>
                                        <li><a href="#">Mídia</a>
                                            <ul class="dropdown">
                                            <?php if(in_array(12, $ids_modulos_permitidos)){
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
                                            } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if(in_array(11, $ids_modulos_permitidos)){
                                        ?>
                                        <li><a href="#">Doações</a>
                                            <ul class="dropdown">
                                            <li><a href="#">Doações</a></li>
                                            <li><a href="#">Projetos e causas</a></li>
                                            </ul>
                                            </li>
                                        <?php
                                    }*/
                                    ?>
                                </ul>

                                <?php /* ?>
                                <!-- Donate Button -->
                                <a href="/{{$igreja->url}}/login" class="btn crose-btn header-btn">Login</a>
                                <?php */ ?>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- ***** Navbar Area ***** -->
    </header>
    <!-- ##### Header Area End ##### -->

    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Copwrite Area -->
        <div class="copywrite-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center flex-wrap">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>{{$igreja->nome}}</p>
                        </div>
                    </div>

                    <!-- Footer Social Icon -->
                    <div class="col-12 col-md-6">
                        <div class="footer-social-icon">
                            <?php if($igreja->facebook != null){ ?>
                                <a href="{{$igreja->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <?php } ?>
                            <?php if($igreja->twitter != null){ ?>
                                <a href="{{$igreja->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <?php } ?>
                            <?php if($igreja->youtube != null){ ?>
                                <a href="{{$igreja->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('template_igreja/template-vermelho/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('template_igreja/template-vermelho/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('template_igreja/template-vermelho/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('template_igreja/template-vermelho/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('template_igreja/template-vermelho/js/active.js')}}"></script>
    <!-- Rocket Loader -->
    <script src="{{asset('template_igreja/template-vermelho/js/plugins/rocket-loader.min.js')}}" data-cf-settings="7039e4ca662a388f1620a4f5-|49" defer=""></script>
    
    @stack('script')
</body>

</html>