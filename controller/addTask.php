<?php
include_once 'C:/xampp/htdocs/toDoList/model/db.php';
//print_r($_POST);

$title = $_POST["task"];
$expec = $_POST["eTime"];


if (empty($title) || empty($expec)) {
    header("location: ../index.php");
    $_SESSION['failed'] = 'FAILED, pls fill all the fields';
    $_SESSIOn['message_type'] = 'failed';
}else{
    $queryadd = $bd->prepare("INSERT INTO todolist(title,expec) VALUES(?,?)");
    $result = $queryadd->execute([$title, $expec]);

    if ($result) {
        header("location: ../index.php");
     
        $_SESSION['success'] = 'Task added';
        $_SESSIOn['message_type'] = 'success';
    }
    
}


