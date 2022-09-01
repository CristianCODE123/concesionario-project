<?php include("cabecera.php");

if(!isset($_SESSION["idCliente"])){
    header('location: login.php?mensaje = error');
    exit();
}
include_once("model/conexion.php");
$codigo = $_GET["documento"];
$_SESSION["doc"] = $_GET["documento"];
$sentencia = $bd->prepare("select catalogo.idCatalogo,marca,modelo,cilindraje,precio,matricula,imagen,descripcion,km from catalogo
inner join opciones_adicionales
on catalogo.idcatalogo = opciones_adicionales.idCatalogo
where catalogo.idcatalogo = ?; ");
$sentencia->execute([$codigo]);
$catalogo = $sentencia->fetch(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssCompra/css.css">
    <title>Document</title>
</head>
<body>
<div class="card-seller">
  <div class="card-header">
    Informacion del vendedor:
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    <div class = "principal-container">
        
    <div class = "imagen"> <div class = "img-container">    <img src="<?php echo "imagenesSubidas/".$catalogo->imagen;?>"
                                                
                                             width = 600px height = 500px ></div></div>
            <div class = "especificaciones-container">
                    <div class = "cont">
                            <h3><?php echo $catalogo->marca."/".$catalogo->modelo?></h3>
                            <h3><?php echo "$".$catalogo->precio?></h3>
                            <h3><?php echo $catalogo->cilindraje."cc"?></h3>
                            <h3><?php echo $catalogo->km."km"?></h3>
                            <h3><?php echo $_GET["documento"]?></h3>
                            <div class = "descripcion">
                            <div class = "descripcion"><textarea style = "resize:none;border:none;Overflow-y: hidden;
" name="" id="" cols="36" rows="10" readonly><?php echo $catalogo->descripcion?></textarea></div>
                            </div>
                            <div class ="botones" style = "margin-left:1em;">
                            <a onclick="return confirm('Estas seguro de comprar este vehiculo?');" class="text-danger" href="RealizarCompra.php?documento=<?php $_SESSION["idCatalogo"] =$catalogo->idCatalogo; echo $catalogo->idCatalogo; ?>"><input  type="submit" value = "comprar"></a>
                            <a onclick="return confirm('Estas seguro de tazar un vehiculo?');" class="text-danger" href="tazarVehiculo.php?documento=<?php $_SESSION["idCatalogo"] =$catalogo->idCatalogo; echo $catalogo->idCatalogo; ?>"><input  type="submit" value = "tazar vehiculo"></a>    
                            </div>
                                
                    
                        </div>
                        
                        <?phP

                if(isset($_SESSION["marca"])){

    
                    ?>
                    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Vehiculo tazado:</h5>
    
    <p class="card-text"><?php echo $_SESSION["marca"]."/".$_SESSION["modelo"]?></p>
    <p class="card-text"><?php echo $_SESSION["matricula"]?></p>
    <p class="card-text"><?php echo "$".$_SESSION["precio"]?></p>
    <p class="card-text"><?php echo "fecha: ".$_SESSION["fecha"]?></p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>



                     <?php
                     exit();
                    }
                     
                     ?>
                    
            </div>

    </div>

    
</body>
</html>

<?php

?>