<?php
    
	class ProductoCesta{ 
		public $idProducto; 
		public $cantidad; 
		public $nombreJuego; 
		public $nombreEdicion; 
		public $nombrePlataforma; 
		public $nombreDistribuidora; 
		public $precioPorArticulo; 
		public function __construct($id,$cantidad,$nombreJuego,$nombreEdicion,$nombrePlataforma,$nombreDistribuidora,$precio){
			$this->idProducto = $id;
			$this->cantidad = $cantidad;
			$this->nombreJuego = $nombreJuego;
			$this->nombreEdicion = $nombreEdicion;
			$this->nombrePlataforma = $nombrePlataforma;
			$this->nombreDistribuidora = $nombreDistribuidora;
			$this->precio = $precio;
		}
	}
	require '../conexion.php';
	
    class Cesta {
        
        public function obtenerTodosProductos($arrayCarrito){
            global $bd;
			$ArrayObjectoProdutos = [];
			$i = 0;
            $ArrayLength = count($arrayCarrito);
            while($i < $ArrayLength){
				$sqlDatosCesta = "SELECT version.idVersion, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora,version.img
				FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
				WHERE version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1
				AND (idVersion = ". $arrayCarrito[$i]["id"] .")";


				$reg = $bd->query($sqlDatosCesta);

				$datos = mysqli_fetch_assoc($reg);
				$IdProducto = $arrayCarrito[$i]["id"];
				$cantidad = $arrayCarrito[$i]["cantidad"];
				$nombreJuego = $datos["nombreJuego"];
				$nombreEdicion = $datos["nombreEdicion"];
				$nombrePlataforma = $datos["nombrePlataforma"];
				$nombreDistribuidora = $datos["nombreDistribuidora"];
				$precio = $datos["precio"];
				$objecto = new ProductoCesta($IdProducto,$cantidad,$nombreJuego,$nombreEdicion,$nombrePlataforma,$nombreDistribuidora,$precio);

				array_push($ArrayObjectoProdutos, $objecto);

				$i++;
            }
            return $ArrayObjectoProdutos;
			$bd->close();
        }
       
    } 
