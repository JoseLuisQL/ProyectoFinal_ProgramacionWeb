<?php
    require 'basedatos.php';
    $bd = new mysqli($hn, $un, $pw, $db, $port);
    if ($bd->connect_error) die ("Fatal error");
?>
