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

  <title>Menu Administrador</title>
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
      $consulta = "SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE rol.id_rol = '2'";
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
            <div>
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
                        <center><h4>??Est?? seguro de salir?</h4></center>
                        </div>
                        <div class="modal-footer">
                        <a href="salir.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Si</button></a>
                        <a href="listar_vuelo_nacional.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button></a>
                        </div>
                    </div>
                    </div>
                </div>
                </ul>
            </nav>
            </div>
            <!-- DataTable -->
            </b>
            <div class="container-fluid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <div class="text-center">
                        </div>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                <table id="tablaAdmi" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th><center>Aerolinea</center></th>
                        <th><center>Datos de Salida</center></th>
                        <th><center>Datos de Destino</center></th>
                        <th><center>Opciones</center></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $consulta = "SELECT vuelo.id_vuelo, vuelo.codVuelo, aerolineas.nombre_aerolinea, origen.ciudad_origen, vuelo.fecha_hora_salida, destino.ciudad_destino, tiempo_vuelo.id_cant_horas,
                        DATE_ADD(DATE_ADD(vuelo.fecha_hora_salida, INTERVAL destino.tiempo_dif_regreso HOUR), INTERVAL tiempo_vuelo.cantidad_horas HOUR) AS fecha_hora_llegada,
                        vuelo.costo_vuelo, (vuelo.costo_vuelo + 230000) AS costo_primera_clase FROM vuelo 
                        INNER JOIN origen ON vuelo.id_ciudad_origen = origen.id_ciudad_origen 
                        INNER JOIN destino ON vuelo.id_ciudad_destino = destino.id_ciudad_destino 
                        INNER JOIN tipo_vuelo ON vuelo.id_tipo_vuelo = tipo_vuelo.id_tipo_vuelo
                        INNER JOIN aerolineas ON vuelo.id_aerolinea = aerolineas.id_aerolinea 
                        INNER JOIN tiempo_vuelo ON vuelo.id_cant_horas = tiempo_vuelo.id_cant_horas WHERE tipo_vuelo.id_tipo_vuelo = '3' AND vuelo.estado = 'Activo' ORDER BY id_vuelo;";

                        $resultado = mysqli_query($enlace, $consulta);

                        while($fila = mysqli_fetch_array($resultado)){?>
                            <?php
                                date_default_timezone_set("America/Bogota");
                                $fecha_actual = date("Y-m-d H:i:s");
                                $fecha_entrada = $fila['fecha_hora_salida'];

                                if($fecha_actual >= $fecha_entrada){
                                    $consulta = "UPDATE vuelo SET estado = 'Realizado' WHERE id_vuelo = $fila[id_vuelo]";
                                    mysqli_query($enlace, $consulta);
                                }
                            ?>    

                            <tr>
                                <td><center><?php echo $fila['nombre_aerolinea'];?></center></td>
                                <td><center><?php echo $fila['ciudad_destino'];?><br><?php echo $fila['fecha_hora_salida'];?></center></td>
                                <td><center><?php echo $fila['ciudad_origen'];?><br><?php echo $fila['fecha_hora_llegada'];?></center></td>
                                <td><center>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInfoVuelo<?php echo $fila['id_vuelo']; ?>"><i class="fa fa-info-circle"></i>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalclaseVuelo<?php echo $fila['id_vuelo']; ?>"><i class="fa fa-cart-plus"></i>
                                </button><center></td>
                            </tr>
                            <!-- Modal Info Vuelo -->
                            <div class="modal fade" id="modalInfoVuelo<?php echo $fila['id_vuelo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary" >
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Datos del Vuelo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-content">
                                                <form action="" method="post" id="formulario">
                                                
                                                    <strong><h5>Vuelo Co.<?php echo $fila['codVuelo'];?> <i class="fa fa-plane" aria-hidden="true"></i></h5></strong><br>
                                                    <strong><h5>Aerolinea: <?php echo $fila['nombre_aerolinea'];?></h5></strong><br>
                                                    <strong><h5><center>Origen:<br><?php echo $fila['ciudad_destino'];?><br><?php echo $fila['fecha_hora_salida'];?></center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center><i class="fa fa-arrow-down" aria-hidden="true"></center></i></h5></strong>
                                                    <strong><h5><center>Destino:<br><?php echo $fila['ciudad_origen'];?><br><?php echo $fila['fecha_hora_llegada'];?></center></h5></strong><br>
                                                    <strong><h5>Tiempo de Vuelo: <?php echo $fila['id_cant_horas'];?> Horas</h5></strong><br>
                                                    <strong><h5>Costo Clase Turista: <?php echo $fila['costo_vuelo'];?></h5></strong><br>
                                                    <strong><h5>Costo Primera Clase: <?php echo $fila['costo_primera_clase'];?></h5></strong><br>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Mostrar Planes -->
                            <div class="modal fade" id="modalclaseVuelo<?php echo $fila['id_vuelo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="max-width:800px">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary" >
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Tipo de Tiquetes</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-content">
                                                <br>
                                                <div style="border: solid; border-radius: 10px; border-color: #85929E;margin: auto; ">
                                                    <h4 class="text-center">Clase Turista</h4>
                                                </div>
                                                <div style="border: solid; border-radius: 10px; border-color: #85929E;margin: auto; margin-bottom: 5px; padding: 10px;">
                                                
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li style="list-style: none;"><span class="icon-briefcase"> 1 equipaje de mano (10kg) + morral</span></li>
                                                                <li style="list-style: none;"><span class="icon-luggage"> 1 equipaje de bodega (20kg) </span></li>
                                                                <li style="list-style: none;"><span class="icon-airline_seat_recline_extra"> Check-in y asiento standar</span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col">
                                                            <br><br>
                                                            <h3><p>$ <?= $fila['costo_vuelo'];?> COP</p></h3>
                                                        </div>
                                                        <div class="col-3">
                                                            <br>
                                                            <div>
                                                            <a href="editar_reserva_normal_inter2.php?codVuelo=<?php echo $fila['codVuelo']; ?>?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><button type="button" class="btn btn-primary">Reservar Tiquete</button></a>
                                                            </div>
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div style="border: solid; border-radius: 10px; border-color: #85929E;margin: auto; ">
                                                    <h4 class="text-center">Primera Clase</h4>
                                                </div>
                                                <div style="border: solid; border-radius: 10px; border-color: #85929E;margin: auto; margin-bottom: 5px; padding: 10px;">
                                                    <div class="primera-clase">
                                                        
                                                        <div class="row">
                                                            <div class="col">
                                                                <ul>
                                                                    <li style="list-style: none;"><span class="icon-briefcase"> 1 equipaje de mano (10kg) + morral</span></li>
                                                                    <li style="list-style: none;"><span class="icon-luggage"> 1 equipaje de bodega (45kg) </span></li>
                                                                    <li style="list-style: none;"><span class="icon-airline_seat_recline_extra"> Check-in y asiento primera clase</span></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col">
                                                                <br><br>
                                                                <h3><p>$ <?= $fila['costo_primera_clase'];?> COP</p></h3>
                                                            </div>
                                                            <div class="col-3">
                                                                <br>
                                                                <div>
                                                                <a href="editar_reserva_primera_inter2.php?codVuelo=<?php echo $fila['codVuelo']; ?>?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><button type="button" class="btn btn-primary">Reservar Tiquete</button></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php  } 
                            mysqli_close($enlace);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
      

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Data Table -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"></script>
  <!-- Bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Funciones DataTable -->
  <script type="text/javascript">
        $(document).ready(function(){
            $('#tablaAdmi').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por p??gina",
                    "sProcessing": "Procesando...",
                    "zeroRecords": "No se han encontrado resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "oPaginate": {
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                }
            });
        });
    </script>
</body>

</html>