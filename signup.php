
<?php
    
    if((isset($_POST["usr"])) && (isset($_POST["pass"]))  && (isset($_POST["email"])) && (isset($_POST["nombre"])) && (isset($_POST["apellido"])) && (isset($_POST["telefono"]))
     && ( $_POST["usr"] != "") && ( $_POST["pass"] != "" ) && ( $_POST["email"] != "") && ( $_POST["nombre"] != "") && ( $_POST["apellido"] != "") && ( $_POST["telefono"] != "") ){
         
         include 'conexion.php';
         
         $usuario = $bd->real_escape_string($_POST["usr"]) ;
         $contrasena = $bd->real_escape_string($_POST["pass"]);
         $email = $bd->real_escape_string($_POST["email"]);
         $nombre = $bd->real_escape_string($_POST["nombre"]);
         $apellido = $bd->real_escape_string($_POST["apellido"]);
         $telefono = $bd->real_escape_string($_POST["telefono"]);
         
         $sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario';";
         $reg = $bd->query($sql); 
         if($reg->num_rows) {
            echo '{"estado":"ko","msg":"¡Este nombre de usuario ya existe!"}';
         } else {
             $pass = md5($contrasena);
             $fecha = date('YmdHis');
             $sql = "INSERT INTO `usuario`(`idUsuario`, `nombre`,`apellido`,`telefono`, `nombreUsuario`, `contrasena`, `admin`, `fechaRegistro`, `email`) 
             VALUES (NULL,'$nombre','$apellido','$telefono','$usuario','$pass',0,'$fecha','$email')";
             $añadir = $bd->query($sql);
             echo '{"estado":"ok","msg":"Listo!"}';
 
         }
         $bd->close();
     } else {
         echo '{"estado":"ko","msg":"¡Rellena todos los datos!"}';
     }
 
     function mysql_entities_fix_string($bd, $string)
     {
         return htmlentities(mysql_fix_string($bd, $string));
       }
     function mysql_fix_string($bd, $string)
     {
         if (get_magic_quotes_gpc()) $string = stripslashes($string);
         return $bd->real_escape_string($string);
       } 
 
 ?>
 