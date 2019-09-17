<?php 
  session_start();
  if(isset($_SESSION['userType'])){
    if($_SESSION['userType'] != 1){
      header('Location: ../../../');
    }
  }else{
    header('Location: ../../../');
  }
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
    .selectable:hover{
      cursor: pointer;
    }
  </style>

  <title>NitroNet Panel</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="../../../index.php"><img src="../../../img/NitroNet.png" width="40%"></a>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
          <b><?php echo $_SESSION['user'];?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <span class="dropdown-item"></b></span>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar Sesión</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav toggled">
      <li class="nav-item active">
      <span class="nav-link" onclick="loadModule(this)" data-module="resumen">
          <i class="fas fa-fw fa-tachometer-alt"></i>Tablero</span>
      </li>
      <li class="nav-item">
      <span class="nav-link" onclick="loadModule(this)" data-module="mensajes">
          <i class="fas fa-fw fa-envelope"></i>Mensajes</span>
      </li>
      <li class="nav-item">
        <span class="nav-link" onclick="loadModule(this)" data-module="pagos">
        <i class="fas fa-fw fa-dollar"></i>Pagos</span>
      </li>
      <li class="nav-item">
        <span class="nav-link" onclick="loadModule(this)" data-module="clientes">
          <i class="fas fa-fw fa-users"></i>Clientes</span>
      </li>
    </ul>

    <div id="content-wrapper">

      
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">¿Está seguro de cerrar la sesion actual?.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <span class="btn btn-success" onclick="signOut()">Aceptar</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

<script type="text/javascript">
  window.onload = loadInit();

  function loadInit(){
    $('#content-wrapper').load("resumen.php");
  }
  function loadModule(object){
    var toLoad = object.getAttribute('data-module');
    $('#content-wrapper').load(toLoad+".php");
  }

  function signOut(){
        firebase.auth().signOut().then(function() {
            window.location.href = "index.php?onLogout=true";
        }).catch(function(error) {
            // An error happened.
        });
    }
</script>
