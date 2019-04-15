@extends('layouts.admin_site.index')
@push('script')
<!-- Treeview -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/treeview/treeview.css')}}">

<script>

$(function(){
    // PARA MENUS ===========================================================================
    var html_modulos_area_menu = $("#modal-incluir-menu #modulos_area").html();
    $("#modal-incluir-menu #modulos_area").html("");
    var html_publicacoes_area_menu = $("#modal-incluir-menu #publicacoes_area").html();
    $("#modal-incluir-menu #publicacoes_area").html("");
    var html_url_externa_area_menu = $("#modal-incluir-menu #url_externa_area").html();
    $("#modal-incluir-menu #url_externa_area").html("");

    $('#adicionarMenuFormulario').validator('update');
    $('#adicionarMenuFormulario').validator('validate');

    $('#modal-incluir-menu #link').on('change', function (event) {
        $("#modal-incluir-menu #modulos_area").html("");
        $("#modal-incluir-menu #publicacoes_area").html("");
        $("#modal-incluir-menu #url_externa_area").html("");

        op = $("#modal-incluir-menu #link").val();
        if(op == 1){
            $("#modal-incluir-menu #modulos_area").html(html_modulos_area_menu);
        }else if(op == 2){
            $("#modal-incluir-menu #publicacoes_area").html(html_publicacoes_area_menu);
        }else if(op == 3){
            $("#modal-incluir-menu #url_externa_area").html(html_url_externa_area_menu);
        }

        $('#adicionarMenuFormulario').validator('update');
        $('#adicionarMenuFormulario').validator('validate');
    });

    var html_modulos_area_menu_editar = $("#modal-editar-menu #modulos_area").html();
    $("#modal-editar-menu #modulos_area").html("");
    var html_publicacoes_area_menu_editar = $("#modal-editar-menu #publicacoes_area").html();
    $("#modal-editar-menu #publicacoes_area").html("");
    var html_url_externa_area_menu_editar = $("#modal-editar-menu #url_externa_area").html();
    $("#modal-editar-menu #url_externa_area").html("");

    $('#modal-editar-menu #link').on('change', function (event) {
        $("#modal-editar-menu #modulos_area").html("");
        $("#modal-editar-menu #publicacoes_area").html("");
        $("#modal-editar-menu #url_externa_area").html("");

        op = $("#modal-editar-menu #link").val();
        if(op == 1){
            $("#modal-editar-menu #modulos_area").html(html_modulos_area_menu_editar);
        }else if(op == 2){
            $("#modal-editar-menu #publicacoes_area").html(html_publicacoes_area_menu_editar);
        }else if(op == 3){
            $("#modal-editar-menu #url_externa_area").html(html_url_externa_area_menu_editar);
        }

        $('#editarMenuFormulario').validator('update');
        $('#editarMenuFormulario').validator('validate');
    });
    /////////////////////////////////////////////////////////////////////////////////////////

    // PARA SUB MENUS =======================================================================
    var html_modulos_area_sub = $("#modal-incluir-submenu #modulos_area").html();
    $("#modal-incluir-submenu #modulos_area").html("");
    var html_publicacoes_area_sub = $("#modal-incluir-submenu #publicacoes_area").html();
    $("#modal-incluir-submenu #publicacoes_area").html("");
    var html_url_externa_area_sub = $("#modal-incluir-submenu #url_externa_area").html();
    $("#modal-incluir-submenu #url_externa_area").html("");

    $('#adicionarSubMenuFormulario').validator('update');
    $('#adicionarSubMenuFormulario').validator('validate');

    $('#modal-incluir-submenu #link').on('change', function (event) {
        $("#modal-incluir-submenu #modulos_area").html("");
        $("#modal-incluir-submenu #publicacoes_area").html("");
        $("#modal-incluir-submenu #url_externa_area").html("");

        op = $("#modal-incluir-submenu #link").val();
        if(op == 1){
            $("#modal-incluir-submenu #modulos_area").html(html_modulos_area_sub);
        }else if(op == 2){
            $("#modal-incluir-submenu #publicacoes_area").html(html_publicacoes_area_sub);
        }else if(op == 3){
            $("#modal-incluir-submenu #url_externa_area").html(html_url_externa_area_sub);
        }

        $('#adicionarSubMenuFormulario').validator('update');
        $('#adicionarSubMenuFormulario').validator('validate');
    });

    var html_modulos_area_sub = $("#modal-editar-submenu #modulos_area").html();
    $("#modal-editar-submenu #modulos_area").html("");
    var html_publicacoes_area_sub = $("#modal-editar-submenu #publicacoes_area").html();
    $("#modal-editar-submenu #publicacoes_area").html("");
    var html_url_externa_area_sub = $("#modal-editar-submenu #url_externa_area").html();
    $("#modal-editar-submenu #url_externa_area").html("");

    $('#modal-editar-submenu #link').on('change', function (event) {
        $("#modal-editar-submenu #modulos_area").html("");
        $("#modal-editar-submenu #publicacoes_area").html("");
        $("#modal-editar-submenu #url_externa_area").html("");

        op = $("#modal-editar-submenu #link").val();
        if(op == 1){
            $("#modal-editar-submenu #modulos_area").html(html_modulos_area_sub);
        }else if(op == 2){
            $("#modal-editar-submenu #publicacoes_area").html(html_publicacoes_area_sub);
        }else if(op == 3){
            $("#modal-editar-submenu #url_externa_area").html(html_url_externa_area_sub);
        }

        $('#editarSubMenuFormulario').validator('update');
        $('#editarSubMenuFormulario').validator('validate');
    });
    /////////////////////////////////////////////////////////////////////////////////////////

    // PARA SUB SUB MENUS =======================================================================
    var html_modulos_area_subsub = $("#modal-incluir-subsubmenu #modulos_area").html();
    $("#modal-incluir-subsubmenu #modulos_area").html("");
    var html_publicacoes_area_subsub = $("#modal-incluir-subsubmenu #publicacoes_area").html();
    $("#modal-incluir-subsubmenu #publicacoes_area").html("");
    var html_url_externa_area_subsub = $("#modal-incluir-subsubmenu #url_externa_area").html();
    $("#modal-incluir-subsubmenu #url_externa_area").html("");

    $('#adicionarSubSubMenuFormulario').validator('update');
    $('#adicionarSubSubMenuFormulario').validator('validate');

    $('#modal-incluir-subsubmenu #link').on('change', function (event) {
        $("#modal-incluir-subsubmenu #modulos_area").html("");
        $("#modal-incluir-subsubmenu #publicacoes_area").html("");
        $("#modal-incluir-subsubmenu #url_externa_area").html("");

        op = $("#modal-incluir-subsubmenu #link").val();
        if(op == 1){
            $("#modal-incluir-subsubmenu #modulos_area").html(html_modulos_area_subsub);
        }else if(op == 2){
            $("#modal-incluir-subsubmenu #publicacoes_area").html(html_publicacoes_area_subsub);
        }else if(op == 3){
            $("#modal-incluir-subsubmenu #url_externa_area").html(html_url_externa_area_subsub);
        }

        $('#adicionarSubSubMenuFormulario').validator('update');
        $('#adicionarSubSubMenuFormulario').validator('validate');
    });
    /////////////////////////////////////////////////////////////////////////////////////////
});

