@extends('eglise.template')
@section('content')
<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Congregações
        <!--<small>Example 2.0</small>-->
    </h1>
    </section>

    <center>{{ $igrejas_e_configuracoes->appends(request()->query())->links() }}</center>
    <!-- Main content -->
    <section class="content">
    @foreach ($igrejas_e_configuracoes as $igreja)
        <div class="col-md-6 col-xs-12">
        <!-- Attachment -->
        <div class="attachment-block clearfix">
        @if ($igreja->logo != null)
            <img class="attachment-img" src="/storage/igrejas/{{$igreja->logo}}" alt="Attachment Image">
        @else
            <img class="attachment-img" src="/storage/no-logo.jpg" alt="Attachment Image">
        @endif
        
        <div class="attachment-pushed" style="word-wrap: break-word; overflow-wrap: break-word;">
            <h4 class="attachment-heading">
                <a href="/{{($igreja->url != null) ? $igreja->url: "#"}}">{{$igreja->nome}}</a>
            </h4>

            <div class="attachment-text">
            Cidade: {{$igreja->cidade}} - {{$igreja->estado}}<br/>
            Bairro: {{$igreja->bairro}}<br/>
            Rua: {{$igreja->rua}}, n°: {{$igreja->num}}<br/>
            @if ($igreja->complemento != null)
                Complemento: {{$igreja->complemento}}
            @else
                Complemento: <span class="label bg-red">Não informado</span>
            @endif
            <br/>
            @if ($igreja->telefone != null)
                Telefone: {{$igreja->telefone}}
            @else
                Telefone: <span class="label bg-red">Não informado</span>
            @endif
            <br />
            @if ($igreja->email != null)
                Email: {{$igreja->email}}
            @else
                Email: <span class="label bg-red">Não informado</span>
            @endif
            </div>
            <!-- /.attachment-text -->
        </div>
        <!-- /.attachment-pushed -->
        </div>
        <!-- /.attachment-block -->
        </div>
    @endforeach
    </section>
    <!-- /.content -->
    <center>{{ $igrejas_e_configuracoes->appends(request()->query())->links() }}</center>
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
@endsection