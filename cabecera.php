<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cabecera.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class  ="cuerpo">
<div class = "navbar" style = "position:relative">
        <div class = "container"> 
            <a href="index.php" class = "logo" id = "logo">AutoCar<span>Service</span></a>
            <img class = "menu" id = "menu" src="imgProyecto/recurso 1.png"  alt="">
          
          <nav class = "principal-nav">
          
            <ul class = "primary-nav" id = "primary-nav">
              <li id = "verPubli"></li>
              <li id = "ventas"></li>
              <li id = "registrar"></li>
              <li class = "inicio"><a href="index.php">Inicio</a></li>
              <li><a href="">Sobre nosotros</a></li>
              <li><a href="catalogo.php">Catalogo</a></li>
              <li><a href="vendedores.php">Vendedores</a></li>
              <li><a href="login.php">Iniciar Sesion</a></li>
              
            </ul>
        
          </nav>
    
        </div>
      </div>
      <?php
      
      
     if(isset($_SESSION["correo"]) && isset($_SESSION['contraseña'])){
      
 


      ?>
      <script src = "interfazUsuario.js"></script>
      
     

      <?php
    if($_SESSION["cont"]>=1){
      
      
    
     



      ?>
      <script src = "Registrarvendedor.js"></script>
      <?php }else if($_SESSION["countVendedor"]>=1){
           ?>
       <script src = "publicarVehiculo.js"></script>
    
  <?php
   
  }
    
}?>
 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script>
       
      </script>
    </body>
</html>