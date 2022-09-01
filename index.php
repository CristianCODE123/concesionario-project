<?phP include("cabecera.php");
include("model/conexion.php");
$sentencia = $bd->query("select catalogo.idCatalogo,Marca,Modelo,imagen,Cilindraje,Precio,Matricula,imagen,Descripcion,opciones_adicionales.idCatalogo,nombre2 
from catalogo
inner join opciones_adicionales 
on catalogo.idCatalogo = opciones_adicionales.idCatalogo
ORDER by catalogo.idCatalogo DESC
LIMIT 4");

$carros = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Document</title>
</head>
<body>
  
  
  <section class="hero" >
    <div class = "container">
      <div class = "left-col">
        <h1>Has de tus sueños realidad <br> con nuestro increible catalogo</h1>
        <div class = "d-section"> 
          <p>Compra un vehiculo o cede uno ya usado
        <br> disponible en todo colombia</p>
        </div>
       
        
        <div class = "hero-cta">
           
         <ul class = "primerul">
           <li class = "btn-registro"><a href="login.php">Registro</a></li>
           
         </ul>
         <ul class = "segundoul">
          <li class = "btn-detalles"><a href="" >Detalles</a></li>
        </ul>

          <div class = "img-div">
            <img class = "img-cuerpo"src="imgProyecto/imagenCuerpoFinal.png" alt="imgProyecto/Recurso 2.png" >
            
          </div>
        </div>
      </div>
    </div>
  </section>

  
    <div class = "contact-section">
      <div class = "contact-rigth">
        <ul class = "socialMedia-list">
          <li><img src="imgProyecto/FacebookLogo.png" alt=""></li>
          <li><img src="imgProyecto/TwiiterLogo.png" alt=""></li>
          <li><img src="imgProyecto/VueLogo.png" alt=""></li>
        </ul>
      </div>
    </div>
  
  <section class = "features-section">
    <div class = "features-container">
      <div class = "features-list-1">
        <h2 class = "title1">Compramos tu vehiculo</h2>
        <ul class = "features-list">
          
          <li><a>Te damos el mejor precio</a></li>
          <li><a>Pagamos en el acto</a></li>
          <li><a >Nos encargamos de todos los tramites</a></li>
          <li><a>Transferencia en el mismo día y sin coste  </a></li>
          <li><a >Aceptamos tu vehículo como forma de pago</a></li>
          
        </ul>

        <a class = "btn-tasacion">Ir a tasacion</a>

        <img class = "left-car"src="imgProyecto/highlight-1.png" alt="carro">
      </div>
      <hr class="dashed">
      <div class = "features-list-2">
        <h2 class = "title2">Si lo prefieres, gestionamos <br> la venta de tu vehículo
        </h2>
        <ul class = "features-list">
          <li><a >Nos encargamos de todos los tramites</a></li>
          <li><a>Reportaje fotográfico</a></li>
          <li><a >Publicación en los principales portales</a></li>

          
        </ul>
        <a class = "btn-compra">Ir a gestion de venta</a>

      </div>
      <img class = "rigth-car"src="imgProyecto/highlight-2.png" alt="carro">
      
    </div>
  </section>
  <div class ="title-text-section">

  <a>Descubre nuestros mejores</a><br>  <a>vehiculos a nuestro mejor precio...</a>
  </div>
   
  <div class = "flex-container">
               <ul class ="lista">
                 <?php
                 foreach($carros as $carro ){

                  
                 ?>
                   
                
                   <li>
           <div class="card" style="width: 18rem;">
  <img  src="imagenesSubidas/<?php echo $carro->imagen?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $carro->Marca."/".$carro->Modelo;?></h5>
    <h6 class="card-title"><?php echo $carro->Cilindraje."cc";?></h6>
    <h6 class="card-title"><?php echo "$".$carro->Precio;?></h6>
    <h6 class="card-title"><?php echo $carro->Matricula;?></h6>
    <a href="#" class="btn btn-primary">Ver publicaciones</a>
  </div>
</div>
        </li>
        
                   <?php
                 }
                   ?>
                   
               </ul>
          </div>
  <script>
   const mobile_btn = document.getElementById("menu")
       nav = document.querySelector("nav")
       btn_extit = document.getElementById("exit"); 
        
        mobile_btn.addEventListener("click",() =>{
            nav.classList.add("menu-btn")
        });

        btn_extit.addEventListener("click", () =>{
            nav.classList.remove("menu-btn");
        });
  </script>
  
</body>
</html>