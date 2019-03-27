@extends('layouts.template1')
@section('content')
<!-- End Site Header --> 
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
        <li><a href="/{{$igreja->url}}">Home</a></li>
        <li class="active">Contato</li>
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
        <h1>Contatos</h1>
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
            <header class="single-post-header clearfix">
                <h2 class="post-title">Nossa localização</h2>
            </header>
            <div class="post-content">
                <div id="gmap">
                <iframe src="https://maps.google.com/?ie=UTF8&amp;q={{muda_cep($igreja->cep)}}&amp;t=m&amp;z=14&amp;output=embed"></iframe>
                </div>
                <div class="row">
                <form method="post" id="contactform" name="contactform" class="contact-form" action="">
                    <div class="col-md-6 margin-15">
                    <div class="form-group">
                        <input type="text" id="name" name="nome"  class="form-control input-lg" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="telefone" name="telefone" class="form-control input-lg" placeholder="Telefone">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <textarea cols="6" rows="7" id="mensagem" name="mensagem" class="form-control input-lg" placeholder="Mensagem" required></textarea>
                    </div>
                    </div>
                    <div class="col-md-12">
                    <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Enviar">
                    </div>
                </form>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div id="message"></div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection