

<li><a class="subheader letra-semimediana">Cesta</a></li>
<?php
    if(!isset($_SESSION['carro'])){
        session_start();
    }
    if(isset($_SESSION['carro'])){
        $arrayC = unserialize($_SESSION['carro']);
?>
        <li>
        <?php
            $i = 0;
            while(count($arrayC) > $i){
        ?>
                <a><i class="material-icons">videogame_asset</i>

                        <div style="overflow: hidden; height:30px" onclick="infoVersion(this.id, 'Info', 'Cesta', true)" id="<?=$arrayC[$i]["id"] ?>"><span style="width: 30px"><?=$arrayC[$i]["nombre"] ?></span> x <?=$arrayC[$i]["cantidad"] ?></div>
                        

                </a>
            <?php
                $i++;
            }
            ?>
        </li>
<br>
<?php }else{ ?>
    <li style='padding-left: 20px'>No tienes productos</li>
    

<?php } ?>
