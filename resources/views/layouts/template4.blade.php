<!DOCTYPE html>
<!--[if IE 7]>
<html lang="en" class="ie7 oldie"></html><![endif]--><!--[if IE 8]>
<html lang="en" class="ie8 oldie"></html><![endif]-->
<!-- [if gt IE 8] <!-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->	<html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Salsa|Jockey+One' rel='stylesheet' type='text/css'>
    <meta charset="utf-8" />	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$igreja->nome}}</title>

    <link rel="stylesheet" href="{{asset('template_igreja/template-azul/css/styles.css')}}" />
	<link rel="stylesheet" href="{{asset('template_igreja/template-azul/css/camera.css')}}" />
	<link rel="stylesheet" href="{{asset('template_igreja/template-azul/css/video-js.css')}}" />
	<link rel="stylesheet" href="{{asset('template_igreja/template-azul/css/prettyPhoto.css')}}" /><!-- HTML5 Shiv -->
    <link rel="stylesheet" href="{{asset('template_igreja/template-azul/css/flexnav.css')}}" />
    <script src="{{asset('template_igreja/template-azul/js/modernizr.custom.js')}}"></script>
	
</head>
<body class="t-blue t-pattern-1 kids-front-page t-menu-1 t-header-1 t-text-1">
	
	<div class="kids-bg-level-1">
		
		<header id="kids_header">
		
			<div class="l-page-width clearfix">
				
				<ul class="kids_social">
					<?php if($igreja->youtube != null){ ?><li class="vimeo"><a target="_blank" href="{{$igreja->youtube}}" title="Youtube"></a></li><?php } ?>
					<?php if($igreja->twitter != null){ ?><li class="twitter"><a target="_blank" href="{{$igreja->twitter}}" title="Twitter"></a></li><?php } ?>
					<?php if($igreja->facebook != null){ ?><li class="facebook"><a target="_blank" href="{{$igreja->facebook}}" title="Facebook"></a></li><?php } ?>
				</ul><!-- .kids_social -->
				<div class="kids_clear"></div>
				<div id="kids_logo_block">
					<a id="kids_logo_text" href="/{{$igreja->url}}" title="Happy Kids">
						<img style="witdh: 120px; height: 50px;" src="{{asset('/storage/'.(($igreja->logo != null) ? 'igrejas/'.$igreja->logo : 'no-logo.jpg' ))}}" alt="" />
						<h3>{{$igreja->nome}}</h3>
					</a>
				</div><!--/ #kids_logo_block-->
			
				<nav id="kids_main_nav">
					<div class="menu-button">
						<span class="menu-button-line"></span>
						<span class="menu-button-line"></span>
						<span class="menu-button-line"></span>
					</div>
					<ul class="clearfix flexnav" data-breakpoint="800">
						<?php
						foreach($menus as $menu){
							?><li><a href="{{verifica_link($menu->link, $igreja)}}">{{$menu->nome}}</a><?php
								if($submenus != null && array_key_exists($menu->id, $submenus) && count($submenus[$menu->id]) > 0){ ?>
									<ul class="dropdown">
										<?php foreach($submenus[$menu->id] as $submenu){
											?><li><a href="{{verifica_link($submenu->link, $igreja)}}">{{$submenu->nome}}</a><?php
											if($subsubmenus != null && array_key_exists($submenu->id, $subsubmenus) && count($subsubmenus[$submenu->id]) > 0){ ?>
												<ul class="dropdown">
													<?php foreach($subsubmenus[$submenu->id] as $subsubmenu){
														?> <li><a href="/{{verifica_link($subsubmenu->link, $igreja)}}">{{$subsubmenu->nome}}</a></li> <?php
													} ?>
												</ul>
											<?php
											}
											?></li><?php
										} ?>
									</ul>
									<?php
								}
							?></li><?php
						}
						?>
					</ul>
				</nav><!-- #kids_main_nav -->
				<div class="kids_clear"></div>
			</div><!--/ .l-page-width--> 
			
		</header><!--/ #kids_header-->            
		
		@yield('banner')
			
  </div><!-- .bg-level-1 -->
  
  @yield('content')

	

	<div class="kids_bottom_container">

		<div class="l-page-width clearfix">
					
			<h3 class="widget-title">{{$igreja->nome}}</h3>

		</div><!--/ l-page-width-->

    </div><!-- .kids_bottom_container -->
    
    @stack('script')

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!--[if lt IE 9]>
      <script src="js/selectivizr-and-extra-selectors.min.js"></script>
    <![endif]-->
	<script src="{{asset('template_igreja/template-azul/js/jquery-ui-1.8.16.custom.min.js')}}"></script>
    <script src="{{asset('template_igreja/template-azul/js/jquery.easing-1.3.min.js')}}"></script>
    <script src="{{asset('template_igreja/template-azul/js/camera.min.js')}}"></script>
    <script src="{{asset('template_igreja/template-azul/js/jquery.jcarousel.min.js')}}"></script>
    <script src="{{asset('template_igreja/template-azul/js/video.js')}}"></script>
    <script src="{{asset('template_igreja/template-azul/js/jquery.flexnav.min.js')}}"></script>
    <script src="{{asset('template_igreja/template-azul/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('template_igreja/template-azul/js/scripts.js')}}"></script>

    </body>
</html>