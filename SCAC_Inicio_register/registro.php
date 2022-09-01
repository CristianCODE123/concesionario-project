<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet" href="registro.css" type="text/css">
    <title>registro SCAC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body background="SCAC2.jpg">
    

<form method="POST" action="registro.php">

<div id="contenedor"> 

    <h2 class="formulario" style="color:rgb(255, 255, 255)" >SCAC REGISTRO CLIENTE </h2>

    <br><br>

    <label for="nombres">Nombres</label>
        <input type="text" name="nombres" required><br><br>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" required><br><br>

        <label for="correo">Correo</label>
        <input type="text" name="correo" required><br><br>

        <label for="dni">DNI</label>
        <input type="text" name="dni" required><br><br>

        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" required><br><br>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" required><br><br>

        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" required><br><br>

        <label for="fechaNa">Fecha nacimiento</label>
        <input type="date" name="fechaNa" ><br><br>
        
 
<br><br>

<button type="submit" class="btn btn-primary" name="log">registrar</button>

</div>
</form>
<?php
        if(isset($_REQUEST['log'])&&!empty('idCliente')){
            $nombres = $_REQUEST['nombres'];
            $apellidos = $_REQUEST['apellidos'];
            $correo = $_REQUEST['correo'];
            $dni = $_REQUEST['dni'];
            $telefono = $_REQUEST['telefono'];
            $direccion = $_REQUEST['direccion'];
            $contrasena = $_REQUEST['contrasena'];
            $fechaNa = $_REQUEST['fechaNa'];





            require("conexion.php");
            $query = "INSERT INTO cliente (Nombre, apellido, correo, dni, telefono, Direccion, contrasena, fecha_nacimiento) VALUES ('$nombres','$apellidos','$correo', '$dni',
            '$telefono', '$direccion', '$contrasena', '$fechaNa')";
            $consulta = mysqli_query($conexion,$query);
            if($consulta)
            {
                echo "Funcionó la consulta";
            }
            else{
                echo "Error en la consulta".mysqli_error($conexion);
            }
            
        }
    ?>





</body>
</html>