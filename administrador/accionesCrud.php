<?php
    include('trastienda.php');
    
    $obj = new Trastienda();

if(isset($_GET["juego"])){ 

    if($_GET["accion"]=='crear'){

        $nombre = $_POST["nombre"];
        $desc = $_POST["desc"];

        $result = $obj->guardarGenerico('videojuego', $nombre, $desc);

        if($result == true){
            echo "true";
        }else{
            echo "false";
        }
    }
    if($_GET["accion"]=='eliminar'){
        
    }
    if($_GET["accion"]=='editar'){
        
    }
    if($_GET["accion"]=='leer'){
        
    }
}

if(isset($_GET["plataforma"])){ 
    if($_GET["accion"]=='crear'){
        $nombre = $_POST["nombre"];

        $result = $obj->guardarGenerico('plataforma', $nombre); 

        if($result == true){
            echo "true";
        }else{
            echo "false";
        }
    }
    if($_GET["accion"]=='eliminar'){
        
    }
    if($_GET["accion"]=='editar'){
        
    }
    if($_GET["accion"]=='leer'){
        
    }
}

if(isset($_GET["edicion"])){ 
    if($_GET["accion"]=='crear'){
        $nombre = $_POST["nombre"];
        $desc = $_POST["desc"];

        $result = $obj->guardarGenerico('edicion', $nombre, $desc); 

        if($result == true){
            echo "true";
        }else{
            echo "false";
        }
    }
    if($_GET["accion"]=='eliminar'){
       
    }
    if($_GET["accion"]=='editar'){
        
    }
    if($_GET["accion"]=='leer'){
       
    }
}

if(isset($_GET["version"])){ 
    if($_GET["accion"]=='crear'){
        
    }
    if($_GET["accion"]=='eliminar'){ 
        
    }
    if($_GET["accion"]=='editar'){
        
    }
    if($_GET["accion"]=='leer'){
        
    }
}


?>