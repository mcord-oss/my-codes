<?php

    include_once("connections/connection.php");
    $con = connection();

    if(isset($_POST['btn'])){

        $id = $_POST['del'];

        $sql = "DELETE FROM `employees` WHERE `id` = '$id'";
        $stmt = $con->query($sql) or die ($con->error);
        echo header("location: index.php");
    }

?>