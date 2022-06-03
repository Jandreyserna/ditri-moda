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
?>


<body id="page-top">
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
                                <center>
                                    <h4>¿Está seguro de salir?</h4>  
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
        <b>
            <center>
                <div style="border: solid; border-radius: 10px; border-color: #85929E; margin-bottom: 5px; padding: 10px;">
                    <div class="contenedorCuadro col-sm-12 col-lg-3">
                    <p style="text-align: center;"><img src="img/Logotipo.png" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
                    <h2 style="text-align: center;">Gestiona tu Compra</h2>
                    <br>
                    <h5 style="text-align: center;">Realiza Tu Check-in o cambio de silla en digital. Recuerda tienes desde 48 a 3 horas antes de vuelos Internacionales
                    o 2 horas antes para vuelos Nacionales</h5>
                    <br>
                    <div class="contenedorFormulario">
                        <form action="verificar_datos_pasajero.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>" method="post" name="Formulario">
                            <input type="text" name="codVuelo" class="form-control" placeholder="Ingresa Codigo del Vuelo" minlength="5" maxlength="5" required>
                            <br>
                            <center>
                                <button type="submit" class="btn btn-primary">Mostrar Opciones</button>	
                            </center>
                        </form>
                    </div>                                                      
                </div>
            </center>
        </b>
	</div>
    <?php
      mysqli_close($enlace);
    ?>
  </div>

<?php
require_once('footer.php')
?>