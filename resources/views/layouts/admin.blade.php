<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>



</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Igreja Pentecostal Lâmpada para os meus pés</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="../charts.html">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Charts</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="../tables.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="../navbar.html">Navbar</a>
            </li>
            <li>
              <a href="../cards.html">Cards</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="../login.html">Login Page</a>
            </li>
            <li>
              <a href="../register.html">Registration Page</a>
            </li>
            <li>
              <a href="../forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="../blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Colaboradores">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#membros" >
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Membros</span>
          </a>
          <ul class="sidenav-second-level collapse" id="membros" >
            <li>
              <a href="{!!URL::to('/membros-novo')!!}"><i class="fa fa-fw fa-plus"></i>Cadastrar</a>
            </li>
            <li>
              <a href="{!!URL::to('/membros')!!}"><i class="fa fa-fw fa-list"></i>Listar</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Eventos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#eventos" >
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Eventos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="eventos" >
            <li>
              <a href="{!!URL::to('/eventos-novo')!!}"><i class="fa fa-fw fa-plus"></i>Cadastrar</a>
            </li>
            <li>
              <a href="{!!URL::to('/eventos')!!}"><i class="fa fa-fw fa-list"></i>Listar</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Finanças">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#financas" >
            <i class="fa fa-fw fa-balance-scale"></i>
            <span class="nav-link-text">Finanças</span>
          </a>
          <ul class="sidenav-second-level collapse" id="financas" >
            <li>
              <a href="{!!URL::to('/financas-gestao')!!}"><i class="fa fa-area-chart" aria-hidden="true"></i>Gestão</a>
            </li>
            <li>
              <a href="{!!URL::to('/financas-entrada')!!}"><i class="fa fa-arrow-right "></i>Entrada</a>
            </li>
            <li>
              <a href="{!!URL::to('/financas-saida')!!}"><i class="fa fa-arrow-left"></i>Saída</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Relatórios">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#relatorios" >
            <i class="fa fa-file-pdf-o"></i>
            <span class="nav-link-text">Relatórios</span>
          </a>
          <ul class="sidenav-second-level collapse" id="relatorios" >
            <li>
              <a href="{!!URL::to('/relatorio-eventos')!!}"><i class="fa fa-fw fa-calendar" aria-hidden="true"></i>Eventos</a>
            </li>
            <li>
              <a href="{!!URL::to('/relatorio-financas')!!}"><i class="fa fa-fw fa-balance-scale "></i>Finanças</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" title="E-mail">
          <a class="nav-link" href="{!!URL::to('/enviar-email')!!}"><i class="fa fa-envelope-o" aria-hidden="true"></i> E-mail</a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <span style="color: #ffffff">
          {!! \Illuminate\Support\Facades\Auth::user()->name !!}</span>
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" style="padding: 0; left: 10px">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    @yield('content')
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Logout" se você estiver pronto para encerrar sua sessão.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <script>
      $('.date').mask('99/99/9999');
      $('.telefone').mask('(99)99999-9999');
      $('.money').mask('#.##0,00', {reverse: true});

    </script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
