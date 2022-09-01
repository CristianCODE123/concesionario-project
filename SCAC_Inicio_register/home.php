<?php session_start(); 
if(isset($_SESSION['activo']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <p><?php echo "bienvenido, ".$_SESSION['nombres']." ".$_SESSION['apellidos']." "; 
    echo "<a href='cerrarseSion.php'> (Cerrar Sesion)</a>";

if($_SESSION['tipoUsuario']==1)
{
    echo "<a href='actualizarEstudiante.php'>Actualizar Datos Cliente</a><br>";
    
    
}
else
{
    echo "<a href='actualizarProfesor.php'>Actualizar Datos Profesor</a>";
    echo "<a href='listarCursosProfe.php'>Listar Cursos Profesores</a>'";
}

    ?></p>
</body>
</html>
<?php 
}
else
{
    header("Location:index.php");
}  
?>