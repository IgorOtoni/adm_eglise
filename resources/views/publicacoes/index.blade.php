@extends('layouts.admin_site.index')
@push('script')
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('template_adm/bower_components/ckeditor/ckeditor.js')}}"></script>

<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor')
})
</script>
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Publicações
    <small>Lista de todas as publicações</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="pull-right">
        <a class="btn btn-success" data-toggle="modal" data-target="#modal-incluir"><i class="fa fa-plus"></i>&nbspIncluír publicação</a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <table id="tbl_perfis" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
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
</div>

<div class="modal fade" id="modal-incluir">
<form id="incluirPublicacoesFormulario" data-toggle="validator" method="POST" role="form" action="{{route('publicacoes.incluir')}}" enctype="multipart/form-data">
@csrf
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Incluir publicação</h4>
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
                        <label >Conteúdo da publicação</label>
                        <textarea name="html" id="editor" class="form-control"></textarea>
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