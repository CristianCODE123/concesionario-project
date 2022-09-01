<?php
if(!isset($_GET["documento"])){
    header("location:catalogo.php?mensaje=Comprado");
    exit();
}
session_start();
require("model/conexion.php");
if(!isset($_SESSION["marca"])){

    $idCliente = $_SESSION["idCliente"];
    $idCatalogo =$_SESSION["doc"];
    
   
    $sentenciaVendedor = $bd->prepare("select * from vendedor_catalogo  where idCatalogo = ? ");
    $sentenciaVendedor->execute([$idCatalogo]);
    $vendedor = $sentenciaVendedor->fetch(PDO::FETCH_OBJ);
    
    $idvendedor = $vendedor->idvendedor;
    $mysqltime = date('Y-m-d H:i:s');
    $sentencia = $bd->prepare("insert into ventas(idCliente,idCatalogo,idVendedor,fecha) 
                              values (?,?,?,?);");
    $sentencia->execute([$idCliente,$idCatalogo,$idvendedor,$mysqltime]); 
    
    if($sentencia = true){
        header("location: catalogo.php?mensaje=comprado");
    
    }else{
        header("location: catalogo.php?mensaje=NoComprado");
    
    }

}else{

$sentenciaTaza = $bd->prepare("insert into vehiculo_usado_venta
(marca,modelo,matricula,precio_tasacion,fecha_Sesion,id_cliente)
values
(?,?,?,?,?,?);");

$sentenciaTaza->execute([$_SESSION["marca"],$_SESSION["modelo"],$_SESSION["matricula"],$_SESSION["precio"],$_SESSION["fecha"],$_SESSION["idCliente"]]);

$idCliente = $_SESSION["idCliente"];
$idCatalogo = $_GET["documento"];



$sentenciaVendedor = $bd->prepare("select * from vendedor_catalogo  where idCatalogo = ? ");
$sentenciaVendedor->execute([$idCatalogo]);
$vendedor = $sentenciaVendedor->fetch(PDO::FETCH_OBJ);

$idvendedor = $vendedor->idvendedor;

$mysqltime = date('Y-m-d H:i:s');

$sentencia = $bd->prepare("insert into ventas(idCliente,idCatalogo,idVendedor,fecha) 
                          values (?,?,?,?);");
$sentencia->execute([$idCliente,$idCatalogo,$idvendedor,$mysqltime]); 

if($sentencia = true){
    header("location: catalogo.php?mensaje=comprado");

}else{
    header("location: catalogo.php?mensaje=NoComprado");

}
}

?>