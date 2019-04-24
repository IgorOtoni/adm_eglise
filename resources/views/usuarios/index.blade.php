@extends('layouts.admin_site.index')
@push('script')
<!-- DataTables -->
<script src="{{asset('template_adm/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template_adm/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
function switch_status(comp){
  var id = $(comp).prop('id');
  var nome = $(comp).prop('name');
  $.ajax({
    url: '/admin/usuarios/switchStatus/'+id,
    type: 'GET'
  });
  if($(comp).prop('checked') == true){
    toastr.success(nome + " teve seu status ativado!");
  }else{
    toastr.error(nome + " teve seu status desativado!");
  }
}

$(function () {

    $('#tbl_usuarios').DataTable({
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
    'ajax': '/admin/usuarios/tbl_usuarios',
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
    Usuários
    <small>Lista de todos os usuários</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
      <div class="pull-right">
        <a class="btn btn-success" data-toggle="modal" data-target="#modal-incluir"><i class="fa fa-plus"></i>&nbspIncluír usuário</a>
      </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <table id="tbl_usuarios" class="table table-bordered table-striped">
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
        </div>
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

<div class="modal fade" id="modal-incluir">
  <form id="incluirUsuarioFormulario" data-toggle="validator" method="POST" role="form" action="{{route('usuarios.incluir')}}" enctype="multipart/form-data">
  @csrf
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Incluir usuário</h4>
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
                        <label >Email</label>
                        <input name="email" type="text" class="form-control" placeholder="Email" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label >Senha</label>
                        <input minlength="8" maxlength="32" name="senha" type="password" class="form-control" placeholder="Senha">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label >Confirmação da senha</label>
                        <input minlength="8" maxlength="32" name="senhac" type="password" class="form-control" placeholder="Confirmação da senha">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group has-feedback">
                      <label>Selecione o perfil do usuário:</label>
                      <select id="perfil" name="perfil" class="form-control" required>
                        <?php $perfis = App\TblPerfil::orderBy('nome','ASC')->get(); ?>
                        @foreach ($perfis as $perfil)
                        <option value="{{$perfil->id}}">{{$perfil->nome}}</option>
                        @endforeach
                      </select>
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