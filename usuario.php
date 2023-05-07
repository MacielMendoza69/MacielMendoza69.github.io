<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<title>Carrito de compras</title>
</head>
<body>




<head>
  <style>
    body {
      background-color: greenyellow;
    }
  </style>
</head>









<?php 

$totalcantidad = 0;
$total = 0;

if(isset($_SESSION['carrito'])){
    $carrito_mio=$_SESSION['carrito'];
    $_SESSION['carrito']=$carrito_mio;

    // contamos nuestro carrito
    for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
        if ($carrito_mio[$i] != NULL) {
            $total_cantidad = $carrito_mio[$i]['cantidad'];
            $totalcantidad += $total_cantidad;
        }
    }
}



?>





<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="#">RESERVA A TU GUSTO, SALON MENDOZA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- END NAVBAR -->







<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ventana del total</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){
						
            ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									<span   style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> pesitos</span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total $</span>
							<strong  style="text-align: left; color: #000000;"><?php
							if(isset($_SESSION['carrito'])){
							$total = 0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}}}

              $_SESSION['total'] = $total;

							echo $total; ?> pesos</strong>
							</li>                                      
						</ul>
					</div>
				</div>
			</div>





      <div class="modal fade" id="modal_agendar" tabindex="-1" aria-labelledby="modal_agendarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_agendarLabel">Agendar evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
          </div>
          <div class="form-group">
            <label for="hora">Hora:</label>
            <input type="time" class="form-control" id="hora" name="hora" required>
          </div>
          <div class="form-group">
            <label for="tipo">Tipo de evento:</label>
            <select class="form-control" id="tipo" name="tipo" required>
              <option value="boda">Boda</option>
              <option value="quinceanera">Quinceaños</option>
              <option value="fiesta">Fiesta de Niños</option>
              <option value="bautizo">Bautizo</option>
              <option value="otro">Otro</option>
            </select>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="comida" name="comida">
            <label class="form-check-label" for="comida">
              ¿Opcional: Bufet De Platillos Para Tus Invitados?
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="meseros" name="meseros">
            <label class="form-check-label" for="meseros">
              ¿Opcional: Meseros?
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="piscina" name="piscina">
            <label class="form-check-label" for="piscina">
              ¿Opcional: Piscina?
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="aire" name="aire">
            <label class="form-check-label" for="aire">
              ¿Opcional: Aire Acondicionado?
            </label>
          </div>
          <button type="submit" class="btn btn-primary" name="btn_agendar">Agendar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </form>

        <div class="form-group">
    <label for="total">Total a pagar:</label>
    <input type="text" class="form-control" id="total" name="total" value="$<?php echo $_SESSION['total']; ?>" readonly>
</div>








       <?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha agregado un evento
if(isset($_POST['btn_agendar'])) {
    $evento = array(
        'fecha' => $_POST['fecha'],
        'hora' => $_POST['hora'],
        'tipo' => $_POST['tipo'],
        'comida' => isset($_POST['comida']) ? 'Sí' : 'No',
        'meseros' => isset($_POST['meseros']) ? 'Sí' : 'No',
        'piscina' => isset($_POST['piscina']) ? 'Sí' : 'No'
    );

    // Agregar el evento al array de eventos del usuario en la sesión
    if(isset($_SESSION['eventos'])) {
        $_SESSION['eventos'][] = $evento;
    } else {
        $_SESSION['eventos'] = array($evento);
    }

    // Mostrar un mensaje indicando que se ha creado un evento
    echo "<p>Se ha creado un nuevo evento exitosamente</p>";
}

// Mostrar los eventos agendados del usuario
if(isset($_SESSION['eventos'])) {
    foreach($_SESSION['eventos'] as $evento) {
        echo "<p>Fecha: {$evento['fecha']}</p>";
        echo "<p>Hora: {$evento['hora']}</p>";
        echo "<p>Tipo de evento: {$evento['tipo']}</p>";
        echo "<p>¿Desea comida? {$evento['comida']}</p>";
        echo "<p>¿Desea meseros? {$evento['meseros']}</p>";
        echo "<p>¿Desea piscina? {$evento['piscina']}</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No has agendado ningún evento aún</p>";
}
?>
<form method="POST">
    <input type="hidden" name="borrar_todo" value="1">
    <button type="submit">Borrar todos los eventos</button>
</form>

<?php
// Código existente para agregar y mostrar eventos

if(isset($_POST['borrar_todo'])) {
    unset($_SESSION['eventos']);
}
?>




      </div>
    </div>
  </div>
</div>











      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
        <!-- <a type="button" class="btn btn-primary" name="">Comprar carrito</a> -->
        <input type="submit" class="btn btn-primary" name="btncomprar" value="Comprar carrito">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_agendar">Agendar evento</button>

        

        

      </div>
      <?php
        if (isset($_POST["btncomprar"])){
                $compras=array($total);
                echo $compras[0];
        }
        ?>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->





<!-- ARTICULOS -->
<div class="container mt-5">
<div class="row" style="justify-content: center;">

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="8000.00" />
        <input name="titulo" type="hidden" id="titulo" value="SALON" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/salonn.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">SALON DE FIESTAS</h5>
                        <p class="card-text">MEJOR OPCION PARA REALIZAR SU EVENTO - Precio $8000.00</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="3500.00" />
        <input name="titulo" type="hidden" id="titulo" value="COMBO DE MESEROS" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/meseros.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">GRUPO DE MESEROS</h5>
                        <p class="card-text">ESTAMOS PARA AYUDARTE - Precio $3500.00</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="450.00" />
        <input name="titulo" type="hidden" id="titulo" value="MESAS-SILLAS-MANTELES" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/mesassillasmanteles.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">MESAS,SILLAS Y MANTEL</h5>
                        <p class="card-text">COMBO INCLUIDO UNA MESA-6 SILLAS-MANTEL - Precio $450.00</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="5800.00" />
        <input name="titulo" type="hidden" id="titulo" value="BUFET" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/comidas.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">BUFET DE COMIDA PARA TUS INVITADOS</h5>
                        <p class="card-text">PARA TENER FELICES TUS INVITADOS - Precio $5800.00</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="950.00" />
        <input name="titulo" type="hidden" id="titulo" value="PICINA" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/picina.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">PICINA</h5>
                        <p class="card-text">PARA QUE TUS INVITADOS SE REFRESQUEN - Precio $950.00</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="600.00" />
        <input name="titulo" type="hidden" id="titulo" value="AIRE ACONDICIONADO" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/aire.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">CLIMA</h5>
                        <p class="card-text">PARA QUE ESTEN FRESCOS PARA MESES DE CLAOR - Precio $600.00</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


</div>
</div>
<!-- END ARTICULOS -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>