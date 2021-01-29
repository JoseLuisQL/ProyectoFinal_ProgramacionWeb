<?php
	if(!isset($_SESSION['carro'])){
        session_start();
	}
	

	require '../administrador/cesta.php';
	
	if(isset($_SESSION["carro"])){
		$arrayCarrito = unserialize($_SESSION["carro"]);
		$cesta = new Cesta;
		$arrayObjectoDatos = $cesta->obtenerTodosProductos($arrayCarrito);
		$totalPrecio = 0;
		$ArrayLength = count($arrayObjectoDatos);
		$i = 0;
		$arrayObjectoDatos = $cesta->obtenerTodosProductos($arrayCarrito);
		$totalPrecio = 0;
		$ArrayLength = count($arrayObjectoDatos);
		$i= 0;

		if(!isset($_GET["pago"])){
			?>
			<br>
			<div class="row">
				<div class="col offset-m10">
					<a class="btn" onclick="pagarCesta()">Pagar!</a>
				</div>
			</div>
		<?php

		?>

			<h1>Tu cesta: </h1>
			<table class="striped responsive-table">
				<tr>
					<th>Nombre</th>
					<th>Edicion</th>
					<th>Plataforma</th>
					<th>Cantidad</th>
					<th>Precio/Unidad</th>
					<th>Total</th>
					<th>Eliminar</th>
				</tr>
		<?php
			while($i < $ArrayLength){ 
				$idP = $arrayObjectoDatos[$i]->idProducto;
				$nombre = $arrayObjectoDatos[$i]->nombreJuego;
				$edicion = $arrayObjectoDatos[$i]->nombreEdicion;
				$plataforma = $arrayObjectoDatos[$i]->nombrePlataforma;
				$distribuidora = $arrayObjectoDatos[$i]->nombreDistribuidora;
				$cantidad = $arrayObjectoDatos[$i]->cantidad;
				$precio = $arrayObjectoDatos[$i]->precio;
				$precioTotalArticulos = $precio*$cantidad;
				?>
				<tr>
					<td><?=$nombre?></td>
					<td><?=$edicion?></td>
					<td><?=$plataforma?></td>
					<td><?=$cantidad?></td>
					<td><?=$precio?> $/u</td>
					<td><?=$precioTotalArticulos?> $</td>
					<td><a class="btn btn-danger" onclick="eliminarUno(<?=$idP?>)"><i class="material-icons">delete</i></a></td>
				</tr>
				<?php $i++;
				$totalPrecio = $totalPrecio+$precioTotalArticulos;
			} ?>
			</table>
			<div class="container">
				<h4 style="color:red; text-align:right">Total: <?=$totalPrecio?> $</h4>
			</div>
			<div class="row">
				<div class="col offset-m10">
					<a class="btn" onclick="pagarCesta()" style="margin-bottom: 14px;">Pagar!</a>
				</div>
			</div>
		<?php } else { ?>
			
			<?php while($i < $ArrayLength){ 
				$nombre = $arrayObjectoDatos[$i]->nombreJuego;
				$edicion = $arrayObjectoDatos[$i]->nombreEdicion;
				$plataforma = $arrayObjectoDatos[$i]->nombrePlataforma;
				$cantidad = $arrayObjectoDatos[$i]->cantidad;
				$precio = $arrayObjectoDatos[$i]->precio;
				$precioTotalArticulos = $precio*$cantidad;
				?>
				<div>
					<p><?=$nombre ?> <?=$edicion?> <?=$plataforma?> </p>
					<p><?=$cantidad?> x <?=$precio?> = <?=$precioTotalArticulos?></p>
				</div>
				<hr>


				<?php $i++;
				$totalPrecio = $totalPrecio+$precioTotalArticulos;
			} ?>
			<div style="color:red">Total: <?=$totalPrecio?> $</div>
		<?php }
	}else{
		echo true;
	}
	?>
