<!-- Modal Crear Administrador -->
<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Formulario para Administradores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form onsubmit="return verificarespacios()" action="guardar_administrador.php" method="post" id="formulario" enctype="multipart/form-data">
                        <label>Nombres</label>
                        <input type="text" id="nombre" class="form-control" name="nombre" class="form-control" placeholder="Ingresa tu Nombre" required pattern="[A-Za-z-Zñóéí ]+" minlength="3" maxlength="30">

                        <label>Apellidos</label>
                        <input type="text" id="apellido" class="form-control" name="apellido" class="form-control" placeholder="Ingresa tu Apellido" required pattern="[A-Za-z-Zñóéí ]+" minlength="3" maxlength="30">

                        <label>Documento</label>
                        <input type="text" class="form-control" name="documento" class="form-control" placeholder="Ingresa tu numero de Documento" pattern="[0-9]+" minlength="8" maxlength="10" required>

                        <label>Numero de celular</label>
                        <input type="text" class="form-control" name="celular" class="form-control" placeholder="Ingresa tu Numero de Celular" pattern="[0-9]+" minlength="10" maxlength="10" required>

                        <label>Genero</label>
                        <select name="id_genero" style="width:38%; color: #515A5A;">
                            <?php
                                $consulta_mysql='select * from genero';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_genero"]."'>";
                                echo $lista["tipo_genero"];
                                echo "</option>";
                                }
                            ?>
                        </select>
                        <br>

                        <img src="" id="flag" width="40px" style="vertical-align: top;">
                        <div style="display: inline-block;text-align: left; width:38%">
                        País Nacimiento <select id="paises" name="pais" onchange="actualizarEstados();actualizarCiudades();actualizarBandera()"></select>
                        Estado <br><select id="estados" name="estado" onchange="actualizarCiudades()"></select><br>
                        Ciudad <br><select id="ciudades" name="ciudad"></select>
                        </div>
                        <br>
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" class="form-control" placeholder="Ingresa tu Correo"  maxlength="30" required>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Crear Administrador</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal Eliminar Administrador -->
<div class="modal fade" id="modalEliminar<?php echo $fila['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">¿Realmente desea eliminar a: ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="eliminar_administrador.php" method="post" id="formulario" enctype="multipart/form-data">
                    	<input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario'];?>">

                        <strong><h4><?php echo $fila['nombre'];?> <?php echo $fila['apellido'];?></h4></strong>

                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
