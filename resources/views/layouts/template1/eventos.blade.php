@extends('layouts.template1')
@push('script')
<script>
$('#modal-evento').on('hide.bs.modal', function (event) {
  var button = $(event.relatedTarget) ;

  var modal = $(this);

  modal.find('.modal-content #nome').html("");
  modal.find('.modal-content #descricao').html("");
  modal.find('.modal-content #dth_inicio').html("");
  modal.find('.modal-content #dth_fim').html("");
  modal.find('.modal-content #local').html("");
  modal.find('.modal-content #src').prop('src', '');
  modal.find('.modal-content #dth_fim').show();
  modal.find('.modal-content #foto').show();
});

$('#modal-evento').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;
    var nome = button.data('nome');
    var descricao = button.data('descricao');
    var inicio = button.data('inicio');
    var fim = button.data('fim');
    var local = button.data('local');
    var foto = button.data('foto');

    var modal = $(this);

    if(nome != null) modal.find('.modal-content #nome').append(nome);
    if(descricao != null) modal.find('.modal-content #descricao').append(descricao);
    if(inicio != null) modal.find('.modal-content #dth_inicio').append(' ' + inicio);
    if(fim != null && fim != ''){
        modal.find('.modal-content #dth_fim').append(' Final previsto para ' + fim);
    }else{
        modal.find('.modal-content #dth_fim').hide();
    }
    if(local != null) modal.find('.modal-content #local').append(' ' + local);
    if(foto != null && foto != ''){
        modal.find('.modal-content #foto').prop('src', '{{asset('storage/timeline/')}}' + '/' + foto);
    }else{
        modal.find('.modal-content #foto').hide();
    }
});
</script>
@endpush
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
    <center>
        {{ $eventos->appends(request()->query())->links() }}
    </center>
    <ul class="timeline">
        <?php
        $x = 0;
        foreach($eventos as $evento){
            $class = ($x % 2 == 0) ? "timeline-inverted" : "";
            $x++;
            ?>
            <li class="{{$class}}">
                <div class="timeline-badge">{{strtoupper(\Carbon\Carbon::parse($evento->dados_horario_inicio, 'UTC')->isoFormat('MMM YYYY'))}}</div>
                <div class="timeline-panel">
                <div class="timeline-heading">
                    <h3 class="timeline-title">
                    <?php /* ?>
                    <a href="/{{$igreja->url}}/evento/{{$igreja->id}}" data-toggle="modal" data-target="#modal-evento" data-foto="{{$evento->foto}}" data-local="{{$evento->dados_local}}" data-nome="{{$evento->nome}}" data-descricao="{{$evento->descricao}}" data-inicio="{{\Carbon\Carbon::parse($evento->dados_horario_inicio, 'UTC')->isoFormat('Do MMMM YYYY, h:mm:ss A')}}" data-fim="{{(($evento->dados_horario_fim != null) ? \Carbon\Carbon::parse($evento->dados_horario_fim)->diffForHumans($evento->dados_horario_inicio) : '')}}">{{$evento->nome}}</a>
                    */ ?>
                    <a href="/{{$igreja->url}}/evento/{{$evento->id}}">{{$evento->nome}}</a>
                    </h3>
                </div>
                <div class="timeline-body">
                    <ul class="info-table">
                        <li><i class="fa fa-calendar"></i> {{\Carbon\Carbon::parse($evento->dados_horario_inicio, 'UTC')->isoFormat('Do MMMM YYYY, h:mm:ss A')}}</li>
                        <?php if($evento->dados_horario_fim != null){ ?>
                            <li><i class="fa fa-clock-o"></i> Final previsto para {{\Carbon\Carbon::parse($evento->dados_horario_fim)->diffForHumans($evento->dados_horario_inicio)}}</li>
                        <?php } ?>
                        <li><i class="fa fa-map-marker"></i> {{$evento->dados_local}}</li>
                        <!--<li><i class="fa fa-phone"></i> 1 800 321 4321</li>-->
                    </ul>
                </div>
                </div>
            </li>
        <?php } ?>
    </ul>
    <center>
        {{ $eventos->appends(request()->query())->links() }}
    </center>
    </div>
</div>
</div>

<!-- modals -->
<div class="modal fade" id="modal-evento">
    <input type="hidden" name="id" id="id">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="nome"></h4>
        </div>
        <div class="modal-body">
        <div class="box-body">
            <!--<article class="post-content">-->
            <div class="event-description"> <img id="foto" src="" class="img-responsive">
                <div class="spacer-20"></div>
                <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Detalhes do evento</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="info-table">
                        <li><i class="fa fa-calendar" id="dth_inicio"></i> </li>
                        <li><i class="fa fa-clock-o" id="dth_fim"></i> </li>
                        <li><i class="fa fa-map-marker" id="local"></i> </li>
                        <!--<li><i class="fa fa-phone"></i> 1 800 321 4321</li>-->
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
                <p id="descricao"></p>
            </div>
            <!--</article>-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- end modals -->
@endsection