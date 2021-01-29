<?php
	session_start();
	if (!isset($_SESSION["rol"])){
		die(header("Location: ./"));
	}
	if ($_SESSION["rol"] != "admin"){
		die(header("Location: ./"));
	}
	
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>CosmoGames - Administración</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	


    <link rel="stylesheet" href="administrador/css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="administrador/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="administrador/js/metisMenu/metisMenu.css">
	<link rel="stylesheet" href="administrador/vendor/toastr/toastr.min.css">
	<link rel="stylesheet" href="administrador/css/main.css">
	<link rel="stylesheet" href="administrador/css/admin.css">


	

	
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
				</div>
				<div class="navbar-brand">
					<a href="admin">SISTEMA DE ADMINISTRACIÓN</a>
				</div>
				<div class="navbar-right">
	
					<div id="navbar-menu">
						<ul class="nav navbar-nav">							
							<li class="dropdown">
								<a href="" onclick="location = 'principal'" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="glyphicon glyphicon-remove-circle"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<div id="left-sidebar" class="sidebar">
			
			<div class="sidebar-scroll">
				<div class="user-account">
					<img src="img/perfil.png" class="img-responsive img-circle user-photo" width="140" height="140">
					<div class="dropdown">
						<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Buenas, <strong><?php echo $_SESSION['rol']; ?></strong> </i></a>
						
					</div>
				</div>

				<nav id="left-sidebar-nav" class="sidebar-nav">
					<ul id="main-menu" class="metismenu">
						<li class=""><a href="admin"><i class="glyphicon glyphicon-home"></i> <span>Administración</span></a></li>
						<li class="">
							<a class="has-arrow mousePointer" aria-expanded="false"><i class="glyphicon glyphicon-apple"></i> <span>Productos</span></a>
							<ul aria-expanded="true">
								<li class=""><a onclick="mostrarVista('version')" class="mousePointer">Versiones</a></li>
								<li class=""><a onclick="mostrarVista('juego')" class="mousePointer">Juegos</a></li>
								<li class=""><a onclick="mostrarVista('plataforma')" class="mousePointer">Plataformas</a></li>
								<li class=""><a onclick="mostrarVista('edicion')" class="mousePointer">Ediciones</a></li>
							</ul>
						</li>
						<li class="">
							<a href="#subPages" class="has-arrow" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <span>Clientes</span></a>
							<ul aria-expanded="true">
								<li class=""><a onclick="usuario()" class="mousePointer">Usuarios</a></li>
								<li class=""><a onclick="pedidos()" class="mousePointer">Pedidos</a></li>
								<li class=""><a onclick="mensajes()" class="mousePointer">Mensajes</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<div id="main-content">
			<div id="cuerpo" class="container-fluid">
				<h1 class="sr-only">Dashboard</h1>
					<div class="row">
						<div class="col-md-8">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Últimas compras</h3>
								<div class="table-responsive">
									<div class="tabla"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>

	<script src="administrador/js/jquery/jquery.min.js"></script>
	<script src="administrador/js/bootstrap.min.js"></script>
	<script src="administrador/js/metisMenu/metisMenu.js"></script>
	<script src="administrador/js/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="administrador/js/jquery-sparkline/js/jquery.sparkline.min.js"></script>
	<script src="administrador/js/parsleyjs/js/parsley.min.js"></script>
	<script src="administrador/js/toastr/toastr.js"></script>
	<script src="administrador/scripts/common.js"></script>
	<script src="administrador/js/main.js"></script>
</body>

</html>
