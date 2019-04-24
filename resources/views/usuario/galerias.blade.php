@extends('layouts.usuario.index')
@push('script')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<!-- InputFilePTBR -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/input.file.js/fileinput.min.css')}}">

<!-- InputFilePTBR -->
<script src="{{asset('template_adm/bower_components/input.file.js/fileinput.js')}}"></script>
<script src="{{asset('template_adm/bower_components/input.file.js/locales/pt-BR.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('template_adm/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template_adm/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('template_adm/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script>
$(function(){
    $('#tbl_galerias').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
    
        /*"language": {            
            "sEmptyTable":   "Nenhum registro encontrado",
            "sProcessing":   "Carregando,aguarde...",
            "sLengthMenu":   "Mostrar MENU registos",
            "sZeroRecords":  "A busca não retornou nehum registro",
            "sInfo":         "Mostrando de START à END de um total TOTAL registros",
            "sInfoEmpty":    "Mostrando de 0 à 0 de um total 0 registros",
            "sInfoFiltered": "(filtrado de MAX registros no total)",
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
            },*/
    
        'processing': true,
        'autoWidth': false,
        //'serverSide': false,
        'ajax': '{{route('usuario.tbl_galerias')}}',
        'columns': [
                { data: 'id', name: 'id' },
                { data: 'nome', name: 'nome' },
                { data: 'action', name: 'action' },
                ]
    });

    $('input[type=file]').fileinput({
        language: "pt-BR",
        //minImageCount: 1,
        //maxImageCount: 1,
        //uploadUrl: "/file-upload-batch/2",
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

    //Date picker
    $('#datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
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
    Galerias
    <small>Lista de todas as galerias da congregação</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <?php if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg'), \Config::get('constants.permissoes.incluir'))[2] == true){ ?>
            <div class="pull-right">
            <a class="btn btn-success" data-toggle="modal" data-target="#modal-incluir"><i class="fa fa-plus"></i>&nbspIncluir galeria</a>
            </div>
        <?php } ?>
    </div>
    <div class="box-body">
        <table id="tbl_galerias" class="table table-bordered table-striped">
        <thead>
        <tr>
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
    <div class="box-footer">
        Footer
    </div>
    <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modals -->
<div class="modal fade" id="modal-incluir">
<form id="incluirGaleriaFormulario" data-toggle="validator" method="POST" role="form" action="{{route('usuario.incluirGaleria')}}" enctype="multipart/form-data">
@csrf
    <input type="hidden" name="igreja" id="igreja" value="{{$igreja->id}}">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Incluir galeria</h4>
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
                    <div class="form-group">
                    <label >Data:</label>
                    <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input name="data" type="text" class="form-control pull-right" id="datepicker">
                    </div>
                    <!--<input id="data" name="data" type="date" class="form-control" placeholder="Ordem">-->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label >Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3" placeholder="Descrição"></textarea>
                    </div>
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label >Fotos</label>
                        <input name="fotos[]" type="file" id="input_img" multiple required>
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