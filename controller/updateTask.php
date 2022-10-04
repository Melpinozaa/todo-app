<?php

include_once '../model/db.php';

$identifier = $_POST['identifier'];
$title = $_POST["task"];
$expec = $_POST["eTime"];


if (empty($title) || empty($expec)) {
    header("location: ../view/item/edit.php"); 
    $_SESSION['failed'] = 'FAILED, pls fill all the fields';
    $_SESSIOn['message_type'] = 'failed';
} else {

    $query = $bd->prepare("UPDATE todolist SET title=?, expec=? where id=?");
    $answer=$query->execute([$title, $expec, $identifier]);

    if ($answer) {
        header("location: ../index.php");

        $_SESSION['success'] = 'Task added';
        $_SESSIOn['message_type'] = 'success';
    }
}
