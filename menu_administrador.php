<?php
    include('conexion.php');
    session_start();

    if(!isset($_SESSION['id_rol'])){
        header("Location: InicioSesion.html");
    }else{
        if ($_SESSION['id_rol'] != 2){
            header("Location: menu_administrador.php");
        }
    }

    if($_POST['titulo'] != ''){
      
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

  <title>Menu Administrador</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="fonts/fonts.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/estilo2.css" rel="stylesheet">
  <script src="js/tools.js"></script>
  
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body id="page-top">
    <?php
      $consulta = "SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE rol.id_rol = '2'";
      $resultado = mysqli_query($enlace, $consulta);
      $fila = mysqli_fetch_array($resultado);
    ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - imagen -->
      <center>
        <a class="navbar-brand" href="menu_administrador.php"><img src="img/Logo.jpg" alt="" width="65" height="0" class="rounded img-fluid d-inline-block align-text-top"></a>
      </center>
      <hr class="sidebar-divider my-0">
      <br>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="editar_datos_admi.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>" ><i class="bi bi-gear-fill"></i><span>Editar Datos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="foro2.php"><i class="bi bi-chat-dots-fill"></i><span>Foro</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publicacion.php"><i class="bi bi-chat-dots-fill"></i><span>A??adir publicaci??n</span></a>
      </li>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <ul class="navbar-nav ml-auto">
            <div class="navbar-nav mr-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSalir">Cerrar Sesi??n <i class="bi bi-box-arrow-right"></i></button>
                <!-- Modal Salir-->
                <div class="modal fade" id="modalSalir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" >
                        <div class="modal-content">
                            <div class="modal-header bg-primary" >
                                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Advertencia!!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <h4>??Est?? seguro de salir?</h4>  
                                </center>
                            </div>
                            <div class="modal-footer">
                                <a href="salir.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Si</button>
                                </a>
                                <a href="menu_administrador.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
          </ul>
        </nav>

        <b>
        <center>
            <font face="Times New Roman" size="8" color="Black">Bienvenido(a)!!!</font>
        </center>

        </b>

        <div class="container-fluid">
          <!-- Vuelos Nacionales Activos -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text font-weight-bold text-primary text-uppercase mb-1">Vuelos Nacionales Activos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php  
                          $consulta = "SELECT suma_vuelo_nacional()";
                          $resultado = mysqli_query($enlace, $consulta);
                          $fila = mysqli_fetch_array($resultado);
                          echo $fila['suma_vuelo_nacional()']; 
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-plane fa-2x text-gray-300" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <!-- Vuelos Internacionales Activos -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-success text-uppercase mb-1">Vuelos Internacionales Activos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php  
                            $consulta = "SELECT suma_vuelo_internacional()";
                            $resultado = mysqli_query($enlace, $consulta);
                            $fila = mysqli_fetch_array($resultado);
                            echo $fila['suma_vuelo_internacional()'];  
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-plane fa-2x text-gray-300" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
          </div>

          <div class="container-fluid">
            <!-- Vuelos Nacionales Realizados -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-info text-uppercase mb-1">Vuelos Nacionales Realizados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php  
                          $consulta = "SELECT suma_vuelo_nacional_realizado()";
                          $resultado = mysqli_query($enlace, $consulta);
                          $fila = mysqli_fetch_array($resultado);
                          echo $fila['suma_vuelo_nacional_realizado()'];  
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="bi bi-check2-all fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <!-- Vuelos Internacionales Realizados -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-warning text-uppercase mb-1">Vuelos Internacionales Realizados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php  
                          $consulta = "SELECT suma_vuelo_internacional_realizado()";
                          $resultado = mysqli_query($enlace, $consulta);
                          $fila = mysqli_fetch_array($resultado);
                          echo $fila['suma_vuelo_internacional_realizado()'];  
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="bi bi-check2-all fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>  
      </div>   
    </div>
    <?php
      mysqli_close($enlace);
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>