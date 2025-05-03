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
        echo "user not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login</h1>
    <div class="msg"></div>
    <form action="#" method="post" class="myForm">
        <p>
            <input type="email" name="email" id="email" placeholder="email" required>
        </p>
        <p>
            <input type="password" name="password" id="password" placeholder="password" required>
        </p>
        <p>
            <button type="submit" name="btn" class="btn">login</button>
        </p>
    </form>
    <!-- <script src="./js/index.js"></script> -->
</body>
</html>