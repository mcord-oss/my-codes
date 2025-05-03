<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['access']) && $_SESSION['access'] == "administrator"){
        echo "WELCOME ".$_SESSION['userlogin'];
    }else{
        echo header("location: index.php");
    }

    include_once("connections/connection.php");
    $con = connection();

    $id = $_GET['id'];

    $sql = "SELECT * FROM `employees` WHERE `id` = '$id'";
    $stmt = $con->query($sql) or die ($con->error);
    $row = $stmt->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>user information</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>first name</th>
                <th>last name</th>
                <th>email</th>
                <th>gender</th>
            </tr>
        </thead>
        <tbody>
            <?php do { ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['gender'];?></td>
            </tr>
            <?php } while($row = $stmt->fetch_assoc());?>
        </tbody>
    </table>
</body>
</html>