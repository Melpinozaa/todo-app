<?php


session_start();

$contrasena="";
$usuario="root";
$nombre_bd="crud1";



try { 
    
    $bd= new PDO(
        'mysql:host=localhost;
        dbname='.$nombre_bd,
        $usuario,
        $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8")
    );
    
} catch (Exception $e){
    echo "Connection doesn't work: ".$e->getMessage();
}




?>