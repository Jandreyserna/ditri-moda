<!-- Modal Crear Vuelo -->
<div class="modal fade" id="modalCrearVuelo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Ingresa los datos del vuelo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="guardar_vuelo_internacionalida.php" method="post" id="formulario" enctype="multipart/form-data">

                        <label>Codigo del Vuelo</label>
                        <input type="text" class="form-control" name="codVuelo" class="form-control" placeholder="Ingrese Codigo del Vuelo" pattern="[A-Za-z-Zñóéíáú 0-9]+" minlength="5" maxlength="5" required>

                        <label>Elija una Aerolinea</label>
                        <select name="id_aerolinea" style="width:38%; color: #515A5A;" required>
                            <?php
                                $consulta_mysql='select * from aerolineas';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_aerolinea"]."'>";
                                echo $lista["nombre_aerolinea"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Elija La Ciudad Salida</label>
                        <select name="id_ciudad_origen" style="width:38%; color: #515A5A;" required>
                            <?php
                                $consulta_mysql='select * from origen';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_ciudad_origen"]."'>";
                                echo $lista["ciudad_origen"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Fecha y Hora de Salida</label>
                        <input type="datetime-local" class="form-control" style="width:70%; color: #515A5A;" name="fecha_hora_salida" class="form-control" placeholder=" " min = "2022-05-01" required>
                        
                        <label>Elija La Ciudad Destino</label>
                        <select name="id_ciudad_destino" style="width:38%; color: #515A5A;" required>
                            <?php
                                $consulta_mysql='select * from destino';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_ciudad_destino"]."'>";
                                echo $lista["ciudad_destino"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Elija Cantidad de Horas de Viaje</label>
                        <select name="id_cant_horas" style="width:15%; color: #515A5A;" required>
                            <?php
                                $consulta_mysql='select * from tiempo_vuelo';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_cant_horas"]."'>";
                                echo $lista["cantidad_horas"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Ingrese Costo del Vuelo</label>
                        <input type="number" class="form-control" name="costo_vuelo" class="form-control" placeholder="Ingresa el costo del vuelo" pattern="[0-9]+" minlength="5" maxlength="10" required>

                        <label>Elige una Foto del Lugar de Destino</label>
                        <input type="file" name="foto_vuelo" class="form-control">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Crear Vuelo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal Editar Vuelos -->
<div class="modal fade" id="modalEditarVuelo<?php echo $fila['id_vuelo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Editar Datos Vuelo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="editar_vuelo_internacionalida.php" method="post" id="formulario" enctype="multipart/form-data">
                        <input type="hidden" name="id_vuelo" value="<?php echo $fila['id_vuelo'];?>">

                        <label>Codigo del Vuelo</label>
                        <input type="text" class="form-control" name="codVuelo" class="form-control" value="<?php echo $fila['codVuelo'];?>" disabled>

                        <label>Elija una Aerolinea</label>
                        <select name="id_aerolinea" style="width:38%; color: #515A5A;" disabled>
                            <?php
                                $consulta_mysql='select * from aerolineas';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_aerolinea"]."'>";
                                echo $fila["nombre_aerolinea"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Ciudad de Salida</label>
                        <select name="id_ciudad_origen" style="width:38%; color: #515A5A;" disabled>
                            <?php
                                $consulta_mysql='select * from origen';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_ciudad_origen"]."'>";
                                echo $fila["ciudad_origen"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Fecha y Hora de Salida</label>
                        <input type="datetime-local" class="form-control" style="width:70%; color: #515A5A;" name="fecha_hora_salida" class="form-control" placeholder=" " min ="2022-05-01"  value="<?php echo $fila['fecha_hora_salida']?>"  required>
                        
                        <label>Ciudad de Destino</label>
                        <select name="id_ciudad_destino" style="width:38%; color: #515A5A;" disabled>
                            <?php
                                $consulta_mysql='select * from destino';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_ciudad_destino"]."'>";
                                echo $fila["ciudad_destino"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Elija Cantidad de Horas de Viaje</label>
                        <select name="id_cant_horas" style="width:15%; color: #515A5A;" required>
                            <?php
                                $consulta_mysql='select * from tiempo_vuelo';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_cant_horas"]."'>";
                                echo $lista["cantidad_horas"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Ingrese Costo del Vuelo</label>
                        <input type="number" class="form-control" name="costo_vuelo" class="form-control" value="<?php echo $fila['costo_vuelo']?>" placeholder="Ingresa el costo del vuelo" pattern="[0-9]+" minlength="5" maxlength="10" required>

                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-success">Editar Vuelo</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal Eliminar Vuelos -->
<div class="modal fade" id="modalEliminarVuelo<?php echo $fila['id_vuelo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">¿Realmente desea Cancelar el Vuelo?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="eliminar_vuelo_internacionalida.php" method="post" id="formulario" enctype="multipart/form-data">
                    	<input type="hidden" name="id_vuelo" value="<?php echo $fila['id_vuelo'];?>">

                        <strong><h4><center><?php echo $fila['ciudad_origen'];?> - <?php echo $fila['ciudad_destino'];?></center></h4></strong>
                        <strong><h4><center>El cual sale el: <?php echo $fila['fecha_hora_salida'];?></center></h4></strong>

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