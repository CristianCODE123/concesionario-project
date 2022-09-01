
<?php require_once("model/conexion.php");

require_once("cabecera.php");
$idClient = $_SESSION["idCliente"];

$sentencia = $bd->query("select vendedor_catalogo.idvendedor,vendedor_catalogo.idcatalogo,correo,password,Marca,Modelo,Cilindraje,Precio,Matricula,imagen,Descripcion,opciones_adicionales.idCatalogo,imagen from vendedor_catalogo
inner join cliente
on cliente.idcliente = vendedor_catalogo.idvendedor
inner join catalogo
on catalogo.idcatalogo = vendedor_catalogo.idcatalogo
inner join opciones_adicionales
on catalogo.idcatalogo = opciones_adicionales.idCatalogo
where vendedor_catalogo.idvendedor = '$idClient';");
$catalogo = $sentencia ->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssCatalogo/catalogo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class  ="cuerpo">
    <

      <div class = "options">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Marcas
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Ajustes</a></li>
              <li><a class="dropdown-item" href="#">Carrito</a></li>
              <li><a class="dropdown-item" href="#">Cerrar sesion</a></li>
            </ul>
          </div>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Precio
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Cilindraje
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>

          <div>
              <input type="text" width="200">
          </div>

          <div class = "flex-container">
               <ul>
                 <?php
                 foreach($catalogo as $carro ){

                 
                 ?>
                   <li>
                   <div class = "imagen"> <div class = "imagen">    <img src="<?php echo "imagenesSubidas/".$carro->imagen?>"
                                                
                                                width='200' height='200'></div></div>
                       <div class = "contenido">

                       <div class = "marca-modelo"><?php echo $carro ->Marca." / ".$carro ->Modelo;?></div>
                       <div class = "precio"><?php echo $carro ->Precio."$"?></div>
                       <div class = "cc"><?php echo $carro ->Cilindraje?> cc</div>
                       <div class = "descripcion"><?php echo $carro ->Descripcion?></div>

                       <div  class = "boton">
                        <div>
                        <a class="text-success" href="editarMipubli.php?documento=<?php echo $carro->idCatalogo;?><?php $_SESSION["documento"] =$carro->idCatalogo;?>"><input type="submit" value = "Editar"></a></td>
                        </div>
                       
                       <div>
                       <a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminarMiPubli.php?documento=<?php $_SESSION["documento"] =$carro->idCatalogo; echo $carro->idCatalogo; ?>"><input style ="background-color:red;"  type="submit" value = "eliminar"></a>
                       </div>
                       
                      </div>
                        
                       </div>
                      
                   </li>

                   <?php
                 }
                   ?>
                   
               </ul>
          </div>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>