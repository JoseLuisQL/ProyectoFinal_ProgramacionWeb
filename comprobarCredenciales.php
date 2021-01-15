<?php
    session_start();
    require 'acceso.php';


    $objS = new Acceso();
    if(isset($_GET["exit"])){
        $objD = new Acceso();
        $objD->desconectar();
    } else {
        $mensaje = "";
        if(isset($_GET["usr"])){
            $objL = new Acceso();
            $respuesta = $objL->login($_GET["usr"],$_GET["pass"]);
            if($respuesta){
                echo '{"cod":200,"msg":"Bienvenido!"}';
            }else{
                echo '{"cod":401,"msg":"Las credenciales no son correctas"}';
            }
        }else{
            echo '{"cod":500,"msg":"El usuario no llego correctamente"}';
        }
    }
?>