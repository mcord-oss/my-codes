<?php

    include_once("connections/connection.php");
    $con = connection();

    if(isset($_POST['btn'])){
        
        $fname = $_POST['fname'];
        $images = $_FILES['upload']['name'];
        $temp_file = $_FILES['upload']['tmp_name'];
        $folder = 'images/'.$images;

        $sql = "INSERT INTO `employees`(`first_name`, `img`)VALUES('$fname', '$images')";
        $con->query($sql) or die ($con->error);

        if(move_uploaded_file($temp_file, $folder)){
            echo header("location: upload-index.php");
        }else{
            echo "Error!!";
        }
    }

?>