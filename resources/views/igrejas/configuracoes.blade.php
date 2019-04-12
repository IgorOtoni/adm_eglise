@extends('layouts.admin_site.index')
@push('script')
<!-- Treeview -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/treeview/treeview.css')}}">

<script>

    $(function(){
        var html_modulos_area = $("#modulos_area").html();
        var html_publicacoes_area = $("#publicacoes_area").html();
        var html_url_externa_area = $("#url_externa_area").html();

    $('#link').on('change', function (event) {
        $("#modulos_area").html("");
        $("#publicacoes_area").html("");
        $("#url_externa_area").html("");

        op = $("#link").val();
        if(op == 1){
            $("#modulos_area").html(html_modulos_area);
        }else if(op == 2){
            $("#publicacoes_area").html(html_publicacoes_area);
        }else if(op == 3){
            $("#url_externa_area").html(html_url_externa_area);
        }

        $('#adicionarMenuFormulario').validator('update');
        $('#adicionarMenuFormulario').validator('validate');
    });
})
</script>

@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Configuração do site da igreja
    <!--<small>it all starts here</small>-->
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <form id="editarIgrejaFormulario" data-toggle="validator" method="POST" role="form" action="{{route('igrejas.atualizar')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$igreja->id}}">
    <div class="box">
        <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Url</label>
                <input name="url" type="text" class="form-control" placeholder="Url" value="{{$igreja->url}}" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
            <div class="form-group has-feedback">
                <label >Template</label>
                <select id="template" name="template" class="form-control" required>
                    <?php $templates = App\TblTemplates::orderBy('nome','ASC')->get(); ?>
                    @foreach ($templates as $template)
                    <option value="{{$template->id}}" {{($template->id == $igreja->id_template) ? 'selected' : ''}}>{{$template->nome}}</option>
                    @endforeach
                </select>
                <div class="help-block with-errors"></div>
            </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Cor</label>
                <input name="cor" type="text" class="form-control" placeholder="Cor" value="{{$igreja->cor}}" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>

        </div>
        <div class="box-footer">
        <a href="{{route('igrejas')}}" class="btn btn-warning pull-left">Cancelar</a>
        <button type="submit" class="btn btn-primary pull-right">Salvar alteração</button>
        </div>
    </div>

    </form>

    <div class="box">
        <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <label >Hierarquia de menus</label>
                <div id="tree" class="tree">
                    <ul>
                        <li>
                            <div><span><i class="icon-folder-open"></i> Raíz</span>
                                <div class="pull-right">
                                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-incluir-menu"><i class="fa fa-plus"></i> Menu</a> 
                                </div>
                            </div>
                            <ul>
                                <?php foreach($menus as $menu){ ?>
                                    <li>
                                        <div><span><i class="icon-folder-open"></i> {{$menu->ordem}} - {{$menu->nome}}</span> 
                                            <?php echo ($menu->link != null) ? '<a target="_blank" href="/'.$igreja->url.'/'.$menu->link.'"><span class="bg-blue">Possui link</span></a>' : '<span class="bg-gray">Não possui link</span>' ?>
                                            <div class="pull-right">
                                                <a class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Submenu</a> 
                                                <a class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Menu</a> 
                                                <a class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Menu</a>
                                            </div>
                                        </div>
                                        <ul>
                                            <?php if(isset($submenus[$menu->id])) foreach($submenus[$menu->id] as $submenu){ ?>
                                                <li>
                                                    <div><span><i class="icon-minus-sign"></i> {{$submenu->ordem}} - {{$submenu->nome}}</span>
                                                        <?php echo ($submenu->link != null) ? '<a target="_blank" href="/'.$igreja->url.'/'.$submenu->link.'"><span class="bg-blue">Possui link</span></a>' : '<span class="bg-gray">Não possui link</span>' ?>
                                                        <div class="pull-right">
                                                            <a class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Sub-Submenu</a> 
                                                            <a class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Submenu</a> 
                                                            <a class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Submenu</a>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <?php if(isset($subsubmenus[$submenu->id])) foreach($subsubmenus[$submenu->id] as $subsubmenus){ ?>
                                                            <li>
                                                                <div><span><i class="icon-leaf"></i> {{$subsubmenu->ordem}} - {{$subsubmenu->nome}}</span> 
                                                                    <?php echo ($subsubmenu->link != null) ? '<a target="_blank" href="/'.$igreja->url.'/'.$subsubmenu->link.'"><span class="bg-blue">Possui link</span></a>' : '<span class="bg-gray">Não possui link</span>' ?>
                                                                    <div class="pull-right">
                                                                        <a class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Sub-Submenu</a> 
                                                                        <a class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sub-Submenu</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modals -->
<div class="modal fade" id="modal-incluir-menu">
<form id="adicionarMenuFormulario" data-toggle="validator" method="POST" role="form" action="{{route('igrejas.salvarConfiguracoes')}}" enctype="multipart/form-data">
@csrf
    <input type="hidden" name="id" id="id">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Novo menu</h4>
        </div>
        <div class="modal-body">
        <div class="box-body">
            <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Nome</label>
                <input id="nome" name="nome" type="text" class="form-control" placeholder="Nome" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div id="link_area" class="col-md-12">
                <div class="form-group has-feedback">
                <label >Tipo de link</label>
                <select id="link" name="link" class="form-control" required>
                    <option value="0" selected>Sem link</option>
                    <option value="1">Link para módulo do sistema</option>
                    <option value="2">Link para publicação</option>
                    <option value="3">Link externo</option>
                </select>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div id="modulos_area" class="col-md-12">
                <div class="form-group has-feedback">
                <label >Módulos</label>
                <select id="modulo" name="modulo" class="form-control" required>
                    @foreach ($modulos_igreja as $modulo)
                        <option value="{{$modulo->id}}">{{$modulo->nome}}</option>
                    @endforeach
                </select>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div id="publicacoes_area" class="col-md-12">
                <div class="form-group has-feedback">
                <label >Publicações</label>
                <select id="publicacao" name="publicacao" class="form-control" required>
                    <?php $publicacoes = App\TblPublicacoes::where('id_igreja','=',$igreja->id)->orderBy('nome','ASC')->get(); ?>
                    @foreach ($publicacoes as $publicacao)
                        <option value="{{$publicacao->id}}">{{$publicacao->nome}}</option>
                    @endforeach
                </select>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div id="url_externa_area" class="col-md-12">
                <div class="form-group has-feedback">
                <label >Url externa</label>
                <input id="url" name="url" type="text" class="form-control" placeholder="Url externa" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>
            </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </div>
    </div>
    </div>
</form>
</div>
<!-- end modals -->
@endsection