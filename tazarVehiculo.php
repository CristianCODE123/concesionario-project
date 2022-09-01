<?php require("cabecera.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registrarAuto.css">
    <title>Document</title>
</head>
<body>
   <div class ="form-container">
   <form class="row g-3" style = "margin-left:45em; margin-top:7em;" action = "tazarVehiculo.php" method = "post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Marca</label>
    <input type="text" class="form-control" id="inputEmail4" name = "txtMarca">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Modelo</label>
    <input type="text" class="form-control" id="inputPassword4" name = "txtModelo">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Matricula</label>
    <input type="text" class="form-control" id="inputAddress" name = "txtMatricula">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Precio</label>
    <input type="text" class="form-control" id="inputAddress2" name = "txtPrecio">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">fecha</label>
    <input type="date" class="form-control" id="inputCity" name = "fecha">
  </div>

 

  <div class="col-12">
    <button type="submit" class="btn btn-primary" name = "submit">tazar auto</button>
  </div>
</form>
   </div>


</body>
</html>

<?php

if(isset($_POST["submit"])){
  if(empty($_POST["txtMarca"]) || empty($_POST["txtModelo"]) || empty($_POST["txtMatricula"])
  || empty($_POST["txtPrecio"]) || empty($_POST["fecha"]) ){
     header('Location: tazarVehiculo.php?mensaje=falta');
     exit();
  }

  $_SESSION["marca"] = $_POST["txtMarca"];
  $_SESSION["modelo"] = $_POST["txtModelo"];
  $_SESSION["matricula"] = $_POST["txtMatricula"];
  $_SESSION["precio"] = $_POST["txtPrecio"];
  $_SESSION["fecha"] = $_POST["fecha"];
  
  echo "<script>window.history.go(-2)</script>";



}

?>