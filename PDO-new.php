<?php

include_once("connections/connection.php");
$con = connection();

    if(isset($_POST['btn'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO `employees`(`first_name`,`last_name`,`email`,`gender`)VALUES('$fname','$lname','$email','$gender')";
        $con->query($sql) or die ($con->error);
        echo header("location: index.php");
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
    <h1>add new user</h1>
    <form action="#" method="post">
        <p>
            <input type="text" name="fname" id="fname" placeholder="first name" required>
        </p>
        <p>
            <input type="text" name="lname" id="lname" placeholder="last name" required>
        </p>
        <p>
            <input type="email" name="email" id="email" placeholder="email" required>
        </p>
        <p>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </p>
        <p>
            <button type="submit" name="btn">Add</button>
        </p>
    </form>
</body>
</html>