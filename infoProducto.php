<?php
    require 'productos.php';

    $objId = new Producto();
    $dato = $objId->obtenerInfoProducto($_GET['id']);

    $ptl = $_GET['ptl'];
    $ptl = strtolower($ptl);

?>
<a class="waves-effect waves-light btn  margenBoton" onclick="vistaPtl('<?=$ptl?>')" ><i class="material-icons left" style="margin-left: 15px;">arrow_back</i></a>
<div class="container">
    <div class="row">
        <h1 class="col s12" style="color:green"><?=$dato["nombreJuego"]?></h1>
        <img src="img/portadas/<?=$dato['img']?>" class="col s3"/>
        <div class="col s2 letra-roboco">
            <label>PLATAFORMA:</label>
            <div class="center-align"><?=$dato["nombrePlataforma"]?></div>
            <br>
            <label>EDICIÓN:</label>
            <div class="center-align"><?=$dato["nombreEdicion"]?></div>
            <br>
            <label>Lanzamiento:</label>
            <div class="center-align"><?=$dato["fechaSalida"]?></div>
        </div>
        <div class="col offset-s4">
            <h5 class="pink-text" style="text-decoration: underline">PRECIO</h5>
            <h2 class="pink-text"><?=$dato["precio"]?> $</h2>
        </div>
    </div>
    <div class="row">
        <h3 style="color:green">Descripción</h3>
        <p class="col s12 letra-roboco"><?=$dato["descripJuego"]?></p>
    </div>
    <div class="center-align">
        <iframe width="80%" height="500" src="img/lol.gif" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
</div>
