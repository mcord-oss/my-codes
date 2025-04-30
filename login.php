<?php

    if(!isset($_SESSION)){
        session_start();
    }

    include_once("connections/connection.php");
    $con = connection();

    if(isset($_POST['btn'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `list` WHERE `email` = '$email' AND `password` = '$password'";
        $stmt = $con->query($sql) or die ($con->error);
        $row = $stmt->fetch_assoc();
        $total = $stmt->num_rows;

        if($total > 0){

            $_SESSION['userlogin'] = $row['email'];
            $_SESSION['access'] = $row['access'];
            echo header("location: index.php");
        }else{
            echo "no user found!";
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
<body><br><br><br><br>
    <form action="#" method="post" class="form-group w-50 m-auto">
    <h3>Please Complete Details</h3>
        <p>
            <input type="email" name="email" id="email" placeholder="type email" required class="form-control form-control-lg" style="text-align: center;">
        </p>
        <p>
            <input type="password" name="password" id="password" placeholder="password" required class="form-control form-control-lg" style="text-align: center;">
        </p>
        <p>
            <button type="submit" name="btn" class="btn-secondary btn-lg btn-block">Login</button>
        </p>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>