@extends('layouts.usuario.index')
@push('script')
<!-- DataTables -->
<script src="{{asset('template_adm/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template_adm/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('template_adm/plugins/timepicker/bootstrap-timepicker.min.css')}}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
<!-- InputFilePTBR -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/input.file.js/fileinput.min.css')}}">

<!-- bootstrap time picker -->
<script src="{{asset('template_adm/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('template_adm/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('template_adm/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- InputFilePTBR -->
<script src="{{asset('template_adm/bower_components/input.file.js/fileinput.js')}}"></script>
<script src="{{asset('template_adm/bower_components/input.file.js/locales/pt-BR.js')}}"></script>

<script>
$(function(){
    $('#tbl_inscricoes').DataTable({
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
        'processing': true,
        'autoWidth': false,
    });

    $('input[type=file]').fileinput({
        language: "pt-BR",
        //minImageCount: 0,
        //maxImageCount: 1,
        allowedFileExtensions: ["jpg", "png", "gif"],
        initialPreview: [
            <?php if($evento->foto != null){ ?>
                "{{'/storage/timeline/'.$evento->foto}}",
            <?php } ?>
        ],
        deleteUrl: "{{'/storage'}}",
        uploadExtraData:{'_token':$("#csrf_token").val()},
        initialPreviewAsData: true,
        //initialPreviewFileType: "image",
        initialPreviewConfig: [
            <?php if($evento->foto != null){ ?>
                {caption: "{{$evento->foto}}", extra: {id: {{$evento->id}}, foto: "{{$evento->foto}}", _token: $("#csrf_token").val()}, size: 215000, width: "120px", url: "/usuario/excluirFotoEvento", key: 1},
            <?php } ?>
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

    $('#duracao').daterangepicker({ 
        timePicker24Hour: true,
        timePicker: true,
        timePickerIncrement: 30, 
        locale: {
            format: 'DD/MM/YYYY H:mm'
        },
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
    Editar evento
    <!--<small>it all starts here</small>-->
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <form id="editarEventoFormulario" data-toggle="validator" method="POST" role="form" action="{{route('usuario.atualizarEvento')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$evento->id}}">
    <div class="box">
        <div class="box-body">
            <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label >Nome</label>
                    <input value="{{$evento->nome}}" name="nome" type="text" class="form-control" placeholder="Nome" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label >Data e horário de início e término:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <input value="{{muda_data_tempo_($evento->dados_horario_inicio) . ' - ' . muda_data_tempo_($evento->dados_horario_fim)}}" name="data" type="text" class="form-control pull-right" id="duracao">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors">
                    </div>
                </div>
                <!--<input id="data" name="data" type="date" class="form-control" placeholder="Ordem">-->
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label >Local:</label>
                    <input value="{{$evento->dados_local}}" name="local" type="text" class="form-control" placeholder="Local" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label >Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3" placeholder="Descrição">{{$evento->descricao}}</textarea>
                </div>
            </div>
            </div>
            
            <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label >Foto</label>
                    <input name="foto" type="file" id="input_img">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            </div>

        </div>
        <div class="box-footer">
            <a href="/usuario/eventos" class="btn btn-warning pull-left">Cancelar</a>
            <button type="submit" class="btn btn-primary pull-right">Salvar alteração</button>
        </div>
    </div>

    <form id="editarInscricoesFormulario" data-toggle="validator" method="POST" role="form" action="{{route('usuario.atualizarInscricoes')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$evento->id}}">
    <div class="box">
        <div class="box-body">
            <div class="row">
            <div class="col-md-12">
                <label >Incrições: {{(isset($inscricoes)) ? sizeof($inscricoes) : "0"}}</label>
                <table id="tbl_inscricoes" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Cancelar</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($inscricoes) && sizeof($inscricoes) > 0) foreach($inscricoes as $inscricao){
                        ?>
                        <tr>
                            <td>{{$inscricao->id}}</td>
                            <td>{{$inscricao->email}}</td>
                            <td>{{$inscricao->telefone}}</td>
                            <td><input name="inscricoes[]" value="{{$membro->id}}" type="checkbox" {{($inscricao->cancelada) ? "checked" : ""}}></td>
                        <?php
                    }
                    ?>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="/usuario/eventos" class="btn btn-warning pull-left">Cancelar</a>
            <button type="submit" class="btn btn-primary pull-right">Salvar alteração</button>
        </div>
    </div>
    </form>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection