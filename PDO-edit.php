<?php

include_once("connections/connection.php");
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM `employees`";
$stmt = $con->query($sql) or die ($con->error);
$row = $stmt->fetch_assoc();

    if(isset($_POST['btn'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = "UPDATE `employees` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `gender` = '$gender' WHERE `id` = '$id'";
        $row = $con->query($sql) or die ($con->error);
        echo header("location: details.php?id=".$id);
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
    <a href="details.php">view</a>
    <form action="#" method="post">
        <p>
            <input type="text" name="fname" id="fname" placeholder="first name" required value="<?php echo $row['first_name'];?>">
        </p>
        <p>
            <input type="text" name="lname" id="lname" placeholder="last name" required value="<?php echo $row['last_name'];?>">
        </p>
        <p>
            <input type="email" name="email" id="email" placeholder="email" required value="<?php echo $row['email'];?>">
        </p>
        <p>
            <select name="gender" id="gender">
                <option value="Male" <?php echo $row['gender'] = "Male"? 'Selected': ''?>>Male</option>
                <option value="Female" <?php echo $row['gender'] = "Female"? 'Selected': ''?>>Female</option>
            </select>
        </p>
        <p>
            <button type="submit" name="btn">update</button>
        </p>
    </form>
</body>
</html>