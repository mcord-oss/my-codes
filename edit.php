<?php

include_once("connections/connection.php");
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM `employees` WHERE `id` = '$id'";
$stmt = $con->query($sql) or die ($con->error);
$row = $stmt->fetch_assoc();

if(isset($_POST['btn'])){

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `employees` SET `id` = '$id', `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `gender` = '$gender' WHERE `id` = '$id'";
    $con->query($sql) or die ($con->error);
    echo header("location: details.php?id=".$id);
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
    <form action="#" method="post" class="form-group m-5 p-5 w-50 m-auto">
    <h3 style="text-align: center;">Complete Details Information</h3>
        <p>
            <input type="text" style="text-align: center;" name="id" id="id" class="form-control form-control-lg" placeholder="id" required value="<?php echo $row['id'].".";?>"> 
        </p>
        <p>
            <input type="text" style="text-align: center;" name="fname" id="fname" class="form-control form-control-lg" placeholder="first name" required value="<?php echo $row['first_name'];?>">
        </p>
        <p>
            <input type="text" style="text-align: center;" name="lname" id="lname" class="form-control form-control-lg" placeholder="last name" required value="<?php echo $row['last_name'];?>">
        </p>
        <p>
            <input type="email" style="text-align: center;" name="email" id="email" class="form-control form-control-lg" placeholder="email" required value="<?php echo $row['email'];?>">
        </p>
        <p>
            <select style="text-align: center;" name="gender" id="gender" class="form-control form-control-lg">
                <option class="form-control m-3 p-3" value="Male" <?php echo $row['gender'] = "Male" ? 'Selected': '';?>>Male</option>
                <option class="form-control m-3 p-3" value="Female" <?php echo $row['gender'] = "Female" ? 'Selected': '';?>>Female</option>
            </select>
        </p>
        <p>
            <img width="100" height="100" src="images/<?php echo $row['img'];?>" alt="images">
        </p>
        <p>
            <button type="submit" name="btn" class="btn-secondary btn-block btn-lg">Update</button>
        </p>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>