<?php
session_start();
require_once("model/conexion.php");
$marca = $_POST["txtMarca"];
$modelo = $_POST["txtModelo"];
$cilindraje = $_POST["txtCilindraje"];
$precio = $_POST["txtPrecio"];
$matricula = $_POST["txtMatricula"];
$km = $_POST["txtKm"];

if(isset($_POST['submit'])) {
  
    // Count total files
    $countfiles = count($_FILES['files']['name']);
   
    // Prepared statement
    
$sentencia = $bd->prepare("INSERT into catalogo(marca,modelo,cilindraje,precio,matricula,km) values (?,?,?,?,?,?)"); 
$resultado = $sentencia->execute([$marca,$modelo,$cilindraje,$precio,$matricula,$km]);


if($resultado == true){
    echo '<script>window.confirm("Cuenta registrada correctamente");</script>';
    $sentencia2 = $bd->query("SELECT * from catalogo where marca = '$marca' and modelo = '$modelo' and cilindraje = '$cilindraje' and precio = '$precio' and matricula = '$matricula';");  
    $id = $sentencia2 ->fetchAll(PDO::FETCH_OBJ);
    $cod = $id[0]->idCatalogo;
    
    $sentencia3 = $bd->prepare("insert into opciones_adicionales (imagen,descripcion,idCatalogo,nombre2) values (?,?,?,?)");

    $sentencia4 = $bd->prepare("insert into vendedor_catalogo (idvendedor,idCatalogo) values (?,?); ");
    $resultado4 = $sentencia4->execute([$_SESSION["idCliente"],$cod]);
    
   
    
  
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
                $resultado3 = $sentencia3->execute([$filename,$precio,$cod,1]);
                
            }
        }
    }
     
    echo "File upload successfully";
}



echo '<script>window.confirm("Cuenta registrada correctamente");</script>';
header('Location:registrarAuto.php?mensaje=registrado');

}
?>