<?php
    $conexion = mysqli_connect('localhost','root','a1b2c3d4','concesionario3');
    if($conexion){
    }
    else{
        echo "Error en la conexión".mysqli_error($conexion);
    }
?>