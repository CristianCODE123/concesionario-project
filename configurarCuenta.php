<?php
include_once("cabecera.php");
include("model/conexion.php");
$id = $_SESSION["idCliente"];
$sentencia = $bd->prepare("select * from cliente where idCliente = ?");
$sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
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
    <div class ="form-container" style = "margin-left:-3em">

    <form class="row g-3" style = "margin-left:45em; margin-top:7em;" action = "configurarCuentaBack.php" method = "post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nombre</label>
    <input readonly type="text" class="form-control" id="inputNombre" name = "nombre" value = <?php echo $persona->Nombre?>>
    <label for="inputNombre" class = "form-label1" id ="nombre"><a href="">Editar</a> </label>
</div>
  <div class="col-md-6">
    <label for="inputApellido" class="form-label">Apellido</label>
    <input readonly type="text" class="form-control" id="inputApellido" name = "apellido" value = <?php echo $persona->apellido?>>
    <label for="inputApellido" class = "form-label2" id ="apellido"><a href="">Editar</a> </label>
</div>
  <div class="col-12">
    <label for="inputCorreo" class="form-label">Correo</label>
    <input readonly type="text" class="form-control" id="inputCorreo" name = "correo" value = <?php echo $persona->correo?>>
    <label for="inputCorreo" class = "form-label3" id="correo"><a href="">Editar</a> </label>  
</div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Dni</label>
    <input readonly type="text" class="form-control" id="inputDni" name = "dni" value = <?php echo $persona->dni?>>
    <label for="inputAddress2" class = "form-label4" id= "dni"><a href="">Editar</a> </label>
</div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Telefono</label>
    <input readonly type="text" class="form-control" id="inputTelefono" name = "telefono" value = <?php echo $persona->telefono?>>
    <label for="inputCity" class = "form-label5" id ="telefono"><a href="">Editar</a> </label>
</div>
  <div class="col-md-6">
    <label for="inputZip" class="form-label">Direccion</label>
    <input readonly type="text" class="form-control" id="inputDireccion" name = "Direccion" value = <?php echo $persona->Direccion?>>
    <label for="inputZip" class = "form-label6" id ="direccion"><a href="">Editar</a> </label>
</div>
  
<div class="col-md-6">
    <label for="inputZip" class="form-label">Contraseña</label>
    <input readonly type="text" class="form-control" id="inputPassword" name = "password" value = <?php echo $persona->password?>>
    <label for="inputZip" class = "form-label6" id ="password"><a href="">Editar</a> </label>
</div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name = "submit">Confirmar</button>
  </div>
</form>
    </div>
<script src = "añadidos/desbloquear.js"></script>
</body>
</html>