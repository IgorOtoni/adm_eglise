@extends('layouts.template1')
@section('content')
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
        <li><a href="/{{$igreja->url}}/">Home</a></li>
        <li class="active">Sermões</li>
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
        <h1>Sermões</h1>
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
        <div class="col-md-12 sermon-archive"> 
        <!-- Sermons Listing -->
        <?php foreach($sermoes as $sermao){ ?>
            <article class="post sermon">
                <header class="post-title">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                    <h3><a href="single-sermon.html">{{$sermao->nome}}</a></h3>
                    <span class="meta-data"><i class="fa fa-calendar"></i> {{\Carbon\Carbon::parse($sermao->created_at, 'UTC')->isoFormat('Do MMMM YYYY, h:mm:ss A')}} </div>
                </div>
                </header>
                <div class="post-content">
                <div class="row">
                    <div class="col-md-5"> <iframe frameborder="0" src="{{$sermao->link}}"></iframe> </div>
                    <div class="col-md-7">
                    <p>{{$sermao->descricao}}</p>
                    <p><a href="{{$sermao->link}}" class="btn btn-primary">Assistir sermão <i class="fa fa-long-arrow-right"></i></a></p>
                    </div>
                </div>
                </div>
            </article>
        <?php } ?>
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
</div>
@endsection