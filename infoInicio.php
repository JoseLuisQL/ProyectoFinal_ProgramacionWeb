<?php

require 'productos.php';

$reg = null;

$total = 1; 
$total_paginas = 1; 

if(isset($_GET["todo"])){
    $pagina = $_GET["pagina"] ?? 1;
    $limit = $_GET["filtro"] ?? 20;
    $nombrePlt = 'todo';
    $objP = new Producto;
    $datos = $objP->obtenerTodosProductos($pagina,$limit);

    $reg = $datos[0]; 
    $total = $datos[1]; 
    $total_paginas = $datos[2]; 
}
if(isset($_GET["nsw"])){
    $pagina = $_GET["pagina"] ?? 1;
    $nombrePlt = 'nsw';
    $filtro = '3';
    $limit = $_GET["filtro"] ?? 4;
    $objP = new Producto;
    if(isset($_GET["init"])){
        $reg = $objP->filtroInicio($filtro,$limit,$nombrePlt,$limit);
    }else{
        $datos = $objP->obtenerProductos($filtro, $limit, $nombrePlt, $pagina);

        $reg = $datos[0]; 
        $total = $datos[1]; 
        $total_paginas = $datos[2]; 
    }
}
if(isset($_GET["ps4"])){
    $pagina = $_GET["pagina"] ?? 1;
    $nombrePlt = 'ps4';
	$filtro = '2';
	$limit = $_GET["filtro"] ?? 4;
	$objP = new Producto;
	if(isset($_GET["init"])){
        $reg = $objP->filtroInicio($filtro, $limit, $nombrePlt);
    }else{
        $datos = $objP->obtenerProductos($filtro, $limit, $nombrePlt,$pagina);

        $reg = $datos[0]; 
        $total = $datos[1]; 
        $total_paginas = $datos[2];
    }

}
if(isset($_GET["xone"])){
    $pagina = $_GET["pagina"] ?? 1;
    $nombrePlt = 'xone';
	$filtro = '7';
	$limit = $_GET["filtro"] ?? 4;
	$objP = new Producto;
	if(isset($_GET["init"])){
        $reg = $objP->filtroInicio($filtro, $limit, $nombrePlt);
    }else{
        $datos = $objP->obtenerProductos($filtro, $limit, $nombrePlt,$pagina);

        $reg = $datos[0]; 
        $total = $datos[1]; 
        $total_paginas = $datos[2]; 
    }

}

if(isset($_GET["pc"])){
    $pagina = $_GET["pagina"] ?? 1;
    $nombrePlt = 'pc';
	$filtro = '4';
	$limit = $_GET["filtro"] ?? 4;
	$objP = new Producto;
	if(isset($_GET["init"])){
        $reg = $objP->filtroInicio($filtro, $limit, $nombrePlt);
    }else{
        $datos = $objP->obtenerProductos($filtro, $limit, $nombrePlt,$pagina);

        $reg = $datos[0];
        $total = $datos[1]; 
        $total_paginas = $datos[2]; 
    }
}
if(isset($_GET["n3ds"])){
    
}
if(isset($_GET["reserva"])){
    
}
if(isset($_GET["accesorios"])){
    
}
if(isset($_GET["vendidos"])){
    $objP = new Producto;
    $reg = $objP->masvendidos();
}
if(isset($_GET["nuevos"])){
    $objP = new Producto;
    $reg = $objP->nuevos();
}
if(isset($_GET["buscar"])){
    $pagina = $_GET["pagina"] ?? 1;
    $limit = $_GET["filtro"] ?? 20;
    $nombrePlt = 'todo';
    $texto = $_POST["texto"];
    $objP = new Producto;
    $datos = $objP->buscarProducto($pagina,$limit,$texto);

    $reg = $datos[0]; 
}

if($reg == NULL || $reg->num_rows == 0){
    ?>
    <?php
}else{

?>
<div class="row">
    <div class="">
        <?php if($total != 1){ ?>
            <div style='font-size:25px'>Total de productos encontrados: <?=$total?> </div>
        <?php } ?>
    </div>
    <div class="col l12">
    <?php while($row = mysqli_fetch_assoc($reg)){
        if($row["img"] == NULL){
            $img = "00.png";
        }else{
            $img = $row["img"];
        }
        ?>
        <div class="col s10 offset-s1 m6 l4 xl3">
            <div class="card carta-margin">
                <div class="center-align <?=$row['nombrePlataforma']?>"><?=$row["nombrePlataforma"]?></div>
                <div class="card-image">
                    <a id="<?=$row['idVersion']?>" onclick="infoVersion(this.id, '<?=$row["nombreJuego"]?>', '<?=$row["nombrePlataforma"]?>');"><img class="tamaño-img" src="img/portadas/<?=$img ?>"></a>
                </div>
                <p style="height: 80px" class="card-title center-align"><?=$row["nombreJuego"]?></p>
                <p class="center-align"><?=$row["nombreEdicion"]?>
                <div class="card-action center-align">
                    <?php if($row["stock"]<=0){?>
                        <span class="pink-text" style="font-size:24px">¡Agotado!</span>
                    <?php }else{ ?>
                    <span class="pink-text" style="font-size:24px"><?=$row["precio"]?> $</span>
                    <a onclick="añadirCarrito(this.id, <?=$row["precio"]?>, '<?=$row['nombreJuego']?>')" id="<?=$row['idVersion']?>" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">shopping_cart</i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
    }
    ?>
    </div>
</div>
   
    <?php

        if($total_paginas != 1){

    ?>
    <div class="center" style="padding: 15px">
        <ul class="pagination">
                <?php if($pagina == 1){ ?>
                    <li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>
                <?php } else { ?>
                    <li class="waves-effect"><a onclick="vistaPtl('<?=$nombrePlt?>','<?=$limit?>','<?=$pagina-1?>')"><i class="material-icons">chevron_left</i></a></li>
                <?php }
                ?>
            <?php
                $i = 1;
                while($i<=$total_paginas){
                    if($i == $pagina){
                        ?>
                        <li class="active"><a><?=$i?></a></li>
                        <?php
                    }else{
                    ?>

                    <li class="waves-effect"><a onclick="vistaPtl('<?=$nombrePlt?>','<?=$limit?>','<?=$i?>')"><?=$i?></a></li>
                    <?php
                    }
                    $i++;
                }
            ?>
            <?php if($pagina == $total_paginas){ ?>
                    <li class="disabled"><a><i class="material-icons">chevron_right</i></a></li>
                <?php } else { ?>
                    <li class="waves-effect"><a onclick="vistaPtl('<?=$nombrePlt?>','<?=$limit?>','<?=$pagina+1?>')"><i class="material-icons">chevron_right</i></a></li>
                <?php }
            ?>

        </ul>
    <?php } ?>
    
</div>
