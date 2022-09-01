<?php include("cabecera.php");?>
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
    
</body>
</html>
<?php
if(!isset($_SESSION["documento"])){
    header("location: verPublicaciones.php?mensaje=NoExisteArticulo ");
    exit();
}

include_once("model/conexion.php");
$codigo = $_GET["documento"];
$sentencia = $bd->prepare("select catalogo.idCatalogo,Marca,km,Modelo,Cilindraje,Precio,Matricula,imagen,Descripcion,opciones_adicionales.idCatalogo,nombre2 
from catalogo
inner join opciones_adicionales 
on catalogo.idCatalogo = opciones_adicionales.idCatalogo
where catalogo.idcatalogo = ?
");

$sentencia->execute([$codigo]);
$vehiculo = $sentencia->fetch(PDO::FETCH_OBJ);
print_r($vehiculo);
?>

<form class="row g-3" style = "margin-left:45em; margin-top:7em;" action = "editarMiPubliBack.php" method = "post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Marca</label>
    <input type="text" class="form-control" id="inputEmail4" name = "txtMarca" value = "<?php echo $vehiculo->Marca?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Modelo</label>
    <input type="text" class="form-control" id="inputPassword4" name = "txtModelo" value = "<?php echo $vehiculo->Modelo?>">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">cilindraje</label>
    <input type="text" class="form-control" id="inputAddress" name = "txtCilindraje" value = "<?php echo $vehiculo->Cilindraje?>">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Precio</label>
    <input type="text" class="form-control" id="inputAddress2" name = "txtPrecio" value = "<?php echo $vehiculo->Precio?>">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Matricula</label>
    <input type="text" class="form-control" id="inputCity" name = "txtMatricula" value = "<?php echo $vehiculo->Matricula?>">
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">km</label>
    <input type="text" class="form-control" id="inputZip" name = "txtKm" value = "<?php echo $vehiculo->km?>">
  </div>

  <div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-lg">descripcion</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name = "txtDes" value = "<?php echo $vehiculo->Descripcion?>">
</div>

 
  
  <div class="mb-3">
  <label for="formFile" class="form-label">Nueva imagen</label>
  <input class="form-control" type="file" id="formFile" name = "files[]">
</div>
  
  <div class="col-12">
    
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name = "submit">Editar auto</button>
  </div>
</form>