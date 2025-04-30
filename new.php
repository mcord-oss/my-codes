<?php

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['btn'])){

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $image = $_FILES['upload']['name'];
    $temp_file = $_FILES['upload']['tmp_name'];
    $folder = 'images/'.$image;

    $sql = "INSERT INTO `employees`(`id`,`first_name`,`last_name`,`email`,`gender`,`img`)VALUES('$id','$fname','$lname','$email','$gender','$image')";
    $con->query($sql) or die ($con->error);

    if(move_uploaded_file($temp_file, $folder)){
        echo header("location: index.php");
    }else{
        echo "no upload files";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <form enctype="multipart/form-data" action="#" method="post" class="form-group m-5 p-5 w-50 m-auto">
    <h3 style="text-align: center;">New Information</h3>
        <p>
            <input style="text-align: center;" type="text" name="id" id="id" placeholder="id #" required class="form-control btn-lg m-3 p-3">
        </p>
        <p>
            <input style="text-align: center;" type="text" name="fname" id="fname" placeholder="type first name" required class="form-control btn-lg m-3 p-3">
        </p>
        <p>
            <input style="text-align: center;" type="text" name="lname" id="lname" placeholder="type last name" required class="form-control btn-lg m-3 p-3">
        </p>
        <p>
            <input style="text-align: center;" type="email" name="email" id="email" placeholder="type email" required class="form-control btn-lg m-3 p-3">
        </p>
        <p>
            <select style="text-align: center;" name="gender" id="gender" class="form-control form-control-lg m-4">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </p>
        <p>
                <input type="file" name="upload" id="upload">
        </p>
        <p>
            <button type="submit" name="btn" class="btn-lg btn-secondary btn-block btn-hover">Add New</button>
        </p>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>