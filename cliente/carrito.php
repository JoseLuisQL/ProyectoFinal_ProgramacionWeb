<?php

    if(!isset($_SESSION['carro'])){
        session_start();
    }
    if(isset($_GET["idA"])){

        $idP = $_GET["idA"];
        $precio = $_GET["precio"];
        $nombre = $_GET["nombre"];


        if(isset($_SESSION["carro"])){
            $array = unserialize($_SESSION["carro"]);
            $i=0;
            $nuevoP = true;
            while(count($array) > $i){
                if($array[$i]["id"] == $idP){
                    $cantidad = $array[$i]["cantidad"];
                    $array[$i]["cantidad"] = $cantidad+1;
                    $i = count($array);
                    $nuevoP = false;
                }
                $i++;
            }
            if($nuevoP){
                array_push($array, [
                    "id" => $idP,
                    "cantidad" => 1,
                    "precioUnidad" => $precio,
                    "nombre" => $nombre
                ]);
            }
            $_SESSION["carro"] = serialize($array);
        }else{
            $_SESSION["carro"] = serialize([
                [
                     "id" => $idP,
                     "cantidad" => 1,
                     "precioUnidad" => $precio,
                     "nombre"=> $nombre
                ]
            ]);
        }
        include 'carroPerfil.php';
    }

    if(isset($_GET["idE"])) {
        
        $array = unserialize($_SESSION["carro"]);
        $i=0;
        while(count($array) > $i){
            if($array[$i]["id"] == $_GET["idE"]){
                $cantidad = $array[$i]["cantidad"];
                if($cantidad == 1){
                    unset($array[$i]);
                }else{
                    $array[$i]["cantidad"] = $cantidad-1;
                }
                $i = count($array);
            }
            $i++;
        }
        $_SESSION["carro"] = serialize($array);
        include 'cesta.php';
    }
    if(isset($_GET["borrarTodoCarro"])) {
        unset($_SESSION["carro"]);
        include 'carroPerfil.php';
    }


?>
