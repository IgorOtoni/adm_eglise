@extends('layouts.template1')
@section('content')
<!-- Start Hero Slider -->
<div class="slider-rev-cont">
<div class="tp-banner-container">
    <div class="tp-banner">
        <ul style="display:none;">
            <?php
            $x = 1;
            foreach($eventos_fixos as $evento){
                ?>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="1" data-masterspeed="1000"  data-saveperformance="off" data-title="{{$x++}}">
                    <!-- MAIN IMAGE -->
                    <?php if($evento->foto != null){ ?>
                    <img src="/storage/eventos/{{$evento->foto}}"  alt="fullslide1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <?php }else{ ?>
                    <img src="/storage/no-event.jpg"  alt="fullslide1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <?php } ?>
                    <!-- LAYERS -->
        
                    <!-- LAYER NR. 1 --><!--data-end="3000"-->
                    <div class="tp-caption large_text randomrotate tp-resizeme" 
                            data-x="100" 
                            data-y="200"  
                        data-speed="300" 
                        data-start="500" 
                        data-easing="Power3.easeInOut" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-elementdelay="0.1" 
                        data-endelementdelay="0.1" 
                            
                data-endspeed="300" 
            
                        style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">{{$evento->nome}} 
                    </div>
            
                    <!-- LAYER NR. 2 --><!--data-end="4000"-->
                    <div class="tp-caption large_text randomrotate tp-resizeme" 
                            data-x="100" 
                            data-y="259"  
                        data-speed="300" 
                        data-start="800" 
                        data-easing="Power3.easeInOut" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-elementdelay="0.1" 
                        data-endelementdelay="0.1" 
                        
                data-endspeed="300" 
            
                        style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">{{$evento->dados_horario_local}} 
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>	
        <div class="tp-bannertimer" style="display:none;"></div>	
    </div>
</div>
</div>
<!-- End Hero Slider -->
<!-- Start Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Notícias</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header -->
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="grid-holder col-3 events-grid">
                        <li class="grid-item post format-standard">
                        <div class="grid-item-inner"> <a href="http://placehold.it/800x600&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box"> <img src="http://placehold.it/800x600&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                            <div class="grid-content">
                            <h3><a href="blog-post.html">Blog post with featured image</a></h3>
                            <span class="meta-data"><span><i class="fa fa-calendar"></i> 24th Nov, 2013</span><span><a href="#"><i class="fa fa-tag"></i>Uncategoried</a></span></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            </div>
                        </div>
                        </li>
                        <li class="grid-item post format-standard">
                        <div class="grid-item-inner"> <a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                            <div class="grid-content">
                            <h3><a href="blog-post.html">Blog post with featured image</a></h3>
                            <span class="meta-data"><span><i class="fa fa-calendar"></i> 24th Nov, 2013</span><span><a href="#"><i class="fa fa-tag"></i>Uncategoried</a></span></span> </div>
                        </div>
                        </li>
                        <li class="grid-item post format-standard">
                        <div class="grid-item-inner"> <a href="http://placehold.it/800x600&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box"> <img src="http://placehold.it/800x600&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                            <div class="grid-content">
                            <h3><a href="blog-post.html">Blog post with featured image</a></h3>
                            <span class="meta-data"><span><i class="fa fa-calendar"></i> 24th Nov, 2013</span><span><a href="#"><i class="fa fa-tag"></i>Uncategoried</a></span></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            </div>
                        </div>
                        </li>
                        <li class="grid-item post format-standard">
                        <div class="grid-item-inner"> <a href="http://placehold.it/800x600&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box"> <img src="http://placehold.it/800x600&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                            <div class="grid-content">
                            <h3><a href="blog-post.html">Blog post with featured image</a></h3>
                            <span class="meta-data"><span><i class="fa fa-calendar"></i> 24th Nov, 2013</span><span><a href="#"><i class="fa fa-tag"></i>Uncategoried</a></span></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            </div>
                        </div>
                        </li>
                        <li class="grid-item post format-standard">
                        <div class="grid-item-inner"> <a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                            <div class="grid-content">
                            <h3><a href="blog-post.html">Blog post with featured image</a></h3>
                            <span class="meta-data"><span><i class="fa fa-calendar"></i> 24th Nov, 2013</span><span><a href="#"><i class="fa fa-tag"></i>Uncategoried</a></span></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            </div>
                        </div>
                        </li>
                        <li class="grid-item post format-standard">
                        <div class="grid-item-inner"> <a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                            <div class="grid-content">
                            <h3><a href="blog-post.html">Blog post with featured image</a></h3>
                            <span class="meta-data"><span><i class="fa fa-calendar"></i> 24th Nov, 2013</span><span><a href="#"><i class="fa fa-tag"></i>Uncategoried</a></span></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            </div>
                        </div>
                        </li>
                        <li class="grid-item post format-standard">
                        <div class="grid-item-inner"> <a href="http://placehold.it/600x600&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box"> <img src="http://placehold.it/600x600&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                            <div class="grid-content">
                            <h3><a href="blog-post.html">Blog post with featured image</a></h3>
                            <span class="meta-data"><span><i class="fa fa-calendar"></i> 24th Nov, 2013</span><span><a href="#"><i class="fa fa-tag"></i>Uncategoried</a></span></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            </div>
                        </div>
                        </li>
                    </ul>
                    
                    <!-- Pagination -->
                    <ul class="pager pull-right">
                        <li><a href="#">&larr; Older</a></li>
                        <li><a href="#">Newer &rarr;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection