<?php
include("cabecera.php");

if(!isset($_SESSION["idCliente"])){
    header("location: configurarCuenta.php?mensaje=noExiste");
    exit();
}


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$dni = $_POST["dni"];
$telefono = $_POST["telefono"];
$direccion = $_POST["Direccion"];
$contraseña = $_POST["password"];


include_once("model/conexion.php");
$codigo = $_SESSION["idCliente"];
$sentencia =$bd->prepare("UPDATE cliente set nombre = ?,apellido =?,correo=?,dni=?,telefono=?,direccion=?,password= ? where idCliente = ?");
$resultado = $sentencia->execute([$nombre,$apellido,$correo,$dni,$telefono,$direccion,$contraseña,$codigo]);

if($resultado == true){
    header("location:configurarCuenta.php?mensaje=EditadoCorrectamente");
}else{
    header("location:configurarCuenta.php?mensaje=noEditado");
}
?>