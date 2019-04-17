@extends('layouts.usuario.index')
@push('script')
<!-- InputFilePTBR -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/input.file.js/fileinput.min.css')}}">
<!-- InputFilePTBR Confirm Dialog -->
<link href="{{asset('template_adm/plugins/krajee.confirm/jquery-confirm.min.css')}}" rel="stylesheet" type="text/css" />

<!-- InputFilePTBR -->
<script src="{{asset('template_adm/bower_components/input.file.js/fileinput.js')}}"></script>
<script src="{{asset('template_adm/bower_components/input.file.js/locales/pt-BR.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('template_adm/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template_adm/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- InputFilePTBR Confirm Dialog -->
<script src="{{asset('template_adm/plugins/krajee.confirm/jquery-confirm.min.js')}}"></script>

<script>
$(function(){
    $('input[type=file]').fileinput({
        language: "pt-BR",
        //minImageCount: 0,
        //maxImageCount: 1,
        allowedFileExtensions: ["jpg", "png", "gif"],
        initialPreview: [
            "{{'http://localhost/adm_eglise/public/storage/banners/'.$banner->foto}}",
        ],
        deleteUrl: "{{'http://localhost/adm_eglise/public/storage'}}",
        uploadExtraData:{'_token':$("#csrf_token").val()},
        initialPreviewAsData: true,
        //initialPreviewFileType: "image",
        initialPreviewConfig: [
            {caption: "{{$banner->foto}}", extra: {id: {{$banner->id}}, foto: "{{$banner->foto}}", _token: $("#csrf_token").val()}, size: 215000, width: "120px", url: "/usuario/excluirFotoBanner", key: 1},
        ],
        //overwriteInitial: false,
        //purifyHtml: true,
    }).on('filebeforedelete', function() {
            return new Promise(function(resolve, reject) {
                $.confirm({
                    title: 'Confirmação!',
                    content: 'A foto será excluída e <b>não poderá ser recuperada</b>, deseja realmente excluír a foto?',
                    type: 'red',
                    buttons: {   
                        ok: {
                            btnClass: 'btn-primary text-white',
                            keys: ['enter'],
                            action: function(){
                                resolve();
                            }
                        },
                        cancel: function(){
                            //$.alert('File deletion was aborted! ' + krajeeGetCount('file-6'));
                        }
                    }
                });
            });
        });

    var html_modulos_area = $("#editarBannerFormulario #modulos_area").html();
    $("#editarBannerFormulario #modulos_area").html("");
    var html_publicacoes_area = $("#editarBannerFormulario #publicacoes_area").html();
    $("#editarBannerFormulario #publicacoes_area").html("");
    var html_url_externa_area = $("#editarBannerFormulario #url_externa_area").html();
    $("#editarBannerFormulario #url_externa_area").html("");

    $('#editarBannerFormulario').validator('update');
    $('#editarBannerFormulario').validator('validate');

    $('#editarBannerFormulario #link').on('change', function (event) {
        $("#editarBannerFormulario #modulos_area").html("");
        $("#editarBannerFormulario #publicacoes_area").html("");
        $("#editarBannerFormulario #url_externa_area").html("");

        op = $("#editarBannerFormulario #link").val();
        if(op == 1){
            $("#editarBannerFormulario #modulos_area").html(html_modulos_area);
        }else if(op == 2){
            $("#editarBannerFormulario #publicacoes_area").html(html_publicacoes_area);
        }else if(op == 3){
            $("#editarBannerFormulario #url_externa_area").html(html_url_externa_area);
        }

        $('#editarBannerFormulario').validator('update');
        $('#editarBannerFormulario').validator('validate');
    });
});
</script>

@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Editar banner
        <!--<small>it all starts here</small>-->
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <form id="editarBannerFormulario" data-toggle="validator" method="POST" role="form" action="{{route('usuario.atualizarBanner')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$banner->id}}">
        <div class="box">
            <div class="box-body">
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label >Nome</label>
                        <input name="nome" type="text" class="form-control" placeholder="Nome" value="{{$banner->nome}}" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <label >Ordem</label>
                    <input id="ordem" name="ordem" type="number" min="1" class="form-control" placeholder="Ordem" value="{{$banner->ordem}}" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label >Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3" placeholder="Descrição" required>{{$banner->descricao}}</textarea>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label >Link atual</label>
                    <input value="{{$banner->link}}" id="link_atual" type="text" class="form-control" placeholder="Link atual" disabled>
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
                
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label >Foto</label>
                        <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
                        <input src="{{'/storage/banners/'.$banner->foto}}" name="foto" type="file" id="input_img">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                </div>
                
            </div>
            <div class="box-footer">
                <a href="/usuario/banners" class="btn btn-warning pull-left">Cancelar</a>
                <button type="submit" class="btn btn-primary pull-right">Salvar alteração</button>
            </div>
            </div>
        </form>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection