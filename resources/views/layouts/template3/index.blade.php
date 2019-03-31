@extends('layouts.template3')
@push('script')

@endpush
@section('content')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <?php
        $x = 1;
        foreach($eventos_fixos as $evento){
            ?>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img bg-overlay" style="background-image: url(storage/{{(($evento->foto != null) ? "eventos/".$evento->foto : "no-event.jpg")}});">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">
                        <div class="col-12 col-lg-7">
                            <!-- Slides Content -->
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">{{$evento->nome}}</h2>
                                <h3 data-animation="fadeInUp" data-delay="300ms">{{$evento->dados_horario_local}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Event Button -->
                <!--<div class="next-event-btn" data-animation="bounceInDown" data-delay="900ms">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="#" class="btn faith-btn active">Sunday Workship: 10:30 AM</a>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
            <?php
        }
        ?>
    </div>
</section>
<!-- ##### Hero Area End ##### -->

<!-- ##### Church Activities Area Start ##### -->
<section class="church-activities-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto">
                    <h3>Últimos eventos</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <!-- Upcoming Events -->
                <div class="upcoming-events mb-100">

                    <?php 
                    $x = 0;
                    foreach($eventos as $evento){
                        ?>

                        <!-- Single Upcoming Events -->
                        <div class="single-upcoming-events d-flex align-items-center">
                            <!-- Events Date & Thumbnail -->
                            <div class="event-date-thumbnail d-flex align-items-center">
                                <div class="event-date">
                                    <h6>{{\Carbon\Carbon::parse($evento->dados_horario_inicio, 'UTC')->isoFormat('Do MMMM YY h:mm A')}}</h6>
                                </div>
                                <div class="event-thumbnail bg-img" style="background-image: url({{(($evento->foto != null) ? "/storage/timeline/".$evento->foto : "/storage/no-event.jpg")}});"></div>
                            </div>
                            <!-- Events Content -->
                            <div class="events-content">
                                <a href="#">
                                    <h6>{{$evento->nome}}</h6>
                                </a>
                                <p>Final previsto para {{\Carbon\Carbon::parse($evento->dados_horario_fim)->diffForHumans($evento->dados_horario_inicio)}} @ {{$evento->dados_local}}</p>
                            </div>
                        </div>

                        <?php
                        $x++;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Church Activities Area End ##### -->

<!-- ##### Donate Area Start ##### -->
<div class="faith-blog-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto">
                    <h3>Últimas Álbuns</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach($galerias as $galeria){ ?>
                <h4>{{$galeria->nome}}</h4>
                <div class="col-12">
                    <div class="donate-slides owl-carousel">
                        <?php $fotos_ = $fotos[$galeria->id];
                            foreach($fotos_ as $foto){ ?>
                            <!-- Single Donate Slide Area -->
                            <div class="single-donate-slide">
                                <img src="/carrega_imagem/480,320,galerias,{{$foto->foto}}" alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- ##### Donate Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<div class="faith-blog-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto">
                    <h3>Últimas notícias</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach($noticias as $noticia){ ?>
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area mb-100">
                        <div class="blog-thumbnail">
                            <?php if($noticia->foto != null){ ?>
                                <img src="/storage/noticias/{{$noticia->foto}}" alt=""> 
                            <?php }else{ ?>
                                <img src="/storage/no-news.jpg" alt=""> 
                            <?php } ?>
                            <div class="post-date">
                                <a href="#"> Publicada {{\Carbon\Carbon::parse($noticia->created_at)->diffForHumans()}}</a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <a href="#" class="blog-title">{{$noticia->nome}}</a>
                            <p>{{$noticia->descricao}}</p>
                            <?php
                            if($noticia->updated_at != null && $noticia->updated_at != $noticia->created_at){
                                ?>
                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Atualizada {{\Carbon\Carbon::parse($noticia->updated_at)->diffForHumans()}}</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- ##### Blog Area End ##### -->
@endsection