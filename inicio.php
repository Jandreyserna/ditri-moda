<?php
require_once('header.php');
?>
    <div class="imagendefondo">
        <div id="menu">
          <div id="encabezados">
            <div class="btn-menu"><input id="btn1" onchange="cambiarvista()" type="radio" name="seccion-name" checked><label for="btn1">Reservar vuelo</label></div>
            <div class="btn-menu"><input id="btn2" onchange="cambiarvista()" type="radio" name="seccion-name"><label for="btn2">Gestionar tu reserva</label></div>
            <div class="btn-menu"><input id="btn3" onchange="cambiarvista()" type="radio" name="seccion-name"><label for="btn3">Check-in</label></div>
            <div class="btn-menu"><input id="btn4" onchange="cambiarvista()" type="radio" name="seccion-name"><label for="btn4">Estado del vuelo</label></div>
          </div>
        </div>
        <!-- buscador -->
        <div id="vista">
          <div id="vista1">
              <label><input type="radio" name="tipo-de-viaje">solo ida</label>
              <label><input type="radio" name="tipo-de-viaje">ida y vuelta</label>
          </div>
          <!-- preguntas buscador -->
          <div class="preguntas-buscador">
            <div class="row">
              
              <div class="col pregunta1">
                <label for="pregunta1">¿A donde viajas?</label>
                <div class="col">
                  <input type="text" name="origen" id="origen-buscador">
                  <span class="icon-flight_takeoff"></span>
                  <input type="text" name="destino" id="destino-buscador">
                  <span class="icon-flight_land"></span>
                </div>
              </div>
              
              <div class="col pregunta2">
                <label for="pregunta2">¿Cuando Viajas?</label>
                <div class="col">
                  <input type="date" >
                  <input type="date" >
                </div>
              </div>

              <div class="col pregunta3">
                <label for="pregunta3">¿Cuantos viajan?</label>
                <input type="number"><span class="icon-person_add_alt_1"></span>
              </div>

              <div class="col">
                <button class="btn btn-primary" id="buscar-vuelo">Buscar vuelo</button>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div id="resultado">
        
      </div>
    <br>
    <br>
    <div class="row">
      <div class="col">
        <div class="carrusel">
          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators" height="200px" width="200px">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/madrid3.jpg" class="d-block w-100" alt="...">
                
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="img/londres.jpg" class="d-block w-100" alt="...">
                
              </div>
              <div class="carousel-item" height="1000px" width="500px">
                <img src="img/newyork.jpg" class="d-block w-100" alt="...">
                
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          </div>
      </div>
      <div class="col">
        <div class="carrusel">
          <div id="carouselExampleDark2" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators" height="200px" width="200px">
              <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/buenosaires.jpg" class="d-block w-100" alt="...">
                
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="img/madrid2.jpg" class="d-block w-100" alt="...">
                
              </div>
              <div class="carousel-item" height="1000px" width="500px">
                <img src="img/madrid4.jpg" class="d-block w-100" alt="...">
                
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          </div>
      </div>
    </div>
  
<?php
require_once('footer.php');
?>

    
    
  