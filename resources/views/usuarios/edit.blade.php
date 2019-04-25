@extends('layouts.admin_site.index')
@push('script')

@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Editar usuário
    <!--<small>it all starts here</small>-->
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <form id="editarUsuarioFormulario" data-toggle="validator" method="POST" role="form" action="{{route('usuarios.atualizar')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$usuario->id}}">
    <div class="box">
        <div class="box-body">
            <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label >Nome</label>
                    <input value="{{$usuario->nome}}" name="nome" type="text" class="form-control" placeholder="Nome" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label >Email</label>
                    <input value="{{$usuario->email}}" name="email" type="text" class="form-control" placeholder="Email" required>
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
                    <option value="{{$perfil->id}}" {{($perfil->id == $usuario->id_perfil) ? 'selected' : ''}}>{{$perfil->nome}}</option>
                    @endforeach
                </select>
                <div class="help-block with-errors"></div>
                </div>
            </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="/admin/usuarios" class="btn btn-warning pull-left">Cancelar</a>
            <button type="submit" class="btn btn-primary pull-right">Salvar alteração</button>
        </div>
    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection