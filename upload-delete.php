<?php

    include_once("connections/connection.php");
    $con = connection();

    $id = $_GET['id'];

    $sql = "SELECT * FROM `employees` WHERE `id` = '$id'";
    $stmt = $con->query($sql) or die ($con->error);
    $row = $stmt->fetch_assoc();

    if(isset($_POST['btn'])){

        $id = $_POST['id'];

        $sql = "DELETE FROM `employees` WHERE `id` = '$id'";
        $con->query($sql) or die ($con->error);
        echo header("location: upload-index.php");
    }

?>