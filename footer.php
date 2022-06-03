</body>
  <script defer src="js/inicio.js"></script>
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/boo tstrap.bundle.min.js"></script> 
  <!-- buscar vuelo ajax -->
  <script src="ajax/buscar-vuelo.js"> </script>
  <!-- js archivos -->
  <script defer src="js/crearCuenta.js"></script>
	<script src="js/tools.js"></script>
  <!-- Paises,Departamentos y Ciudades -->
  <script src="https://jeff-aporta.github.io/main/00Libs/Sites/sites.min.js"></script>
		<!-- formulario.js -->
	<script src="js/formularios.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- datatables -->
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>

  <script>
	        actualizarPaises()
	        actualizarBandera()
	        actualizarEstados()
	        actualizarCiudades()
			verificar()
			function verificar() {
				if ( $("#nombre-input").val().trim().length > 0 ) {
				alert("El campo contiene un string válido que no son espacios");
				}
				else {
				alert("El campo contiene espacios y está vacío");
				}
			}

	        function actualizarPaises() {
	             document.getElementById("paises").innerHTML = $optionPaises()
	        }

	        function actualizarBandera() {
	             let flag = document.getElementById("flag");
	             let pais = document.getElementById("paises").value;
	             flag.src = $regiones[pais].flagSVG_4x3
	        }

	        function actualizarEstados() {
	             let pais = document.getElementById("paises").value
	             document.getElementById("estados").innerHTML = $optionEstados(pais)
	        }

	        function actualizarCiudades() {
	             let pais = document.getElementById("paises").value
	             let estado = document.getElementById("estados").value
	             document.getElementById("ciudades").innerHTML = $optionCiudades(pais, estado)
	        }
	
			function valida_envia(){
				
				if(!verificarContrasena()){
					return false
				}
				if (document.fvalida.nombre.value.length==0){
						alert("Tiene que escribir su nombre")
						document.fvalida.nombre.focus()
						return false
				}
				if (document.fvalida.apellido.value.length==0){
						alert("Tiene que escribir sus apellidos")
						document.fvalida.apellido.focus()
						return false
				}
				if (document.fvalida.documento.value.length==0){
						alert("Falta por ingresar su documento")
						document.fvalida.documento.focus()
						return false
				}
				if (document.fvalida.celular.value.length==0){
						alert("Debe ingresar su numero de celular")
						document.fvalida.celular.focus()
						return false
				}
				if (document.fvalida.direccion.value.length==0){
						alert("Debe ingresar la direccion de su hogar")
						document.fvalida.direccion.focus()
						return false
				}
				if (document.fvalida.email.value.length==0){
						alert("Debe ingresar su correo electronico")
						document.fvalida.email.focus()
						return false
				}
				if (document.fvalida.user.value.length==0){
						alert("Falta por ingresar su usuario")
						document.fvalida.user.focus()
						return false
				}
				if (document.fvalida.pass.value.length==0){
						alert("Debe ingresar una contraseña")
						document.fvalida.pass.focus()
						return false
				}
				if (document.fvalida.confirmPass.value.length==0){
						alert("Debe confirmar la contraseña")
						document.fvalida.confirmPass.focus()
						return false
				}
			
				return true;
			}
		</script>
    <!-- Funciones DataTable -->
  <script type="text/javascript">
        $(document).ready(function(){
            $('#tablaAdmi').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "sProcessing": "Procesando...",
                    "zeroRecords": "No se han encontrado resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "oPaginate": {
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                }
            });
        });
    </script>
  </html>
