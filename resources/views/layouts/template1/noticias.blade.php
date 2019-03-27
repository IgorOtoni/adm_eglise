@extends('layouts.template1')
@section('content')
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
        <li><a href="/{{$igreja->url}}/noticia">Home</a></li>
        <li class="active">Notícias</li>
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
            <?php foreach($noticias as $noticia){ ?>
                <li class="grid-item post format-standard">
                <div class="grid-item-inner">  
                    <?php if($noticia->foto != null){ ?>
                        <img src="/storage/noticias/{{$noticia->foto}}" alt=""> 
                    <?php }else{ ?>
                        <img src="/storage/no-news.jpg" alt=""> 
                    <?php } ?>
                    <div class="grid-content">
                    <h3>{{$noticia->nome}}</h3>
                    <span class="meta-data"><span><i class="fa fa-calendar"></i> Publicada {{\Carbon\Carbon::parse($noticia->created_at)->diffForHumans()}}</span><!--<span><a href="#"><i class="fa fa-tag"></i>Uncategoried</a></span>--></span>
                    <?php
                    if($noticia->updated_at != null && $noticia->updated_at != $noticia->created_at){
                        ?>
                        <span class="meta-data"><span><i class="fa fa-calendar"></i> Atualizada {{\Carbon\Carbon::parse($noticia->updated_at)->diffForHumans()}}</span></span>
                        <?php
                    }
                    ?>
                    <p>{{$noticia->descricao}}</p>
                    </div>
                </div>
                </li>
            <?php } ?>
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