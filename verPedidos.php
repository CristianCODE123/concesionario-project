<?php
require("cabecera.php");
require("model/conexion.php");
$idCliente = $_SESSION["idCliente"];
$sentencia = $bd->query("select * from ventas where idCliente  = '$idCliente' ");
$pedidos = $sentencia->fetch(PDO::FETCH_OBJ);


$sentencia2 = $bd->query("select catalogo.idCatalogo,Marca,Modelo,Cilindraje,Precio,Matricula,imagen,Descripcion,opciones_adicionales.idCatalogo,nombre2 
from catalogo
inner join opciones_adicionales 
on catalogo.idCatalogo = opciones_adicionales.idCatalogo
where catalogo.idCatalogo = '$pedidos->idCatalogo'
");
$catalogo = $sentencia2 ->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssCatalogo/catalogo.css">

    <title>Document</title>
</head>
<body>
<div class = "flex-container" style = "margin-left:95em;">
               <ul>
                 <?php
                 foreach($catalogo as $carro ){

                 
                 ?>
                   <li>
                       <div style = "margin-top:7px" class = "imagen"> <div class = "imagen">    <img src="<?php echo "imagenesSubidas/".$carro->imagen?>"
                                                
                                                width='200' height='200'></div></div>
                       <div class = "contenido" style = "margin-left:1em; margin-top:7px">
                       <div class = "fecha" style = "border:1px solid gray;padding:0.3em"><?php echo "Fecha de compra: ".$pedidos ->fecha?></div>
                      
                       <div style = "margin-top:1em;">
                       <div class = "marca-modelo"><?php echo $carro ->Marca." / ".$carro ->Modelo;?></div>
                       <div class = "precio"><?php echo $carro ->Precio."$"?></div>
                       <div class = "cc"><?php echo $carro ->Cilindraje?> cc</div>
                       <div class = "descripcion"><textarea style = "resize:none;border:none;Overflow-y: hidden;
" name="" id="" cols="65" rows="3" readonly><?php echo $carro ->Descripcion?></textarea></div>
                       <div style = "margin-left:45em;margin-top:5em;" class = "boton1"><a class="text-success" href="comprarInterfaz.php?documento=<?php echo $carro->idCatalogo;?>"><input type="submit" value = "eliminar"></a></td></div>

                       </div>
                      

                       </div>
                      
                   </li>

                   <?php
                 }
                   ?>
                   
               </ul>
               

          </div>
      </div>
      <script src = "errores/cabeceraError.js"></script>
</body>
</html>

