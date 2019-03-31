@extends('layouts.template2')
@section('content')
<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/{{$igreja->url}}/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sobre nós</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### About Us Area Start ##### -->
<div class="about-us-area about-page section-padding-100">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-12">
                <div class="about-content">
                    <h2>Sobre nós</h2>
                    <p>{{$igreja->texto_apresentativo}}</p>
                </div>
            </div>
            <!--<div class="col-12 col-lg-6">
                <div class="about-thumbnail">
                    <img src="img/bg-img/26.jpg" alt="">
                </div>
            </div>-->
        </div>
    </div>
</div>
<!-- ##### About Us Area End ##### -->

<!-- ##### Team Members Area Start ##### -->
<div class="team-members-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading">
                    <h2>Ministros</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Team Members Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-members text-center mb-100">
                    <div class="team-thumb" style="background-image: url(img/bg-img/33.jpg);">
                        <div class="team-social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <h6>Jackson Nash</h6>
                    <span>Pastor</span>
                </div>
            </div>

            <!-- Team Members Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-members text-center mb-100">
                    <div class="team-thumb" style="background-image: url(img/bg-img/34.jpg);">
                        <div class="team-social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <h6>Rucsandra Moisa</h6>
                    <span>Bishop</span>
                </div>
            </div>

            <!-- Team Members Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-members text-center mb-100">
                    <div class="team-thumb" style="background-image: url(img/bg-img/35.jpg);">
                        <div class="team-social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <h6>Ollie Schneider</h6>
                    <span>Archbishop</span>
                </div>
            </div>

            <!-- Team Members Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-members text-center mb-100">
                    <div class="team-thumb" style="background-image: url(img/bg-img/36.jpg);">
                        <div class="team-social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <h6>Alex Manning</h6>
                    <span>Pope</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Team Members Area End ##### -->
@endsection