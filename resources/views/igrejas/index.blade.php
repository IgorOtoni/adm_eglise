@extends('layouts.admin_site.index')
@push('script')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/select2/dist/css/select2.min.css')}}">
<!-- InputFilePTBR -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/input.file.js/fileinput.min.css')}}">
<!-- Toogle Button -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


<!-- Select2 -->
<script src="{{asset('template_adm/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('template_adm/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('template_adm/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('template_adm/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- InputFilePTBR -->
<script src="{{asset('template_adm/bower_components/input.file.js/fileinput.js')}}"></script>
<script src="{{asset('template_adm/bower_components/input.file.js/locales/pt-BR.js')}}"></script>
<!-- Toogle Button -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- DataTables -->
<script src="{{asset('template_adm/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template_adm/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
$(function () {
  $('.select2').select2()

  $('[data-mask]').inputmask()

  $('input[type=file]').fileinput({
      language: "pt-BR",
      //uploadUrl: "/file-upload-batch/2",
      allowedFileExtensions: ["jpg", "png", "gif"]
  });

  $('.bt-status').bootstrapToggle({
    on: 'Ativa',
    off: 'Inativa'
  });

  function limpa_formulário_cep() {
      // Limpa valores do formulário de cep.
      $("#cep").val("");
      $("#rua").val("");
      $("#bairro").val("");
      $("#cidade").val("");
      $("#uf").val("");
      //$("#ibge").val("");
  }

  $("#cep").keypress(function() {

    var cep = $(this).val().replace(/\D/g, '');
    
    //Preenche os campos com "..." enquanto consulta webservice.
    $("#rua").val("...");
    $("#bairro").val("...");
    $("#cidade").val("...");
    $("#uf").val("...");
    //$("#ibge").val("...");

    //Consulta o webservice viacep.com.br/
    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
        
        if (!("erro" in dados)) {
            //Atualiza os campos com os valores da consulta.
            $("#rua").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            $("#uf").val(dados.uf);
            //$("#ibge").val(dados.ibge);
        } //end if.
        else {
            //CEP pesquisado não foi encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    });
  })

  $('#tbl_igrejas').DataTable({
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
    //'serverSide': false,
    'ajax': '/igrejas/tbl_igrejas',
    'columns': [
            { data: 'id', name: 'id' },
            { data: 'nome', name: 'nome' },
            { data: 'action', name: 'action' },
            ]
    })
  
})
</script>
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="pull-right">
            <a class="btn btn-success" data-toggle="modal" data-target="#modal-incluir"><i class="fa fa-plus"></i>&nbspIncluir igreja</a>
          </div>
        </div>
        <div class="box-body">
            <table id="tbl_igrejas" class="table table-bordered table-striped">
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

  <!-- modal -->
  <div class="modal fade" id="modal-incluir">
    <form method="POST" role="form" action="{{url('igrejas/incluir')}}" enctype="multipart/form-data">
    @csrf
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Incluir igreja</h4>
          </div>
          <div class="modal-body">
            <!-- form start -->
            
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label >Nome</label>
                          <input name="nome" type="text" class="form-control" placeholder="Nome">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >CEP</label>
                            <input id="cep" name="cep" type="text" class="form-control" placeholder="CEP" data-inputmask='"mask": "99.999-999"' data-mask>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Estado</label>
                            <input id="uf" name="estado" type="text" class="form-control" placeholder="Estado">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Cidade</label>
                            <input id="cidade" name="cidade" type="text" class="form-control" placeholder="Cidade">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Bairro</label>
                            <input id="bairro" name="bairro" type="text" class="form-control" placeholder="Bairro">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Rua</label>
                            <input id="rua" name="rua" type="text" class="form-control" placeholder="Rua">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label >Complemento</label>
                            <input name="complemento" type="text" class="form-control" placeholder="Complemento">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Número</label>
                            <input name="num" type="number" class="form-control" placeholder="Número">
                        </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label >Logo</label>
                          <input name="logo" type="file" id="input_img" onchange="muda_imagem()">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Módulos do sistema</label>
                        <select name="modulos[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione o módulo"
                                style="width: 100%;">
                          <?php $modulos = App\TblModulo::orderBy('nome','ASC')->get(); ?>
                          @foreach ($modulos as $modulo)
                            <option value="{{$modulo->id}}">{{$modulo->nome}}</option>
                          @endforeach
                        </select>
                      </div>
                      <!-- /.form-group -->
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