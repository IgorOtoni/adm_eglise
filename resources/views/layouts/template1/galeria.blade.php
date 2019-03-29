@extends('layouts.template1')
@push('script')
<script src="{{asset('template_igreja/template-padrao/plugins/flexslider/js/jquery.flexslider.js')}}"></script> <!-- FlexSlider --> 
@endpush
@section('content')
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
        <li><a href="/{{$igreja->url}}">Home</a></li>
        <li class="active">Álbuns</li>
        </ol>
    </div>
    </div>
</div>
</div>
<!-- End Nav Backed Header --> 
<!-- Start Page Header -->
<div class="page-header">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h1>Álbuns</h1>
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
        <ul class="isotope-grid" data-sort-id="gallery">
        <?php foreach($galerias as $galeria){ 
            if(count($fotos[$galeria->id]) == 1){
                $foto = $fotos[$galeria->id][0]; ?>
                <li class="col-md-3 col-sm-3 grid-item post format-image"><h3>{{$galeria->nome}}</h3>
                    <div class="grid-item-inner"> <a href="/storage/galerias/{{$foto->foto}}" data-rel="prettyPhoto" class="media-box"> <img src="/carrega_imagem/480,320,galerias,{{$foto->foto}}" alt=""> <!--<img src="/storage/galerias/{{$foto->foto}}" alt="">--> </a> </div>
                </li>
            <?php }else{ ?>
                <li class="col-md-3 col-sm-3 grid-item post format-gallery"><h3>{{$galeria->nome}}</h3>
                    <div class="grid-item-inner">
                    <div class="media-box">
                        <div class="flexslider" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="slide" data-pause="yes">
                        <ul class="slides">
                            <?php $fotos_ = $fotos[$galeria->id];
                                foreach($fotos_ as $foto){ ?>
                                <li class="item"><a href="/storage/galerias/{{$foto->foto}}" data-rel="prettyPhoto[postname]"><img src="/carrega_imagem/480,320,galerias,{{$foto->foto}}" alt=""></a></li>
                            <?php } ?>
                        </ul>
                        </div>
                    </div>
                    </div>
                </li>
            <?php }
        } ?>
        </ul>
    </div>
    <div class="text-align-center">
        <ul class="pagination">
        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
        </ul>
    </div>
    </div>
</div>
</div>
@endsection