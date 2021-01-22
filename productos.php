<?php

    require 'conexion.php';
    class Producto {
        
        public function obtenerTodosProductos($pagina,$limit){
            global $bd;
            
            $sqlTodosProductos = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
                                dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
                                version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                                FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                                where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
                                AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1";

            $regLimit = $bd->query($sqlTodosProductos);

            $total = $regLimit->num_rows;
            $total_paginas = ceil($total/$limit);
            $empezarDesde = ($pagina-1)*$limit;

            $sqlLimite = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
                dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
                version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
                AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1 LIMIT $empezarDesde,$limit";


            $reg = $bd->query($sqlLimite);
            $bd->close();
            $arrayDevolver = [];
            array_push($arrayDevolver, $reg, $total, $total_paginas);
            return $arrayDevolver;
        }

        public function buscarProducto($pagina,$limit,$texto){
            global $bd;
            $sqlFiltro = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
                                dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
                                version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                                FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                                where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
                                AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1 AND juego.nombreJuego LIKE '%$texto%' LIMIT 8";
            $reg = $bd->query($sqlFiltro);
            $bd->close();
            $arrayDevolver = [];
            array_push($arrayDevolver, $reg);
            return $arrayDevolver;
        }

        public function obtenerInfoProducto($id){
            global $bd;
            $sqlInfoProducto = "SELECT version.idVersion, version.img , juego.nombreJuego, ed.nombreEdicion,
                    ptl.nombrePlataforma, juego.descripJuego ,version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                    FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                    where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND
                    version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.idVersion = $id";

            $reg = $bd->query($sqlInfoProducto);
            $dato = mysqli_fetch_assoc($reg);
        	$bd->close();

            return $dato;
        }

        public function filtroInicio($plataforma,$limite,$nombrePlt){
            global $bd;

            $sqlFiltro = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
                    dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
                     version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                    FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                    where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
                    AND version.idPlataforma = $plataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1 AND ptl.nombrePlataforma = '$nombrePlt' LIMIT 0,$limite";

            $reg = $bd->query($sqlFiltro);
            $bd->close();

            return $reg;
        }

        public function obtenerProductos($plataforma,$limit,$nombrePlt,$pagina){
            global $bd;

            $sqlFiltro = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
                    dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
                     version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                    FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                    where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
                    AND version.idPlataforma = $plataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1 AND ptl.nombrePlataforma = '$nombrePlt'";

            $regLimit = $bd->query($sqlFiltro);


            $total = $regLimit->num_rows;
            $total_paginas = ceil($total/$limit);
            $empezarDesde = ($pagina-1)*$limit;

            $sqlLimite = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
                dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
                version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
                AND version.idPlataforma = $plataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1 AND ptl.nombrePlataforma = '$nombrePlt' LIMIT $empezarDesde,$limit";


            $reg = $bd->query($sqlLimite);
            $bd->close();
            $arrayDevolver = [];
            array_push($arrayDevolver, $reg, $total, $total_paginas);
            return $arrayDevolver;
        }
        public function masvendidos(){
            global $bd;
            $sql = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
            dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
            version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
            FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
            where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
            AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1
            ORDER BY `ventas` DESC LIMIT 4";
            $reg = $bd->query($sql);
            return $reg;
        }
        public function nuevos(){
            global $bd;
            $sql = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion, dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
            version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
            FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
            where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1
            ORDER BY `fechaSalida` DESC LIMIT 4";
            $reg = $bd->query($sql);
            return $reg;
        }
    }
?>
