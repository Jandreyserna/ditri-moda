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
    <?php
      $consulta = "SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol INNER JOIN genero ON usuario.id_genero = genero.id_genero WHERE usuario.id_usuario = $_SESSION[id_usuario];";
      $resultado = mysqli_query($enlace, $consulta);
      $fila = mysqli_fetch_array($resultado)
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
        
        <!-- Apartado cerrar sesion --> 
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
                                            <a href="editar_datos_usuario.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </nav>
                <!-- Cuadro editar datos -->
                <div class="card card-body " style="margin-top: -24px; ">
                    <div class="modal-body">
                        <div class="modal-content" style="padding: 20px; margin: auto; border: solid; border-radius: 10px;">
                            <form action="editar_usuario.php" method="post" id="formulario" enctype="multipart/form-data">

                                <input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario'];?>">

                                <label>Nombres</label>
                                <input type="text" class="form-control" name="nombre" class="form-control" value="<?php echo $fila['nombre']?>" pattern="[A-Za-z-Zñóéíá, .-]+" maxlength="30">

                                <label>Apellidos</label>
                                <input type="text" class="form-control" name="apellido" class="form-control" value="<?php echo $fila['apellido']?>" pattern="[A-Za-z-Zñóéíá, .-]+" maxlength="30">

                                <label>Documento</label>
                                <input type="text" class="form-control" name="documento" class="form-control" value="<?php echo $fila['documento']?>" pattern="[0-9]+" minlength="10" maxlength="10" disabled>

                                <label>Numero de celular</label>
                                <input type="text" class="form-control" name="celular" class="form-control" value="<?php echo $fila['celular']?>" pattern="[0-9]+" minlength="10" maxlength="10">

                                <label>Fecha nacimiento</label>
                                <input type="date" name="fechaNacimiento" style="color: #515A5A;" value="<?php echo $fila['fechaNacimiento']?>" class="form-control" min = "1940-01-01" max = "2004-01-01">
                                                                            
                                <label>Genero</label><br>
                                <select name="id_genero" style=" color: #515A5A;" class="form-control-lg" disabled>
                                    <?php
                                        $consulta_mysql='select * from genero';
                                        $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                        while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                        echo "<option  value='".$lista["id_genero"]."'>";
                                        echo $fila["tipo_genero"];
                                        echo "</option>";
                                        }
                                    ?>
                                </select>

                                <br>                    
                                <label>Direccion</label>
                                <input type="text" name="direccion" value="<?php echo $fila['direccion']?>" class="form-control" maxlength="30">

                                <label>Email</label>
                                <input type="email" class="form-control" name="email" class="form-control" value="<?php echo $fila['email']?>" maxlength="30" disabled>

                                <label>Usuario</label>
                                <input type="text" class="form-control" name="user" class="form-control" value="<?php echo $fila['user']?>" maxlength="30">

                                <label>Contraseña</label>
                                <input type="password" name="pass" value="<?php echo $fila['pass']?>" class="form-control" maxlength="30" pattern=".{8,}">
                                <spam> "la contraseña debe contener 8 caracteres"</spam>

                                <label>Confirmar Contraseña</label>
                                <input type="password" name="confirmPass" value="<?php echo $fila['confirmPass']?>" class="form-control" maxlength="30" pattern=".{8,}">

                                <label>Elige una Foto de Perfil</label>
                                <input type="file" name="foto" class="form-control" value="<?php echo $fila['foto']?>">

                                <div class="modal-footer"><button type="submit" class="btn btn-success">Editar Datos</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        mysqli_close($enlace);
        ?>
    </div>
    

<?php
require_once('footer.php');
?>