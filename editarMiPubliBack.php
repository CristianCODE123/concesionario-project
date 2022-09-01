<?php
session_start();
 if(!isset($_SESSION["documento"])){
    header('Location: editarMiPubli.php?mensaje=error');
}
include 'model/conexion.php';
$codigo = $_SESSION["documento"];
$marca = $_POST["txtMarca"];
$modelo = $_POST["txtModelo"];
$cilindraje = $_POST["txtCilindraje"];
$precio = $_POST["txtPrecio"];
$matricula = $_POST["txtMatricula"];
$km = $_POST["txtKm"];
$descripcion = $_POST["txtDes"];

$countfiles = count($_FILES['files']['name']);
    $sentencia = $bd->prepare("UPDATE catalogo SET  marca = ?, modelo = ?,cilindraje=?,precio=?,matricula=?,km = ? where idCatalogo = ?;");
    $resultado = $sentencia->execute([$marca, $modelo,$cilindraje,$precio,$matricula,$km,$codigo]);

    if($resultado = true){
        $sentencia2 = $bd->prepare("UPDATE opciones_adicionales set imagen = ?, descripcion = ? where idCatalogo = ?;");
        

        
    // Loop all files
    for($i = 0; $i < $countfiles; $i++) {
  
        // File name
        $filename = $_FILES['files']['name'][$i];
      
        // Location
        $target_file = './imagenesSubidas/'.$filename;
      
        // file extension
        $file_extension = pathinfo(
            $target_file, PATHINFO_EXTENSION);
             
        $file_extension = strtolower($file_extension);
      
        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");
      
        if(in_array($file_extension, $valid_extension)) {
  
            // Upload file
            if(move_uploaded_file(
                $_FILES['files']['tmp_name'][$i],
                $target_file)
            ) {
                
                // Execute query
                $resultado3 = $sentencia2->execute([$filename,$descripcion,$codigo]);
                header("location: editarMipubli.php?mensaje = editado");
            }
        }
    }
    }else{
        header("location: editarMipubli.php?mensaje = noeditado");
    }



?>