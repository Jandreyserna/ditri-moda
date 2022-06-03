<?php 
include('conexion.php'); 
require_once('header.php');
$recibido=0;
?>
		<!-- Alertas Crear -->
		<?php include('alertas.php'); ?>
        <div class="contenedorCuadro">
        	<div class="contenedorFormulario">
			<p style="text-align: center;"><img src="img/Logo.jpg" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
        		<form onsubmit="return valida_envia()" action="guardar_usuario.php" method="post" enctype="multipart/form-data" id="formulario-register" name="fvalida" >
					
				<div class="campos-vacios">
					
					
						<div class="nombre">
							<label>Nombres</label>
							<input type="text" class="form-control" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" maxlength="30" required />
						</div>
						<div class="apellido">
							<label>Apellidos</label>
							<input type="text" class="form-control" id="apellido" name="apellido"class="form-control"  placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" maxlength="30" required value>
						</div>		
					</div>
        			
			        <label>Documento</label>
			        <input type="text" class="form-control" name="documento" class="form-control" placeholder="Ingresa tu número de Documento" pattern="[0-9]+" minlength="10" maxlength="10" required>

			        <label>Número de celular</label>
			        <input type="text" class="form-control" name="celular" class="form-control" placeholder="Ingresa tu número de Celular" pattern="[0-9]+" minlength="10" maxlength="10" required>

			        <label>Fecha de nacimiento</label>
			        <input type="date" name="fechaNacimiento" style="width:38%;color: #515A5A;" placeholder="Fecha de nacimiento" required class="form-control" min = "1940-01-01" max = "2004-01-01">

			        <label>Género</label><br>
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

			        <div style="display: inline-block;text-align: left;">
			          	<div style="text-align: left;">País Nacimiento</div>
			          		<img src="" id="flag" width="40px" style="vertical-align: top;">	
			          		<select id="paises" name="pais" onchange="actualizarEstados();actualizarCiudades();actualizarBandera()"></select>
			        </div>
			        <div style="display: inline-block;text-align: left;">
			          	Estado
			          	<br>
			          	<select id="estados" name="estado" onchange="actualizarCiudades()"></select>
			        </div>
			        <div style="display: inline-block;text-align: left;">
			          	Ciudad
			          	<br>
			          	<select id="ciudades" name="ciudad"></select>
			        </div>
			        <br>

			        <label>Dirección</label><br>
			        <input type="text" name="direccion" placeholder="Ingresa tu Dirección" class="form-control" minlength="7" maxlength="30" required>

			        <label>Email</label><br>
			        <input type="email" class="form-control" name="email" class="form-control" placeholder="Ingresa tu Correo" minlength="12" maxlength="30" required>

			        <label>Usuario</label><br>
			        <input type="text" class="form-control" name="user" class="form-control" placeholder="Crea un Usuario"  minlength="3" maxlength="30" required>

			        <label>Contraseña</label><br>
			        <input type="password" name="pass" placeholder="Ingresa una Contraseña" id="cr1" class="form-control" maxlength="30" pattern=".{8,}" required>
			        <spam style="color: #9b9b9b; size: 5px; text-align: center;"> "La contraseña debe contener 8 caracteres"</spam><br> 
			        <label>Confirmar Contraseña</label><br>
			        <input type="password" name="confirmPass" placeholder="Confirma la Contraseña" id="cr2"  class="form-control" maxlength="30" pattern=".{8,}" >

			    

			        <div class="botonRecuperar">
			          	
			            	<button type="submit" class="botonCorto">Registrarse</button>
			          	
			        </div>
			    </form>
			</div>
		</div>
		<br><br><br>

<?php
require_once('footer.php');
?>