// MODAL INCLUIR SUB MENU ===================================================================
$('#modal-incluir-submenu').on('hide.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;

    var modal = $(this);

    modal.find('#id_menu').val(null);
});

$('#modal-incluir-submenu').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;
    var id = button.data('idmenu');

    var modal = $(this);

    if(id != null) modal.find('#id_menu').val(id);
});
/////////////////////////////////////////////////////////////////////////////////////////////

// MODAL INCLUIR SUB SUB MENU ===================================================================
$('#modal-incluir-subsubmenu').on('hide.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;

    var modal = $(this);

    modal.find('#id_submenu').val(null);
});

$('#modal-incluir-subsubmenu').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;
    var id = button.data('idsubmenu');

    var modal = $(this);

    if(id != null) modal.find('#id_submenu').val(id);
});
/////////////////////////////////////////////////////////////////////////////////////////////

// MODAL EDITAR MENU ===================================================================
$('#modal-editar-menu').on('hide.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;

    var modal = $(this);

    modal.find('#id').val(null);

    $("#modal-editar-menu #link").val(0);
    $("#modal-editar-menu #modulos_area").html("");
    $("#modal-editar-menu #publicacoes_area").html("");
    $("#modal-editar-menu #url_externa_area").html("");
});

$('#modal-editar-menu').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;
    var id = button.data('id');
    var nome = button.data('nome');
    var link = button.data('link');
    var ordem = button.data('ordem');

    var modal = $(this);

    if(id != null) modal.find('#id').val(id);
    if(nome != null) modal.find('#nome').val(nome);
    if(link != null) modal.find('#link_atual').val(link);
    if(ordem != null) modal.find('#ordem').val(ordem);

    $('#editarMenuFormulario').validator('update');
    $('#editarMenuFormulario').validator('validate');
});
/////////////////////////////////////////////////////////////////////////////////////////////

// MODAL EDITAR SUB MENU ===================================================================
$('#modal-editar-submenu').on('hide.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;

    var modal = $(this);

    modal.find('#id').val(null);
    modal.find('#link').val(0);
    modal.find('#nome').val(null);
    modal.find('#ordem').val(null);
    modal.find('#nome').val(null);

    $("#modal-editar-submenu #modulos_area").html("");
    $("#modal-editar-submenu #publicacoes_area").html("");
    $("#modal-editar-submenu #url_externa_area").html("");
});

