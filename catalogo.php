<?php

  include_once 'model/conexion.php';
  $sentencia = $bd->query("select catalogo.idCatalogo,Marca,Modelo,Cilindraje,Precio,Matricula,imagen,Descripcion,opciones_adicionales.idCatalogo,nombre2 
  from catalogo
  inner join opciones_adicionales 
  on catalogo.idCatalogo = opciones_adicionales.idCatalogo");
  $catalogo = $sentencia ->fetchAll(PDO::FETCH_OBJ);



?>

<?php require_once("cabecera.php");

unset($_SESSION["marca"]);
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
<body class  ="cuerpo">


<div class ="form-div">
<form action="catalogo.php" method = "POST" >
      <select class="form-select" aria-label="Default select example" style = "width:100px;height:40px;">
      <option value= marca>Marca</option>
     <?php 
                            foreach($catalogo as $carro){
                            ?>
                        <option value= <?php echo $carro->Marca;?>><?php echo $carro->Marca; ?> </option>
                        
                       <?php
                       }
                       ?>
</select>
 <div></div>
<select class="form-select" aria-label="Default select example"  style = "width:100px;height:40px;">
<option value= marca>Precio</option>
<?php 
                            foreach($catalogo as $carro){
                            ?>
                        <option value= <?php echo $carro->Precio;?>><?php echo $carro->Precio; ?> </option>
                        
                       <?php
                       }
                       ?>
</select>
<div></div>

<select class="form-select" aria-label="Default select example"  style = "width:120px;height:40px;">
<option value= marca>Cilindraje</option>
<?php 
                            foreach($catalogo as $carro){
                            ?>
                        <option value= <?php echo $carro->Cilindraje;?>><?php echo $carro->Cilindraje; ?> </option>
                        
                       <?php
                       }
                       ?>
  
</select>
                     
                         <input type="submit" style = "width:100px;height:40px" value = "Buscar"
                           class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        
                       
      </form>

</div>


      <div class = "options">
      <div>


      </div>
      

          <div class = "flex-container" style ="margin-left:45.5em">
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
                       <div class = "descripcion"><textarea style = "resize:none;border:none;Overflow-y: hidden;
" name="" id="" cols="65" rows="3" readonly><?php echo $carro ->Descripcion?></textarea></div>
                       <div class = "boton"><a class="text-success" href="comprarInterfaz.php?documento=<?php echo $carro->idCatalogo;?>"><input type="submit" value = "comprar"></a></td></div>

                       </div>
                      
                   </li>

                   <?php
                 }
                   ?>
                   
               </ul>
               

          </div>
      </div>
      <script>
        let cabecera = document.getElementById("primary-nav");
        let logo = document.getElementById("logo");
        logo.style.marginTop ="-0.5em";
        cabecera.style.marginLeft = "-0.1em";
        cabecera.style.marginLeft = "11em";

        cabecera.style.marginTop = "1em";

        let buscar = document.getElementById("buscar");
        let plantilla = document.getElementById("flex-container");
        buscar.addEventListener("click",()=>{
         plantilla.innerHtml =  ``;
        });
      </script>
</body>
</html>