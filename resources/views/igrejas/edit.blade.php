@extends('layouts.admin_site.index')
@push('script')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/select2/dist/css/select2.min.css')}}">
<!-- InputFilePTBR -->
<link rel="stylesheet" href="{{asset('template_adm/bower_components/input.file.js/fileinput.min.css')}}">
<!-- Toogle Button -->
<link rel="stylesheet" href="{{asset('template_adm/plugins/switch/switch.css')}}">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="{{asset('template_adm/plugins/toastr/toastr.min.css')}}">

<!-- Select2 -->
<script src="{{asset('template_adm/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('template_adm/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('template_adm/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('template_adm/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- InputFilePTBR -->
<script src="{{asset('template_adm/bower_components/input.file.js/fileinput.js')}}"></script>
<script src="{{asset('template_adm/bower_components/input.file.js/locales/pt-BR.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('template_adm/plugins/toastr/toastr.min.js')}}"></script>

<script>
function switch_status(comp){
  var id = $(comp).prop('id');
  var nome = $(comp).prop('name');
  $.ajax({
    url: '/igrejas/switchStatus/'+id,
    type: 'GET'
  });
  if($(comp).prop('checked') == true){
    toastr.success(nome + " teve seu status ativado!");
  }else{
    toastr.error(nome + " teve seu status desativado!");
  }
}

$(function () {
  $('.select2').select2();

  $('[data-mask]').inputmask();

  $('input[type=file]').fileinput({
      language: "pt-BR",
      minFileCount: 0,
      maxFileCount: 1,
      allowedFileExtensions: ["jpg", "png", "gif"],
      initialPreview: [
        "{{'http://localhost/adm_eglise/public/img/igrejas/'.$igreja->logo}}",
      ],
      initialPreviewAsData: true,
      initialPreviewFileType: "image",
      initialPreviewConfig: [
        {caption: "{{$igreja->logo}}", size: 215000, width: "120px", downloadurl: "{{'http://localhost/adm_eglise/public/img/igrejas/'.$igreja->logo}}", key: 1},
      ],
      purifyHtml: true,
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

  $('#incluirIgrejaFormulario').validator({
    update: true,
    ignore: [],       
    rules: {
      //Rules
    },
    messages: {
      //messages
    }
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
        Blank page
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <form id="incluirIgrejaFormulario" data-toggle="validator" method="POST" role="form" action="{{url('igrejas/incluir')}}" enctype="multipart/form-data">
        @csrf
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label >Nome</label>
                    <input name="nome" type="text" class="form-control" placeholder="Nome" value="{{$igreja->nome}}" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label >CEP</label>
                      <input id="cep" name="cep" type="text" class="form-control" placeholder="CEP" data-inputmask='"mask": "99.999-999"' value="{{$igreja->cep}}" data-mask required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label >Estado</label>
                      <input id="uf" name="estado" type="text" class="form-control" placeholder="Estado" value="{{$igreja->estado}}" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label >Cidade</label>
                      <input id="cidade" name="cidade" type="text" class="form-control" placeholder="Cidade" value="{{$igreja->cidade}}" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label >Bairro</label>
                      <input id="bairro" name="bairro" type="text" class="form-control" placeholder="Bairro" value="{{$igreja->bairro}}" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label >Rua</label>
                      <input id="rua" name="rua" type="text" class="form-control" placeholder="Rua" value="{{$igreja->rua}}" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="form-group">
                      <label >Complemento</label>
                      <input name="complemento" type="text" class="form-control" placeholder="Complemento" value="{{$igreja->complemento}}">
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label >Número</label>
                      <input name="num" type="number" class="form-control" placeholder="Número" value="{{$igreja->num}}" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label >Telefone</label>
                      <input name="telefone" type="text" class="form-control" placeholder="Telefone" data-inputmask='"mask": "(99) 99999-9999"' data-mask value="{{$igreja->telefone}}">
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label >Logo</label>
                    <input name="logo" type="file" id="input_img">
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <label>Módulos do sistema</label>
                  <select name="modulos[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione o módulo"
                          style="width: 100%;" required>
                    <?php $modulos = App\TblModulo::orderBy('nome','ASC')->get();
                    foreach ($modulos as $modulo){
                      $achou = false;
                      foreach ($modulos_igreja as $modulo_igreja){
                        if($modulo_igreja->id == $modulo->id){
                          ?>
                          <option value="{{$modulo->id}}" selected>{{$modulo->nome}}</option>
                          <?php
                          $achou = true;
                          break;
                        }
                      }
                      if(!$achou){
                        ?>
                        <option value="{{$modulo->id}}">{{$modulo->nome}}</option>
                        <?php
                      }
                    } ?>
                  </select>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>

          </div>
          <div class="box-footer">
            <a href="/igrejas" class="btn btn-warning pull-left">Cancelar</a>
            <button type="submit" class="btn btn-primary pull-right">Salvar alteração</button>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection