<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Clínica Escola-SCM - Painel de controle</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="shortcut icon" href="./icon-clinica.png" />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>

<?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>
<link href='assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/fullcalendar/moment.min.js'></script>
<script src='assets/fullcalendar/fullcalendar.min.js'></script>
<?php endif; ?>

</head>

<body>
<?php if(isset($_SESSION["user_id"])):?>
  <div class="wrapper">

      <div class="sidebar" data-color="blue">
      <div class="logo">
        <a href="./" class="simple-text">
          <img src="/clinicaescolascm/logo-clinica.png">
        </a>
      </div>

        <div class="sidebar-wrapper">
              <ul class="nav">
                  <li class="">
                      <a href="./">
                          <i class="fa fa-calendar"></i>
                          <p>Início</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=reservations">
                          <i class="fa fa-list-alt"></i>
                          <p>Consultas</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=pacients">
                          <i class="fa fa-male"></i>
                          <p>Pacientes</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=medics">
                          <i class="fa fa-user-md"></i>
                          <p>Médicos</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=categories">
                          <i class="fa fa-list-ol"></i>
                          <p>Categorias/áreas</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=reports">
                          <i class="fa fa-area-chart"></i>
                          <p>Relatórios/financeiro</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=users">
                          <i class="fa fa-users"></i>
                          <p>Usuários</p>
                      </a>
                  </li>
              </ul>
        </div>
      </div>

      <div class="main-panel">
      <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Alternar navegação</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><b>Sistema de Consultas Médicas</b></a>

          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Sair</a></li>
                </ul>
              </li>
            </ul>

            <!-- BUSCAR -->
            <form class="navbar-form navbar-right" role="search">
              <div class="form-group  is-empty">
                <input type="text" class="form-control" placeholder="Buscar">
                <span class="material-input"></span>
              </div>
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="fa fa-search"></i><div class="ripple-container"></div>
              </button>
            </form>
            
          </div>
        </div>
      </nav>

      <div class="content">
      <div class="container-fluid">
<?php 
  // pode carregar outras funções iniciais
  // dentro da funcao onde carrega a view atual
  // como por exemplo carrega page atual
  View::load("login");

?>
      </div>
      </div>

      <footer class="footer">
        <div class="container-fluid">
          <nav class="pull-left">
            <ul>
              <li>
                <a href="./?view=changelog" >
                  Sobre
                </a>
              </li>
              <li>
                <a href="http://www.fcm.edu.br/clinicaescola/" target="_blank">
                  Clínica Escola
                </a>
              </li>
        <!--
              <li>
                <a href="#">
                  Company
                </a>
              </li>
              <li>
                <a href="#">
                  Portfolio
                </a>
              </li>
              <li>
                <a href="#">
                   Blog
                </a>
              </li>
          -->
            </ul>
          </nav>
          <p class="copyright pull-right">
            <a style="color:green;" href="http://www.fcm.edu.br/clinicaescola/" target="_blank">Clínica Escola</a> &copy; 2017 
          </p>
        </div>
      </footer>
    </div>
  </div>
<?php else:?>
  <?php 
  View::load("login");

?>

<?php endif;?>
</body>

  <!--   Core JS Files   -->
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>

  <!--  Charts Plugin -->
  <script src="assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>

  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

  <!-- Material Dashboard javascript methods -->
  <script src="assets/js/material-dashboard.js"></script>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/js/demo.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){

      // Javascript method's body can be found in assets/js/demos.js
          demo.initDashboardPageCharts();

      });
  </script>

</html>
