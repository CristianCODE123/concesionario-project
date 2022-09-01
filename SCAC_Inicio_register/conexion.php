<?php 
$conexion = mysqli_connect('localhost', 'root', '','scac');

if($conexion){
    //echo "Funciono la Conexion";
} else {
    echo "Error en la Conexion" . mysqli_error($conexion);
}
?>