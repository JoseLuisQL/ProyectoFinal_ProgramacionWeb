<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['nombreUsuario']) && isset($_POST['contrasena']))
    {
        $iduser = mysql_entities_fix_string($conexion, $_POST['idUsuario']);
        $nombre = mysql_entities_fix_string($conexion, $_POST['nombre']);
        $apellido = mysql_entities_fix_string($conexion, $_POST['apellido']);
        $email = mysql_entities_fix_string($conexion, $_POST['email']);
        $username = mysql_entities_fix_string($conexion, $_POST['nombreUsuario']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['contrasena']);

        $password = password_hash($pw_temp, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuario VALUES('$iduser','$username','$password','$nombre','$apellido','','','',999999999,0,'', '','$email')";

        //echo $query;
        $result = $conexion->query($query);
        if (!$result) die ("Falló registro");

        require 'form/exitoso.php';
        
    }
    else
    {
        require 'form/signup_vista.php';
    }
    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
        if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      }   
?>