$('#modal-editar-submenu').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;
    var id = button.data('id');
    var nome = button.data('nome');
    var link = button.data('link');
    var ordem = button.data('ordem');
    var id_menu = button.data('idmenu');

    var modal = $(this);

    if(id != null) modal.find('#id').val(id);
    if(nome != null) modal.find('#nome').val(nome);
    if(link != null) modal.find('#link_atual').val(link);
    if(ordem != null) modal.find('#ordem').val(ordem);
    if(id_menu != null) modal.find('#id_menu').val(id_menu);

    $('#editarSubMenuFormulario').validator('update');
    $('#editarSubMenuFormulario').validator('validate');
});
/////////////////////////////////////////////////////////////////////////////////////////////

// MODAL EDITAR SUB MENU ===================================================================
$('#modal-editar-subsubmenu').on('hide.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;

    var modal = $(this);

    modal.find('#id').val(null);
    modal.find('#link').val(0);
    modal.find('#nome').val(null);
    modal.find('#ordem').val(null);
    modal.find('#nome').val(null);

    $("#modal-editar-subsubmenu #modulos_area").html("");
    $("#modal-editar-subsubmenu #publicacoes_area").html("");
    $("#modal-editar-subsubmenu #url_externa_area").html("");
});

$('#modal-editar-subsubmenu').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;
    var id = button.data('id');
    var nome = button.data('nome');
    var link = button.data('link');
    var ordem = button.data('ordem');
    var id_submenu = button.data('idsubmenu');

    var modal = $(this);

    if(id != null) modal.find('#id').val(id);
    if(nome != null) modal.find('#nome').val(nome);
    if(link != null) modal.find('#link_atual').val(link);
    if(ordem != null) modal.find('#ordem').val(ordem);
    if(id_submenu != null) modal.find('#id_submenu').val(id_submenu);

    $('#editarSubSubMenuFormulario').validator('update');
    $('#editarSubSubMenuFormulario').validator('validate');
});
/////////////////////////////////////////////////////////////////////////////////////////////

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

    <form id="editarConfiguracoesIgrejaFormulario" data-toggle="validator" method="POST" role="form" action="{{route('igrejas.salvarConfiguracoes')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$igreja->id_configuracao}}">
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
                <select id="id_template" name="id_template" class="form-control" required>
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
                                                <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-incluir-submenu" data-idmenu="{{$menu->id}}"><i class="fa fa-plus"></i> Submenu</a> 
                                                <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-editar-menu" data-id="{{$menu->id}}" data-nome="{{$menu->nome}}" data-link="{{$menu->link}}" data-ordem="{{$menu->ordem}}"><i class="fa fa-edit"></i> Menu</a> 
                                                <a class="btn btn-danger btn-sm" href="/admin/igrejas/excluirMenu/{{$menu->id}}"><i class="fa fa-trash"></i> Menu</a>
                                            </div>
                                        </div>
                                        <ul>
                                            <?php if(isset($submenus[$menu->id])) foreach($submenus[$menu->id] as $submenu){ ?>
                                                <li>
                                                    <div><span><i class="icon-minus-sign"></i> {{$submenu->ordem}} - {{$submenu->nome}}</span>
                                                        <?php echo ($submenu->link != null) ? '<a target="_blank" href="/'.$igreja->url.'/'.$submenu->link.'"><span class="bg-blue">Possui link</span></a>' : '<span class="bg-gray">Não possui link</span>' ?>
                                                        <div class="pull-right">
                                                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-incluir-subsubmenu" data-idsubmenu="{{$submenu->id}}"><i class="fa fa-plus"></i> Sub-Submenu</a> 
                                                            <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-editar-submenu" data-id="{{$submenu->id}}" data-nome="{{$submenu->nome}}" data-link="{{$submenu->link}}" data-ordem="{{$submenu->ordem}}" data-idmenu="{{$submenu->id_menu}}"><i class="fa fa-edit"></i> Submenu</a> 
                                                            <a class="btn btn-danger btn-sm" href="/admin/igrejas/excluirSubMenu/{{$submenu->id}}"><i class="fa fa-trash"></i> Submenu</a>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <?php if(isset($subsubmenus[$submenu->id])) foreach($subsubmenus[$submenu->id] as $subsubmenu){ ?>
                                                            <li>
                                                                <div><span><i class="icon-leaf"></i> {{$subsubmenu->ordem}} - {{$subsubmenu->nome}}</span> 
                                                                    <?php echo ($subsubmenu->link != null) ? '<a target="_blank" href="/'.$igreja->url.'/'.$subsubmenu->link.'"><span class="bg-blue">Possui link</span></a>' : '<span class="bg-gray">Não possui link</span>' ?>
                                                                    <div class="pull-right">
                                                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-editar-subsubmenu" data-id="{{$subsubmenu->id}}" data-nome="{{$subsubmenu->nome}}" data-link="{{$subsubmenu->link}}" data-ordem="{{$subsubmenu->ordem}}" data-idsubmenu="{{$subsubmenu->id_submenu}}"><i class="fa fa-edit"></i> Sub-Submenu</a> 
                                                                        <a class="btn btn-danger btn-sm" href="/admin/igrejas/excluirSubSubMenu/{{$subsubmenu->id}}"><i class="fa fa-trash"></i> Sub-Submenu</a>
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
<!-- Adicionar Menu -->
<div class="modal fade" id="modal-incluir-menu">
<form id="adicionarMenuFormulario" data-toggle="validator" method="POST" role="form" action="{{route('igrejas.adicionarMenu')}}" enctype="multipart/form-data">
@csrf
    <input type="hidden" name="id_configuracao" value="{{$igreja->id_configuracao}}">
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
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Ordem</label>
                <input id="ordem" name="ordem" type="number" min="1" class="form-control" placeholder="Ordem" required>
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

<!-- Adicionar Sub Menu -->
<div class="modal fade" id="modal-incluir-submenu">
<form id="adicionarSubMenuFormulario" data-toggle="validator" method="POST" role="form" action="{{route('igrejas.adicionarSubMenu')}}" enctype="multipart/form-data">
@csrf
    <input type="hidden" name="id_menu" id="id_menu">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Novo Submenu</h4>
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
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Ordem</label>
                <input id="ordem" name="ordem" type="number" min="1" class="form-control" placeholder="Ordem" required>
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

<!-- Adicionar Sub Sub Menu -->
<div class="modal fade" id="modal-incluir-subsubmenu">
<form id="adicionarSubSubMenuFormulario" data-toggle="validator" method="POST" role="form" action="{{route('igrejas.adicionarSubSubMenu')}}" enctype="multipart/form-data">
@csrf
    <input type="hidden" name="id_submenu" id="id_submenu">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Novo Submenu</h4>
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
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Ordem</label>
                <input id="ordem" name="ordem" type="number" min="1" class="form-control" placeholder="Ordem" required>
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

<!-- Editar Menu -->
<div class="modal fade" id="modal-editar-menu">
<form id="editarMenuFormulario" data-toggle="validator" method="POST" role="form" action="{{route('igrejas.editarMenu')}}" enctype="multipart/form-data">
@csrf
    <input type="hidden" name="id" id="id">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar menu</h4>
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
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Ordem</label>
                <input id="ordem" name="ordem" type="number" min="1" class="form-control" placeholder="Ordem" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label >Link atual</label>
                <input id="link_atual" type="text" class="form-control" placeholder="Link atual" disabled>
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
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </div>
        </div>
    </div>
    </div>
</form>
</div>

<!-- Editar Sub Menu -->
<div class="modal fade" id="modal-editar-submenu">
<form id="editarSubMenuFormulario" data-toggle="validator" method="POST" role="form" action="{{route('igrejas.editarSubMenu')}}" enctype="multipart/form-data">
@csrf
    <input type="hidden" name="id" id="id">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar Submenu</h4>
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
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Menu pertencente</label>
                <select id="id_menu" name="id_menu" class="form-control" required>
                    @foreach ($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->nome}}</option>
                    @endforeach
                </select>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Ordem</label>
                <input id="ordem" name="ordem" type="number" min="1" class="form-control" placeholder="Ordem" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label >Link atual</label>
                <input id="link_atual" type="text" class="form-control" placeholder="Link atual" disabled>
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
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </div>
        </div>
    </div>
    </div>
</form>
</div>

<!-- Editar Sub Sub Menu -->
<div class="modal fade" id="modal-editar-subsubmenu">
<form id="editarSubSubMenuFormulario" data-toggle="validator" method="POST" role="form" action="{{route('igrejas.editarSubMenu')}}" enctype="multipart/form-data">
@csrf
    <input type="hidden" name="id" id="id">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar Sub-Submenu</h4>
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
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Menu pertencente</label>
                <select id="id_submenu" name="id_menu" class="form-control" required>
                    <?php $submenus = App\TblSubSubMenu::orderBy('nome','ASC')->get(); ?>
                    @foreach ($submenus as $submenu)
                        <option value="{{$submenu->id}}">{{$submenu->nome}}</option>
                    @endforeach
                </select>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label >Ordem</label>
                <input id="ordem" name="ordem" type="number" min="1" class="form-control" placeholder="Ordem" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label >Link atual</label>
                <input id="link_atual" type="text" class="form-control" placeholder="Link atual" disabled>
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
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </div>
        </div>
    </div>
    </div>
</form>
</div>
<!-- end modals -->
@endsection