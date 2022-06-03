<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Distri-Moda</title>
    <!-- hojas de estilos inicioSesion.php-->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!-- hoja de estilo1 inicio.php -->
    <link rel="stylesheet" type="text/css" href="css/estilos1.css" />
    <link rel="stylesheet" type="text/css" href="fonts/style.css" />

    <!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="fonts/fonts.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/estilo2.css" rel="stylesheet">
  </head>
  <body>
  <?php 
    $url = $_SERVER["REQUEST_URI"] ;
    $url = explode('/', $url);
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <?php if($url[2] == 'inicio.php' ||  $url[2] == ""):?>
        
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="inicio.php"><img src="img/Logo.jpg" alt="" width="60" height="60" class="rounded img-fluid d-inline-block align-text-top"/></a>
        </div>
        <div class="navbar-nav mr-auto">
          <a class="navbar-brand" style="color: #ffffff">Distri-Moda</a>
        </div>
        
        <div class="coontenedor" style="display:flex; align-items: center;">
          <div class="navbar-nav mr-auto">
            <a href="preguntar-compra.php" style="color: #ffffff">Administrar Compra</a>
          </div>
          <ul class="navbar-nav" style="padding-right: 10px;">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffffff">
                Busca estilos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="vuelos_nacionales_user.php">Pantalones</a></li>
                <li><a class="dropdown-item" href="vuelos_internacionalesida_user.php">Blusas</a></li>
                <li><a class="dropdown-item" href="vuelos_internacionalesreg_user.php">Sacos</a></li>
              </ul>
            </li>
          </ul>
          <div class="navbar-nav mr-auto">
            <i class="fa fa-sign-out"></i> <a href="InicioSesion.php" style="color: #ffffff">Iniciar Sesión </a>
          </div>
        </div>
      </div>
      <?php elseif($url[2] == 'InicioSesion.php' || $url[2] == 'preguntar-compra.php' || $url[2] == 'crearCuenta.php' ):?>
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="inicio.php"><img src="img/Logo.jpg" alt="" width="60" height="60" class="rounded img-fluid d-inline-block align-text-top"></a>
            </div>
            <div class="navbar-nav mr-auto">
                <a href="inicio.php" style="color: #FFFFFF;">volver <i class="bi bi-box-arrow-right"></i></a>
            </div>
        </div> 
      <?php endif;?>

      
    </nav>