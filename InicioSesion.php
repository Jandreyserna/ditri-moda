
<?php
require_once('header.php');
?>

	<div class="contenedorCuadro col-sm-12 col-lg-3">

		<p style="text-align: center;"><img src="img/Logo.jpg" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
		<h2 style="text-align: center;">Acceder</h2>
		<div class="contenedorFormulario">
			<form action="login.php" method="post" name="Formulario">
				<input type="email" name="email"  class="form-control" required placeholder="Correo electrónico o usuario">
				<input type="password" name="pass" class= "form-control" placeholder="Contraseña" required>
				<div class="botonSesion">
					<button type="submit" class="botonLargo">Iniciar Sesión</button>	
				</div>
				
			</form>
		</div>
		<div class="contenedorReferencias">
			<p style="font-size: small;"> 
				<a href="crearCuenta.php" style="text-align: left;">Crear Cuenta </a>
				<!--<a href="recuperarContraseña.html" style="margin-left: 15%;">¿Olvidaste tu contraseña? </a> -->
			</p>
		</div>
	</div>
<?php
require_once('footer.php');
?>
