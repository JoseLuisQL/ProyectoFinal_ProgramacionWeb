
<?php
	session_start();
	require 'acceso.php';

	$objS = new Acceso();
    if(!$objS->sessionActiva()){
?>
	<div class="section"></div>
	<div class="container">
		<h3>Inicia sesion</h3>
		<p>Para disfrutar del contenido </p>
		<a onclick="iniciarSesion()" class="btn">Iniciar</a>
		
	</div>

<?php } else{ ?>
	<li>
		<div class="user-view">
			<div align="center">
				<img class="circle" src="login2.png"></a>
				<div class="letra-semimediana"><?=unserialize($_SESSION['datos'])[0]?> <?=unserialize($_SESSION['datos'])[1]?></div>
				<div class="letra-negrita">@<?=$_SESSION["usr"] ?></div>
			</div>
		</div>
	</li>
	<li><div class="divider"></div></li>


	<?php
		if($_SESSION["rol"] == "admin"){?>
			<li><a class="letra-negrita" href="admin" ><i class="material-icons">brightness_low</i>Administrar Web</a></li>
		<?php } else  { ?>
			<li><a class="letra-negrita" onclick=""><i class="material-icons">loyalty</i>Pedidos pendientes</a></li>
			<li><a class="letra-negrita" onclick=""><i class="material-icons">history</i>Historial de pedidos</a></li>
			<li><a class="letra-negrita" onclick=""><i class="material-icons">message</i>Soporte técnico</a></li>
		<?php }
	?>
	<li><div class="divider"></div></li>
		<div class="carritoP">
		</div>
	<li><div class="divider"></div></li>
	<li><a class="btn" onclick="">Ir a la cesta</a></li>
	<li><a class="btn" onclick="cerrarSesion()">Cerrar Sesión</a></li>
<?php } ?>

