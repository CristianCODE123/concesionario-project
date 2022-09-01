<?php  //sirve para mantener abierta la sesion 
?>
<?php 
   require("model/conexion.php");
   require_once("cabecera.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ventas/tabla.css">
    <title>MENU PRINCIPAL</title>
</head>

<body>
    
<div class = "container-interfaz">
<table class="table">
<thead>
    <tr>
        <td scope="col" >Nº Venta</td>
        <td scope="col">Cliente</td>
        <td scope="col">Catalogo</td>
        <td scope="col">Vehiculo</td>
        <td scope="col">Precio</td>
        <td scope="col">Vendedor</td>
        <td scope="col">Editar</td>
        <td scope="col">Eliminar</td>    
    </tr>
    </thead>

    <?php 
    $sql= $bd->query("SELECT * FROM ventas");

    
    $result= $sql->fetchAll(PDO::FETCH_OBJ);
    foreach($result as $mostrar){
    ?>  
    <tr>
        <td><?php echo $mostrar->idVentas?></td>
        <td><?php echo $mostrar->idCliente?></td>
        <td><?php echo $mostrar->idCatalogo?></td>
        <td><?php echo $mostrar->idVehiculo?></td>
        <td><?php echo $mostrar->Precio?></td>
        <td><?php echo $mostrar->idvendedor?></td>
        <td><button type="submit" class="btn btn-primary" name="btneditar "><a href="editar.php?idVentas=<?php echo $mostrar->idVentas; ?>">Editar</a></button></td>
        <td><button type="submit" class="btn btn-danger" name="btneliminar"><a href="eliminar.php?idVentas=<?php echo $mostrar->idVentas; ?>">Eliminar</a></button></td>
       
        </tr>
<?php
    }
?>
</table>
</div>


</body>
</html>