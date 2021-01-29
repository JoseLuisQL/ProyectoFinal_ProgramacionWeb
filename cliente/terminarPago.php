
<?php
session_start();

require 'tienda.php';

class DatosPedido {
    public $nombre;
    public $apellidos;
    public $dni;
    public $calle;
    public $numeroCalle;
    public $ciudad;
    public $provincia;
    public $cp;
    public $telefono;
    public $metodoCorreo;
    public $numeroTarjeta;
    public $mes;
    public $anio;
    public $titular;
    public $ccTarjeta;
    public $arrayCarrito;
    public $idUsr;
    public $fecha;
    public function __construct(
        $nombre,$apellidos,$dni,$calle,$numeroCalle,$ciudad,$provincia,$cp,$telefono,$metodoCorreo,$tarjeta,$mes,$anio,$titular,$ccTarjeta,$carrito,$idUsr,$fecha){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->dni = $dni;
            $this->calle = $calle;
            $this->numeroCalle = $numeroCalle;
            $this->ciudad = $ciudad;
            $this->provincia = $provincia;
            $this->cp = $cp;
            $this->telefono = $telefono;
            $this->metodoCorreo = $metodoCorreo;
            $this->numeroTarjeta = $tarjeta;
            $this->mes = $mes;
            $this->anio = $anio;
            $this->titular = $titular;
            $this->ccTarjeta = $ccTarjeta;
            $this->arrayCarrito = $carrito;
            $this->idUsr = $idUsr;
            $this->fecha = $fecha;
    }
}
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$dni = $_POST["dni"];
$calle = $_POST["calle"];
$numeroCalle = $_POST["numeroCalle"];
$ciudad = $_POST["ciudad"];
$provincia = $_POST["provincia"];
$cp = $_POST["cp"];
$telefono = $_POST["telefono"];
$metodoCorreo = $_POST["metodoCorreo"];
$datosPago = $_POST["datosPago"];
$carro = $_SESSION["carro"];
$datos = $_SESSION["datos"];


$arrayCarrito = unserialize($carro);
$idUsr = unserialize($datos)[2];
$curr_timestamp = date('YmdHis');


$datosPedidos = new DatosPedido($nombre,$apellidos,$dni,$calle,$numeroCalle,$ciudad,$provincia,$cp,$telefono,$metodoCorreo,$datosPago[0],$datosPago[1],$datosPago[2],$datosPago[3],$datosPago[4],$arrayCarrito,$idUsr,$curr_timestamp);

$object = new Pedido;
$estado = $object->realizarPedido($datosPedidos);
unset($_SESSION["carro"]);

    echo $estado;


?>