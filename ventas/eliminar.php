<?php session_start(); 

?><!--  sirve para mantener abierta la sesion -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="eliminar.css">
    <title>Actualizar Estudiante</title>
</head>
<body>
    <?php
            if(isset($_GET['idVentas'])){
            $idVentas = $_GET['idVentas'];
            require("conexion.php");
            $query = "SELECT * FROM ventas";
            $consulta = mysqli_query($conexion,$query);
            if($consulta)
            {
                if(mysqli_num_rows($consulta)>0){
                    $rowUsuario = mysqli_fetch_row($consulta);  
                    ?>
                    <div id="datos">
                    <form method="POST" action="eliminar.php">
                    
                    <label for="idventa">N° Venta</label>
                    <input type="text" name="idventa" value='<?php echo $rowUsuario[0]?>' required><br><br>
            
                    <label for="cliente">Cliente</label>
                    <input type="text" name="cliente" value='<?php echo $rowUsuario[1]?>' required><br><br>
     
                    <label for="catalogo" class="form-label">Example textarea</label>
                    <input type="text" name="catalogo" value='<?php echo $rowUsuario[2]?>' required><br><br>
     
                    <label for="vehiculo">Vehiculo</label>
                    <input type="text" name="vehiculo" value='<?php echo $rowUsuario[3]?>' required><br><br>
     
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" value='<?php echo $rowUsuario[4]?>' required><br><br>
     
                    <label for="idvendedor">Vendedor</label>
                    <input type="text" name="idvendedor" value='<?php echo $rowUsuario[5]?>' required><br><br>
                    
                    <!-- <input type="submit" name="btneliminar" value="Eliminar"><br> -->
                    <button type="submit" class="btn btn-warning" name="btneliminar">Eliminar</button>
                    
                </form>
                </div>

                <?php
                }else{
                    echo "El usuario no existe";
                }

            }else{
                echo "Error en la consulta".mysqli_error($conexion);
            }
            }
        if(isset($_REQUEST['btneliminar'])){
            //var_dump($_REQUEST['codigo']);
            require("conexion.php");
            $idVentas = $_REQUEST['idventa'];
            $idCliente = $_REQUEST['cliente'];
            $idVehiculo = $_REQUEST['vehiculo'];
            $Precio = $_REQUEST['precio'];
            $idvendedor = $_REQUEST['idvendedor'];  
            
            $query="DELETE FROM ventas WHERE idVentas='$idVentas'";
            $consulta = mysqli_query($conexion,$query);
            if($consulta){
                echo "La actualización funcionó correctamente";
                header("Location:interfaz.php");
            }
            else{
                echo "Error en la consulta".mysqli_error($conexion);
            }
        }
    ?>
</body>
</html>