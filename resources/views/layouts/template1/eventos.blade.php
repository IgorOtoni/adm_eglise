@extends('layouts.template1')
@section('content')
<!-- End Site Header --> 
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
        <li><a href="/{{$igreja->url}}/">Home</a></li>
        <li class="active">Linha do tempo</li>
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
        <h1>Linha do tempo</h1>
    </div>
    </div>
</div>
</div>
<!-- End Page Header --> 
<!-- Start Content -->
<div class="main" role="main">
<div id="content" class="content full">
    <div class="container">
    <ul class="timeline">
        <?php 
        $x = 0;
        foreach($eventos as $evento){
            $class = ($x % 2 == 0) ? "timeline-inverted" : "";
            $x++;
            ?>
            <li class="{{$class}}">
                <div class="timeline-badge">Mar<span>2014</span></div>
                <div class="timeline-panel">
                <div class="timeline-heading">
                    <h3 class="timeline-title"><a href="single-event.html">{{$evento->nome}}</a></h3>
                </div>
                <div class="timeline-body">
                    <ul class="info-table">
                        <li><i class="fa fa-calendar"></i> <strong>Monday</strong> | 6th March, 2014</li>
                        <li><i class="fa fa-clock-o"></i> 7:00 AM - 1:00 PM</li>
                        <li><i class="fa fa-map-marker"></i> 341 Magetic state, US</li>
                        <li><i class="fa fa-phone"></i> 1 800 321 4321</li>
                    </ul>
                </div>
                </div>
            </li>
        <?php } ?>
    </ul>
    </div>
</div>
</div>
@endsection