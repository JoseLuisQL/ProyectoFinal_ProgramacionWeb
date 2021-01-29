<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<link rel="icon" type="image/png" href="assets/img/favicon.png">
		<link rel="stylesheet" type="text/css" href="index.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" href="login.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>CosmoGames</title>
      	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script>
		<script src="script.js"></script>
		<style>
			body{
				background-image: url(fondo4.png);
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: #66999;
			}
		</style>
	</head>
	<body>
		<ul id="slide-out" class="side-nav teal darken-1">
			<div class="navPerfil">
			</div>
		</ul>
		<ul id="dropdown1" class="dropdown-content">
			<li><a onclick="">3DS</a></li>
			<li class="divider"></li>
			<li><a href="">Tarjetas de Regalo</a></li>
			<li><a href="">Licencias de Software</a></li>
		</ul>
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper teal darken-1">
					<a href="" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<a onclick="home();" class="brand-logo">CosmoGames</a>
					
					<a></a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li>
							<div class="center row">
								<div class="col s12">
									<div class="row" id="topbarsearch">
										<div class="input-field col s6 s12">
											<i class="material-icons prefix">search</i>
											<input type="text" placeholder="Buscar" id="autocomplete-input" class="autocomplete busInicio">
										</div>
									</div>
								</div>
							</div>
						</li>
						<li><a onclick="vistaPtl('todo',16)">Todos</a></li>
						<li><a onclick="vistaPtl('nsw',8)">NSW</a></li>
				        <li><a onclick="vistaPtl('ps4',8)">PS</a></li>
						<li><a onclick="vistaPtl('xone',8)">XBOX</a></li>
						<li><a onclick="vistaPtl('pc',8)">PC</a></li>
						<li><a class="dropdown-button" href="" data-activates="dropdown1">Otros<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a href="" data-activates="slide-out" class="perfil-navbar"><i class="material-icons">person_pin</i></a></li>
					</ul>

				</div>
			</nav>
		</div>
		<ul class="side-nav" id="mobile-demo">
			<li><a onclick="vistaPtl('todo',16)">Todos</a></li>
			<li><a onclick="vistaPtl('nsw',8)">NSW</a></li>
			<li><a onclick="vistaPtl('ps4',8)">PS</a></li>
			<li><a onclick="vistaPtl('xone',8)">XBOX</a></li>
			<li><a onclick="vistaPtl('pc',8)">PC</a></li>
			<li><a onclick="">3DS</a></li>
			<li class="divider"></li>
			<li><a href="">Tarjetas de Regalo</a></li>
			<li><a href="">Licencias de Software</a></li>
			<li><a href="" data-activates="slide-out" class="perfil-navbar"><i class="material-icons">person_pin</i></a></li>
			
		</ul>

		<div class="row">
			<div class="container" style="padding-top: 20px">
				<nav>
					<div class="nav-wrapper teal lighten-1">
						<div class="col s12 migasDePan">
							<a onclick="home()" class="letra-mediana">Inicio</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
		
		<div class="container">
			<div class="contenido" style="background-color: #f7f7f7">
			</div>
		</div>

		

		
	</body>
</html>
