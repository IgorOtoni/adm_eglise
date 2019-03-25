<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SGE Eglise</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('template_adm/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template_adm/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('template_adm/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template_adm/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('template_adm/dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"><b>Plataforma Eglise</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{route('login')}}">Login</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Congregações
          <!--<small>Example 2.0</small>-->
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        @foreach ($igrejas_e_configuracoes as $igreja)
          <div class="col-xs-6">
            <!-- Attachment -->
            <div class="attachment-block clearfix">
            @if ($igreja->logo != null)
              <img class="attachment-img" src="/storage/igrejas/{{$igreja->logo}}" alt="Attachment Image">
            @else
              <img class="attachment-img" src="/storage/no-logo.jpg" alt="Attachment Image">
            @endif
            
            <div class="attachment-pushed">
                <h4 class="attachment-heading">
                  <a href="igreja/{{($igreja->url != null) ? $igreja->url: "#"}}">{{$igreja->nome}}</a>
                </h4>

                <div class="attachment-text">
                Estado: {{$igreja->estado}}<br/>
                Cidade: {{$igreja->cidade}}<br/>
                Bairro: {{$igreja->bairro}}<br/>
                Rua: {{$igreja->rua}}<br/>
                Número: {{$igreja->num}}<br/>
                @if ($igreja->complemento != null)
                  Complemento: {{$igreja->complemento}}
                @else
                  Complemento: <span class="label bg-red">Não informado</span>
                @endif
                <br/>
                @if ($igreja->telefone != null)
                  Telefone: {{$igreja->telefone}}
                @else
                  Telefone: <span class="label bg-red">Não informado</span>
                @endif
                </div>
                <!-- /.attachment-text -->
            </div>
            <!-- /.attachment-pushed -->
            </div>
            <!-- /.attachment-block -->
          </div>
        @endforeach
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Plataforma Eglise</b>
      </div>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('template_adm/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('template_adm/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('template_adm/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('template_adm/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template_adm/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template_adm/dist/js/demo.js')}}"></script>
</body>
</html>