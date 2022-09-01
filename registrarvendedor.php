<?php include_once("cabecera.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet" href="registro.css" type="text/css">
    <title>registrar vendedor SCAC</title>
    <link rel="stylesheet" href="cssRegistroV/css.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    
<div class = "register-form" style = "width:400px;">
<form class="row g-3" method="POST" action="registrarvendedor.php">
  
  <div class="col-6">
    <label for="inputAddress" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="inputAddress" placeholder="Digite su nombre">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Apellidos</label>
    <input type="text" class="form-control" name="inputAddress2" placeholder="Digite sus apellidos">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Correo</label>
    <input type="email" class="form-control" name="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputDni" class="form-label">DNI</label>
    <input type="text" class="form-control" name="inputDni">
  </div>
  <div class="col-md-6">
    <label for="inputTel" class="form-label">Telefono</label>
    <input type="text" class="form-control" name="inputTel">
  </div>
  <div class="col-md-6">
    <label for="inputDir" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="inputDir">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="inputPassword4">
  </div>
  <div class="col-md-6">
    <label for="inputfec" class="form-label">Fecha de Nacimiento</label>
    <input type="date" class="form-control" name="inputfec">
  </div>

  <div class="col-md-6" style = "margin-top:7em; margin-left:-3em">
  <button type="submit" class="btn btn-primary" name="log">registrar</button>
  </div>
  
</form>
</div>

        
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<br><br><br>

</div>
</form>

<?php
if(isset($_REQUEST['log'])){
    $nombre = $_REQUEST['inputAddress'];
    $apellidos = $_REQUEST['inputAddress2'];
    $correo = $_REQUEST['inputEmail4'];
    $dni = $_REQUEST['inputDni'];
    $telefono = $_REQUEST['inputTel'];
    $direccion = $_REQUEST['inputDir'];
    $contrasena = $_REQUEST['inputPassword4'];
    $fechaNa = $_REQUEST['inputfec'];

    if(empty($_POST["inputAddress"]) || empty($_POST["inputAddress2"]) 
    || empty($_POST["inputEmail4"]) || empty($_POST["inputDni"]) 
    || empty($_POST["inputTel"]) || empty($_POST["inputDir"])
    || empty($_POST["inputPassword4"]) || empty($_POST["inputfec"])){
      echo '<script>alert("Faltan datos");</script>';
      exit();
  }
require("model/conexion.php");

$busqueda = "select * from cliente where correo = '$correo'";
$stmt2 = $bd->prepare($busqueda, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt2->execute();
$count2 =  $stmt2->rowCount();  

if($count2>=1){
  echo '<script>alert("Correo ya usado, use otro");</script>';
}else{
  $query = $bd->prepare("INSERT INTO cliente (Nombre, apellido, correo, dni, telefono, Direccion, password, fecha_nacimiento) VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $query->execute([$nombre,$apellidos,$correo,$dni,$telefono,$direccion,$contrasena,$fechaNa]);

    $id = $bd->lastInsertId();



    $consulta2 = $bd->query("insert into vendedor (idCliente) values ($id)");
    
    if($resultado == true)
    {
      echo '<script>window.confirm("Cuenta registrada correctamente");</script>';
    }
    else{
      header("location: registrarvendedor.php?mensaje = NoRegistrado");
    }
}
    
    
}
?>

</body>
</html>