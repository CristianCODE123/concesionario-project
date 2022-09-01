<?php 
session_start();
    if(!isset($_SESSION["documento"])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET["documento"];

    $sentencia2 = $bd->prepare("DELETE FROM opciones_adicionales where idCatalogo = ?;");
    $resultado2 = $sentencia2->execute([$codigo]);

    $sentencia3 = $bd->prepare("DELETE FROM vendedor_catalogo where idCatalogo = ?;");
    $resultado3 = $sentencia3->execute([$codigo]);

    $sentencia = $bd->prepare("DELETE FROM catalogo where idCatalogo = ?;");
    $resultado = $sentencia->execute([$codigo]);



    if ($resultado === TRUE) {
        header('Location: verPublicaciones.php?mensaje=eliminado');
    } else {
        header('Location: verPublicaciones.php?mensaje=error');
    }
    
?>