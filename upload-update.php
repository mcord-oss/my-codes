<?php

    include_once("connections/connection.php");
    $con = connection();


    if(isset($_POST['btn'])){

        $id = $_POST['id'];
        $file = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $folder = 'images/'.$file;

        $sql = "UPDATE `employees` SET `img` = '$file' WHERE `id` = '$id'";
        $con->query($sql) or die ($con->error);

        if(move_uploaded_file($temp, $folder)){

            echo header("location: upload-index.php");
        }else{
            
            echo "error upload";

        }
    }

?>