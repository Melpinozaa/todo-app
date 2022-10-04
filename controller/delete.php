<?php 

include_once 'C:/xampp/htdocs/toDoList/model/db.php';


$taskcode = $_GET['identifier'];

$querydelete = $bd->prepare("DELETE from todolist where id = ?");
$answerd = $querydelete->execute([$taskcode]);


if($answerd){
    header('location: ../index.php? ');
}else{
    echo "Error";
}


?>

//ALTER TABLE calltracker AUTO_INCREMENT = 0;
