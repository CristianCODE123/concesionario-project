<?php

if(empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtPassword"])){
    header('Location: login.php?mensaje=falta');
    exit();
}

include_once("model/conexion.php");
$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$correo = $_POST["txtCorreo"];
$direccion = $_POST["txtDireccion"];
$contraseña = $_POST["txtPassword"];


$busqueda = "select * from cliente where correo = '$correo'";
$stmt2 = $bd->prepare($busqueda, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt2->execute();
$count2 =  $stmt2->rowCount();  

if($count2 >= 1){
    
}else{
    $sentencia = $bd->prepare("INSERT INTO cliente(nombre,apellido,correo,direccion,password) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$correo,$direccion,$contraseña]);
}



if($resultado == TRUE){
    header('Location:login.php?mensaje = registrado');
}else{
    header('Location:login.php?mensaje = error');
    exit();
}
//ultima seccion 08/06
?>