<?php session_start(); //sirve para mantener abierta la sesion ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div id="formulario">
<div class="container">
  <div id="nombre">
  <h1>SCAC</h1>
</div>

  <form method="POST" action="index.php">
    <div class="form-group">
      <label for="email">Correo:</label>
      <input type="email" class="form-control" id="email" name='email' placeholder="Correo Electrónico" name="email" required>
    </div>
    <div class="form-group">
      <label for="clave">Contraseña:</label>
      <input type="password" class="form-control" id="clave" placeholder="Contraseña" name="clave" required>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Recuerdame
      </label>
    </div>
    Tipo Usuario: <select name="tipoUsuario"><br>
            <option value="1">cliente</option>
            <option value="2">vendedor</option>
        </select><br><br>
    <button type="submit" class="btn btn-primary" name="log">Ingresar</button>
    <br><br><br>
    <div>
        <p>¿Aun no tienes cuenta?</p>
        <a href="registro.php">Registrate</a>
    </div>
  </form>
</div>
</div>
<?php
if(isset($_REQUEST['log'])&&!empty($_REQUEST['email'])&&!empty($_REQUEST['clave']))
{
    $correo=$_REQUEST['email'];
    $clave=$_REQUEST['clave'];
    $tipoUsuario=$_REQUEST['tipoUsuario'];
    require("conexion.php");
  if($tipoUsuario==1)
  {
//consulta a la tabla estudiantes
$query="SELECT idCliente,Nombre,apellido FROM cliente WHERE correo='$correo' and contrasena='$clave'";
$resultado=mysqli_query($conexion,$query);
var_dump(mysqli_num_rows($resultado));
if(mysqli_num_rows($resultado)>0)  //num rows es la cantidad de registros que trae la consulta
{
   $row=mysqli_fetch_row($resultado);
   $_SESSION['email']=$correo;
   $_SESSION['tipoUsuario']=$tipoUsuario;
   $_SESSION['nombres']=$row[1];                 //mantener los datos guardados de la sesion
   $_SESSION['apellidos']=$row[2];
   $_SESSION['activo']=1;
   header("Location:home.php");
  // echo "Contenido variables de sesion ".$_SESSION['nombres']." ".$_SESSION['apellidos'];
}else{
    //no existe el registro
    echo "El usuario no existe";
}
  }else
  {
      //consulta a la tabla profesor
$query="SELECT idvendedor,nombre,apellidos FROM vendedor WHERE correo='$correo' and contrasena='$clave'";
$resultado=mysqli_query($conexion,$query);
if(mysqli_num_rows($resultado)>0)  //num rows es la cantidad de registros que trae la consulta
{
   $row=mysqli_fetch_row($resultado);
   $_SESSION['email']=$correo;
   $_SESSION['tipoUsuario']=$tipoUsuario;
   $_SESSION['nombres']=$row[1];                 //mantener los datos guardados de la sesion
   $_SESSION['apellidos']=$row[2];
   $_SESSION['activo']=1;
   header("Location:home.php");
  // echo "Contenido variables de sesion ".$_SESSION['nombres']." ".$_SESSION['apellidos'];
}else{
    //no existe el registro
    echo "El usuario no existe";
}
  }
  }
?>
</body>
</html>