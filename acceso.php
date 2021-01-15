<?php
    require 'conexion.php';

    class Acceso {

        
        public function login($usr, $passw){
            global $bd;
            $usuario = $bd->real_escape_string($usr);
            $contrasena = $bd->real_escape_string($passw);
            $pass = md5($contrasena);
            $sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND contrasena='$pass';";
            $reg = $bd->query($sql); 
            if($reg->num_rows) {
                
                $_SESSION["id"] = session_id();
                $_SESSION["usr"] = $usr;
                $_SESSION["entrada"] = time();

                
                $row = mysqli_fetch_assoc($reg);
                $fecha = date('YmdHis');
                $sql2 = "UPDATE `usuario` SET `ultimoLog` = '$fecha' WHERE `idUsuario` = '".$row["idUsuario"]."'";
                $bd->query($sql2);
                $_SESSION["datos"] = serialize([
                    $row["nombre"],
                    $row["apellido"],
                    $row["idUsuario"]
                ]);
                $_SESSION["idUser"] = $row["idUsuario"];
                if ($row["admin"] == 0){
                    $_SESSION["rol"] = "usuario";
                } else {
                    $_SESSION["rol"] = "admin";
                }
                return true;
            } else {
                return false;
            }
            $bd->close();
        } 

        
        public function desconectar(){
            
            $_SESSION = [];
            session_destroy();
        } 

        
        public function sessionActiva(){
            return (isset($_SESSION['id']))? true : false;
        }

    }
?>
