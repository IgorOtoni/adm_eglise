@extends('layouts.usuario.index')
@push('script')
<!-- InputFilePTBR -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/input.file.js/fileinput.min.css')}}">

<!-- InputFilePTBR -->
<script src="{{asset('template_adm/bower_components/input.file.js/fileinput.js')}}"></script>
<script src="{{asset('template_adm/bower_components/input.file.js/locales/pt-BR.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('template_adm/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template_adm/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- DataTables Plugins -->
<script src="{{asset('template_adm/bower_components/datatables.plugins/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('template_adm/bower_components/datatables.plugins/buttons.html5.min.js') }}"></script>
<script src="{{asset('template_adm/bower_components/datatables.plugins/jszip.min.js') }}"></script>
<script src="{{asset('template_adm/bower_components/datatables.plugins/pdfmake.min.js') }}"></script>
<script src="{{asset('template_adm/bower_components/datatables.plugins/vfs_fonts.js') }}"></script>

<style>
td.details-control {
    background: url('/images/details_open.jpeg') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('/images/details_close.jpeg') no-repeat center center;
}
</style>

<script>
function format ( d ) {
    // `d` is the original data object for the row
    return '<table class="table table-bordered">'+
        '<tr>'+
            '<th>Nome:</th>'+
            '<th>Descrição:</th>'+
            '</tr>'+
        '<tr>'+
            '<td>'+valida(d.nome)+'</td>'+
            '<td>'+valida(d.descricao)+'</td>'+
            '</tr>'+
        '</table>';
}

function valida(txt){
  return (txt ? txt : '<span class="label bg-red">Não informado</span>')
}

$(function(){
    var html_modulos_area = $("#modal-incluir #modulos_area").html();
    $("#modal-incluir #modulos_area").html("");
    var html_publicacoes_area = $("#modal-incluir #publicacoes_area").html();
    $("#modal-incluir #publicacoes_area").html("");
    var html_url_externa_area = $("#modal-incluir #url_externa_area").html();
    $("#modal-incluir #url_externa_area").html("");

    $('#incluirBannerFormulario').validator('update');
    $('#incluirBannerFormulario').validator('validate');

    $('#modal-incluir #link').on('change', function (event) {
        $("#modal-incluir #modulos_area").html("");
        $("#modal-incluir #publicacoes_area").html("");
        $("#modal-incluir #url_externa_area").html("");

        op = $("#modal-incluir #link").val();
        if(op == 1){
            $("#modal-incluir #modulos_area").html(html_modulos_area);
        }else if(op == 2){
            $("#modal-incluir #publicacoes_area").html(html_publicacoes_area);
        }else if(op == 3){
            $("#modal-incluir #url_externa_area").html(html_url_externa_area);
        }

        $('#incluirBannerFormulario').validator('update');
        $('#incluirBannerFormulario').validator('validate');
    });

    var table = $('#tbl_banners').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
    
        "language": {            
        "sEmptyTable":   "Nenhum registro encontrado",
        "sProcessing":   "Carregando,aguarde...",
        "sLengthMenu":   "Mostrar _MENU_ registos",
        "sZeroRecords":  "A busca não retornou nehum registro",
        "sInfo":         "Mostrando de _START_ à _END_ de um total de _TOTAL_ registros",
        "sInfoEmpty":    "Mostrando de 0 à 0 de um total 0 registros",
        "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
        "sInfoPostFix":  "",
        "sSearch":       "Pesquisar:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "Primeiro",
            "sPrevious": "Anterior",
            "sNext":     "Próximo",
            "sLast":     "Último"
        },
        "oAria": {
            "sSortAscending":  ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
        },
        dom: 'Bfrtip',
        buttons: [
        { "extend": 'excelHtml5', "text":'EXCEL',"className": 'btn btn-primary' },
        { "extend": 'csvHtml5', "text":'CSV',"className": 'btn btn-primary' },
        { "extend": 'pdfHtml5', "text":'PDF',"className": 'btn btn-primary' },
            //'excelHtml5','csvHtml5','pdfHtml5'
        ],
        'processing': true,
        'autoWidth': false,
        //'serverSide': false,
        'ajax': '{{route('usuario.tbl_banners')}}',
        'columns': [
                {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
                },
                { data: 'id', name: 'id' },
                { data: 'nome', name: 'nome' },
                { data: 'action', name: 'action' },
                ],
                order: [[1, 'asc']]
    });

    // Add event listener for opening and closing details
    $('#tbl_banners tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });

    $('input[type=file]').fileinput({
        language: "pt-BR",
        //minImageCount: 1,
        //maxImageCount: 1,
        //uploadUrl: "/file-upload-batch/2",
        allowedFileExtensions: ["jpg", "png", "gif"]
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
    Banners
    <small>Lista de todos os banners da congregação</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <?php if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg'), \Config::get('constants.permissoes.incluir'))[2] == true){ ?>
            <div class="pull-right">
            <a class="btn btn-success" data-toggle="modal" data-target="#modal-incluir"><i class="fa fa-plus"></i>&nbspIncluir banner</a>
            </div>
        <?php } ?>
    </div>
    <div class="box-body">
        <table id="tbl_banners" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        
        </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modals -->
<div class="modal fade" id="modal-incluir">
<form id="incluirBannerFormulario" data-toggle="validator" method="POST" role="form" action="{{route('usuario.incluirBanner')}}" enctype="multipart/form-data">
@csrf
    <input type="hidden" name="igreja" id="igreja" value="{{$igreja->id}}">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Incluir banner</h4>
        </div>
        <div class="modal-body">
        <!-- form start -->
        
            <div class="box-body">
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label >Nome</label>
                        <input name="nome" type="text" class="form-control" placeholder="Nome" required>
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
                    <div class="form-group has-feedback">
                        <label >Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3" placeholder="Descrição" required></textarea>
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
                
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label >Foto</label>
                        <input name="foto" type="file" id="input_img" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Incluir</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</form>
</div>
<!-- /.modal -->
@endsection
