@extends('layouts.template1')
@section('content')
<!-- Start Nav Backed Header -->
<<div class="nav-backed-header parallax">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
        <li><a href="/{{$igreja->url}}/">Home</a></li>
        <li class="active">Eventos fixos</li>
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
        <h1>Eventos fixos</h1>
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
            <?php
            foreach($eventos_fixos as $evento){
                ?>
                <li class="grid-item format-standard">
                <div class="grid-item-inner"> 
                    <?php if($evento->foto != null){ ?>
                        <img src="/storage/eventos/{{$evento->foto}}" alt="">
                    <?php }else{ ?>
                        <img src="/storage/no-event.jpg" alt="">
                    <?php } ?>
                    <div class="grid-content">
                    <h3>{{$evento->nome}}</h3>
                    <?php if($evento->descricao != null){ ?> <p>{{$evento->descricao}}</p> <?php } ?>
                    </div>
                    <ul class="info-table">
                    <li><i class="fa fa-calendar"></i><i class="fa fa-map-marker"></i> {{$evento->dados_horario}}</li>
                    </ul>
                </div>
                </li>
                <?php
            }
            ?>
        </ul>
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