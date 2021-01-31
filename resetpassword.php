<?php 
require 'conexion.php'; 
if (!isset($_GET['code'])) {
	exit("can't find the page"); 
}

$code = $_GET['code']; 
$getCodequery = mysqli_query($bd, "SELECT * FROM resetPasswords WHERE code = '$code'"); 
if (mysqli_num_rows($getCodequery) == 0) {
	exit("No puedo encontrar la página porque no es el mismo código"); 
}


if (isset($_POST['password'])) {
	$pw = $_POST['password']; 
	$pw = md5($pw); 
	$row = mysqli_fetch_array($getCodequery); 
	$email = $row['email']; 
	$query = mysqli_query($bd, "UPDATE usuario SET contrasena = '$pw' WHERE email = '$email'");

	if ($query) {
	 	$query = mysqli_query($bd, "DELETE FROM resetPasswords WHERE code ='$code'"); 
	 	exit('<center><h1>Contraseña actualiza</h1></center><br> <center><a href="index.php">INICIAR</a></center>'); 	
 	 }else {
 	 	exit('<center><h1>Algo salió mal :(</h1></center>'); 	
 	 } 	 
}

?>


<center><form method="post">
	<input type="password" name="password" placeholder="Nueva contraseña"><br>
	<br>
	<input type="submit" name="submit" value="Actualizar contraseña">
</form><center>
