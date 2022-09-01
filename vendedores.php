<?php

  include_once 'model/conexion.php';
  $sentencia = $bd->query("select cliente.Nombre,cliente.apellido,cliente.correo,cliente.telefono,cliente.direccion,cliente.fecha_nacimiento 
  from vendedor
  inner join cliente
  on vendedor.idCliente = cliente.idCliente");
  $vendedor = $sentencia ->fetchAll(PDO::FETCH_OBJ);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssVendedores/vendedores.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<?php require_once("cabecera.php")



?>

<?php 

?>

   <div class = "container-seelers">
    <ul>
       
        <div class = "flex-container">
               <ul>
                 <?php
                 foreach($vendedor as $ven ){

                  
                 ?>
                   <li>
                       
                      
                   </li>
                
                   <li>
           <div class="card" style="width: 18rem;">
  <img src="vendedorImg/descarga.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $ven->Nombre." ".$ven->apellido;?></h5>
    <h6 class="card-title"><?php echo $ven->correo;?></h6>
    <h6 class="card-title"><?php echo $ven->telefono;?></h6>
    <h6 class="card-title"><?php echo $ven->direccion;?></h6>
    <a href="#" class="btn btn-primary">Ver publicaciones</a>
  </div>
</div>
        </li>
        
                   <?php
                 }
                   ?>
                   
               </ul>
          </div>
       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>