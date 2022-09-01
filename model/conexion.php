<?php
$username = "root";
$password = "a1b2c3d4";
$bd = "concesionario3";
try {
	$bd = new PDO (
		'mysql:host=localhost;dbname='.$bd,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
       
	);
    
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}

?>