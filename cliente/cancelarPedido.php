<?php
require 'tienda.php';

$pedidos = new Pedido;

if(!isset($_GET["completado"])){
    $listaPedidos = $pedidos->cancelarPedido($_POST["idLocalizador"],$_POST["idUsr"]);
    echo $listaPedidos;
}else{
    $pedidos->pedidoRecibido($_POST["localizador"]);
}
?>