<?php require("cabecera.php")?>
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
   <form class="row g-3" style = "margin-left:45em; margin-top:7em;" action = "registrarBack.php" method = "post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Marca</label>
    <input type="text" class="form-control" id="inputEmail4" name = "txtMarca">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Modelo</label>
    <input type="text" class="form-control" id="inputPassword4" name = "txtModelo">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">cilindraje</label>
    <input type="text" class="form-control" id="inputAddress" name = "txtCilindraje">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Precio</label>
    <input type="text" class="form-control" id="inputAddress2" name = "txtPrecio">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Matricula</label>
    <input type="text" class="form-control" id="inputCity" name = "txtMatricula">
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">km</label>
    <input type="text" class="form-control" id="inputZip" name = "txtKm">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" type="file" id="formFile" name = "files[]">
</div>
  
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name = "submit">Registrar auto</button>
  </div>
</form>
   </div>


</body>
</html>