<?php
    include('conexion.php');
    session_start();

    if(!isset($_SESSION['id_rol'])){
        header("Location: InicioSesion.html");
    }else{
        if ($_SESSION['id_rol'] != 3){
            header("Location: menu_usuario.php");
        }
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

  <title>Menu Usuario</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="fonts/fonts.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/estilo2.css" rel="stylesheet">
  
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body id="page-top">
    <?php
      $consulta = "SELECT vuelo.id_vuelo, vuelo.codVuelo, aerolineas.nombre_aerolinea, origen.ciudad_origen, vuelo.fecha_hora_salida, destino.ciudad_destino, tiempo_vuelo.id_cant_horas,
      DATE_ADD(DATE_ADD(vuelo.fecha_hora_salida, INTERVAL destino.tiempo_dif_ida HOUR), INTERVAL  tiempo_vuelo.cantidad_horas HOUR) AS fecha_hora_llegada,
      vuelo.costo_vuelo, (vuelo.costo_vuelo + 230000) AS costo_primera_clase FROM vuelo 
      INNER JOIN origen ON vuelo.id_ciudad_origen = origen.id_ciudad_origen 
      INNER JOIN destino ON vuelo.id_ciudad_destino = destino.id_ciudad_destino 
      INNER JOIN tipo_vuelo ON vuelo.id_tipo_vuelo = tipo_vuelo.id_tipo_vuelo 
      INNER JOIN aerolineas ON vuelo.id_aerolinea = aerolineas.id_aerolinea
      INNER JOIN tiempo_vuelo ON vuelo.id_cant_horas = tiempo_vuelo.id_cant_horas 
      WHERE tipo_vuelo.id_tipo_vuelo = '2' AND vuelo.estado = 'Activo' ORDER BY id_vuelo;";
      $resultado = mysqli_query($enlace, $consulta);
      $fila = mysqli_fetch_array($resultado);
    ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - imagen -->
      <center>
        <a class="navbar-brand" href="menu_usuario.php"><img src="img/Logotipo.png" alt="" width="65" height="0" class="rounded img-fluid d-inline-block align-text-top"></a>
      </center>
      <hr class="sidebar-divider my-0">
      <br>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="editar_datos_usuario.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>" ><i class="bi bi-gear-fill"></i><span>Editar Datos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mostrar_tarjetas.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><i class="bi bi-credit-card-fill"></i><span>Agregar Tarjeta</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-envelope-check-fill"></i><span>Noticias</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="administrar_vuelo_usuario.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><i class="bi bi-clipboard2-check-fill"></i></i><span>Organiza tu Vuelo</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-cart-check-fill"></i><span>Mis Vuelos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-plane"></i><span>Compra tu Tiquete</span>
        </a>
        <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tipo de Vuelo:</h6>
              <a class="collapse-item" href="mostrar_vuelos_nacionales.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Nacional</a>
              <a class="collapse-item" href="mostrar_vuelos_internacionales_ida.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Colombia --> Internacional</a>
              <a class="collapse-item" href="mostrar_vuelos_internacionales_regreso.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Internacional --> Colombia</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="forousuario.php"><i class="bi bi-chat-square-text-fill"></i><span>Foro</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="eliminar_cuenta.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><i class="bi bi-person-dash-fill"></i><span>Eliminar Cuenta</span></a>
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
                                <a href="menu_usuario.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
          </ul>
        </nav> 
        <div style="width: 95%;margin:auto ;margin-top: 5px;" class="row">
        <center><img src="img/carritoeditar.jpeg" height="60" alt="Responsive image" class="rounded img-fluid d-inline-block align-text-top"></center>
          <div class="col-10 my-auto mx-auto">
            <br><br><br><center><h3>Tus productos</h3></center><br>
          </div>
          <div style="border: solid; border-radius: 10px; border-color: #85929E; width: 900px" class="col-6 my-auto mx-auto row">
            <div style=" width: 300px; " class="col-6 my-auto mx-auto">
              <ul style="list-style:none; padding-left: 1px; ">
                <li><b>Codigo de vuelo: </b><?php echo $fila['codVuelo'];?></li>
                <li><b>Salida: </b><?php echo $fila['ciudad_origen'];?></li>
                <li><b>Destino: </b><?php echo $fila['ciudad_destino'];?></li>
                <li><b>Fecha salida: </b> <?php echo $fila['fecha_hora_salida'];?></li>
                <li><b>Feccha llegada: </b><?php echo $fila['fecha_hora_llegada'];?></li>
                <li><b>Tipo de plan: </b>Primera clase</li>
              </ul>
            </div>

            <div style=" width: 250px;  margin-top: 10px; text-align: center;" class="col-4"><br>
              <h5>Precio</h5><p> $ <?php echo $fila['costo_primera_clase'];?> COP</p>
            </div>

            <div style=" width: 250px; margin-top: 10px; " class="col-4"><br>
              <?php
                $consulta = "SELECT * FROM num_tiquetes";
                $resultado = mysqli_query($enlace, $consulta);
                $fila = mysqli_fetch_array($resultado);
              ?>
              <label><h5>Numero de Tiquetes</h5></label><br>
              <select name="id_num_personas" >
                <?php
                  $consulta_mysql='select * from num_tiquetes';
                  $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                  while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                  echo "<option  value='".$lista["id_num_personas"]."'>";
                  echo $lista["tipo_personas"];
                  echo "</option>";
                  }
                ?>
              </select>
              <p style="text-align: center; margin-top: 50px; "> <a href="finalizar_compra.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"> <button type="button" class="btn btn-primary"> Realizar Compra </button> </a></p>
            </div>
          </div>  
        </div>
      </div>
    </div>
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