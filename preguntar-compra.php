<?php
require_once('header.php');
?>

<div class="contenedorCuadro col-sm-12 col-lg-3">

    <p style="text-align: center;"><img src="img/Logo.jpg" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
    <h2 style="text-align: center;">Datos de Compra del tiquete</h2>
    <div class="contenedorFormulario">
        <form action="verificar_datos_pasajero.php" method="post" name="Formulario">
            <input type="text" name="codVuelo" class="form-control" required placeholder="Ingresa Código del Venta">
            <input type="email" name="email"  class="form-control" required placeholder="Correo electrónico o usuario">
            <br>
            <center>
                <button type="submit" class="btn btn-primary">Acceder</button>	
            </center>
        </form>
    </div>
</div>
<?php
require_once('footer.php')
?>