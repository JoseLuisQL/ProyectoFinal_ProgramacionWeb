<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);
  

    if($conexion->connect_error) die("Error fatal");

    if (isset($_POST['username'])&&
        isset($_POST['password']))
    {
        $un_temp = mysql_entities_fix_string($conexion, $_POST['username']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);
        $query   = "SELECT * FROM usuario WHERE nombreUsuario='$un_temp';";
        $result  = $conexion->query($query);
        $_SESSION['Usuario'] = $un_temp;
        
        if (!$result) die ("Usuario no encontrado");
        elseif ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();

            if (password_verify($pw_temp, $row[5])) 
            {
                session_start();
                $_SESSION['nombre']=$row[3];
                $_SESSION['apellido']=$row[4];
                

                echo <<<_END
                <body background="../fondo4.png">
                <div>
                <form action="index.php"  method="post">
                  <div><center><h1>Hola $row[3] $row[4], has ingresado como <B>$row[4]</B></h1></center></div>                   
                  <center><button type="submit">Click para ingresar al Sistema<label></label></button>  </center>             
               </form>
               </div>
               </body>
              _END;
            }
            else {
                require 'form/registrarse_vista.php';
            }
        }
        else {
            require 'form/registrarse_vista.php';
      }

        
    }
    else
    {
      require 'form/login_vista.php'; 
      
    }

    $conexion->close();

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