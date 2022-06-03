<?php
    include('conexion.php');
    require_once('header.php');
    session_start();

    if(!isset($_SESSION['id_rol'])){
        header("Location: InicioSesion.html");
    }else{
        if ($_SESSION['id_rol'] != 3){
            header("Location: menu_usuario.php");
        }
    }
    $recibido=0;
?>


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
        <a class="navbar-brand" href="menu_usuario.php"><img src="img/Logo.jpg" alt="" width="65" height="0" class="rounded img-fluid d-inline-block align-text-top"></a>
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
        <a class="nav-link" href="#"><i class="bi bi-cart-check-fill"></i><span>Mis Compras</span></a>
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSalir">Cerrar Sesión <i class="bi bi-box-arrow-right"></i></button>
                <!-- Modal Salir-->
                <div class="modal fade" id="modalSalir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" >
                    <div class="modal-content">
                      <div class="modal-header bg-primary" >
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Advertencia!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                      </div>
                    <div class="modal-body">
                      <center><h4>¿Está seguro de salir?</h4></center>
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
        <b>
        <center>
            <font face="Times New Roman" size="8" color="Black">Módulo de gestión financiera</font>
        </center>
        <!-- DataTable -->
        </b>
        <?php  
          foreach ($_REQUEST as $var => $val) {
          $$var=$val; 
                    
          }if($recibido == 1){?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Advertencia!</strong> La Tarjeta que Intento Ingresar ya se encuentra Registrada. Vuelva a Intentar.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          <?php }else if($recibido == 2){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Exito!</strong> Los Datos de su Tarjeta fueron Ingresados Corectamente.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php }?>
        <div class="container-fluid">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <div class="text-center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCrearTarjeta<?php echo $_SESSION['id_usuario']; ?>"><i class="fa fa-plus" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
          <!-- Modal Crear Tarjeta  -->

<div class="modal fade" id="modalCrearTarjeta<?php echo $_SESSION['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Ingresa Datos de tus Tarjetas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <center><img src="img/tarjetas.png" class="img-fluid" alt="Responsive image"></center><br>
                    <form action="guardar_tarjeta.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>" method="post" enctype="multipart/form-data" id="formulario-register" name="fvalida">

                        <label>Tipo de Tarjeta a Ingresar</label>
                        <select name="id_tipo_tarjeta" style="width:60%; color: #515A5A;">
                            <?php
                                $consulta_mysql='select * from tipo_tarjeta';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_tipo_tarjeta"]."'>";
                                echo $lista["tipo_tarjeta"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Nombre del Propietario</label>
			            <input type="text" class="form-control" name="nombre_propietario" class="form-control" value="<?php echo $fila['nombre'];?> <?php echo $fila['apellido'];?>" pattern="[A-Za-z-Zñóéíáú ]+" minlength="10" maxlength="30">

                        <label>Número de Tarjeta</label>
			            <input type="text" class="form-control" name="numTarjeta" class="form-control" placeholder="4000 1234 5678 9010" pattern="[0-9]+" minlength="16" maxlength="16" required>
                                
                        <label>Código de Seguridad (CVV)</label>
			            <input type="text" class="form-control" name="cvv" class="form-control" placeholder="000" pattern="[0-9]+" minlength="3" maxlength="3" required>

                        <label>Fecha de Vencimiento</label>
			            <input type="date" name="fecha_vencimiento" style="width:38%;color: #515A5A;" placeholder="Fecha de nacimiento" class="form-control" min = "2022-01-01" max = "2030-01-01" required>

                        <div class="modal-footer"><button type="submit" class="btn btn-success">Agregar Tarjeta</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
          <br>
          <div class="table-responsive">
            <table id="tablaAdmi" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th><center>Tipo de tarjeta</center></th>
                  <th><center>Numero de Tarjeta</center></th>
                  <th><center>fecha_vencimiento</center></th>
                  <th><center>CVV</center></th>
                  <th><center>Saldo Actual</center></th>
                  <th><center>Opciones</center></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $consulta = "SELECT tipo_tarjeta.tipo_tarjeta, usuario.nombre, usuario.apellido, tarjeta.numTarjeta, tarjeta.fecha_vencimiento, tarjeta.cvv, tarjeta.saldo_actual FROM tarjeta
                INNER JOIN tipo_tarjeta ON tarjeta.id_tipo_tarjeta = tipo_tarjeta.id_tipo_tarjeta INNER JOIN usuario ON tarjeta.id_usuario = usuario.id_usuario 
                WHERE usuario.id_usuario  = $_SESSION[id_usuario];";
                $resultado = mysqli_query($enlace, $consulta);

                while($fila = mysqli_fetch_array($resultado)){?>

                  <tr>
                    <td><center><?php echo $fila['tipo_tarjeta'];?></center></td>
                    <td><center><?php echo $fila['numTarjeta'];?></center></td>
                    <td><center><?php echo $fila['fecha_vencimiento'];?></center></td>
                    <td><center><?php echo $fila['cvv'];?></center></td>
                    <td><center><?php echo $fila['saldo_actual'];?></center></td>
                    <td><center>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarTarjeta<?php echo $fila['numTarjeta']; ?>"><i class="bi bi-trash-fill"></i>
                    </button><center></td>
                  </tr>
                  <!-- Modales Tarjetas -->
                  <?php include('modales_tarjetas.php'); ?>
                <?php  } 
                  mysqli_close($enlace);
                ?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

<?php
require_once('footer.php');
?>