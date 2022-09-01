

<?php


if(empty($_POST["txtCorreoLogin"]) || empty($_POST["txtContraseñaLogin"])){
    header('Location: login.php?mensaje=FaltanDatos');
}

require_once("model/conexion.php");

if(isset($_POST['submit'])){
    $correo = $_POST["txtCorreoLogin"];
    $contraseña = $_POST["txtContraseñaLogin"];

    

    $sentencia = "select * from cliente where correo = '$correo' and password = '$contraseña'";
    $stmt = $bd->prepare($sentencia, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    $count =  $stmt->rowCount();  
    $datos = $stmt->fetchAll(PDO::FETCH_OBJ);

    $sentence = $bd->query("select * from cliente where correo = '$correo' and password = '$contraseña'");
    $datos2 = $sentence->fetch(PDO::FETCH_OBJ);

   
 

    

    
    

    if($count >=1){
        $idCliente = $datos2->idCliente;
        session_start();

        echo $idCliente;
    
        $admin = $bd->query("select cliente.idCliente,nombre,correo,admin.idadmin,admin.idcliente from cliente
        inner join admin
        on cliente.idCliente = admin.idCliente
        where correo = '$correo' and password  = '$contraseña'");
        $resultado = $admin->fetchAll(PDO::FETCH_OBJ);
        
        $sentencia2 = "select cliente.idCliente,nombre,correo,admin.idadmin,admin.idcliente from cliente
        inner join admin
        on cliente.idCliente = admin.idCliente
        where correo = '$correo' and password  = '$contraseña'";
        $stmt2 = $bd->prepare($sentencia, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt2->execute();
        $count2 =  $stmt->rowCount();  
        
        

       
        $_SESSION["correo"]=$correo;
        $_SESSION["contraseña"]=$contraseña;
        $_SESSION["idCliente"]=$idCliente;
       
        $idCliente = $_SESSION["idCliente"];
       
        $sentencia = "select admin.idadmin, cliente.idCliente from cliente
        inner join admin
        on cliente.idcliente = admin.idcliente 
        where admin.idCliente = '$idCliente'";

        $stmt = $bd->prepare($sentencia, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        $count3 =  $stmt->rowCount();  
        $_SESSION["cont"] = $count3;

        $sentencia5 = "select cliente.idCliente,nombre,correo,vendedor.id_tipoUsuario,vendedor.idcliente from cliente
        inner join vendedor
        on cliente.idCliente = vendedor.idCliente
        where cliente.idCliente = '$idCliente'";
        $result  = $bd->prepare($sentencia5, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $result->execute();
        $count4 = $result->rowCount();
        $_SESSION["countVendedor"] = $count4;

 header('Location: login.php?mensaje=iniciado'.$idCliente.$count4);
        
        

    }else{
        header("location:login.php?mensaje=noIniciado");
    }

   

}






?>