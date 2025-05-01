<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['userlogin'])){
    echo "WELCOME ".$_SESSION['userlogin'];
}else{
    echo "WELCOME GUEST!!";
}

    include_once("connections/connection.php");
    $con = connection();

    $sql = "SELECT * FROM `employees` ORDER BY id DESC";
    $stmt = $con->query($sql) or die ($con->error);
    $row = $stmt->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body><br><br>
<?php if(isset($_SESSION['userlogin'])){?>
        <a href="logout.php">Log-out</a>
    <?php } else { ?>
        <a href="login.php">Log-in</a>
    <?php } ?>
    <h2 style="text-align: center;">System Information</h2>
    <form action="result.php" method="get" class="myForm">
        <input type="search" name="query" id="query" placeholder="Type Here">
        <button type="search" name="btn">Search</button>
    </form>
    <table class="table table-bordered table-hover table-frimary">
        <thead class="table-success">
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $stmt->fetch_assoc()){?>
            <tr>
                <td><?=$row['id'];?>.</td>
                <td><?=$row['first_name'];?></td>
                <td><?=$row['last_name'];?></td>
                <td><?=$row['email'];?></td>
                <td><?=$row['gender'];?></td>
                <td><a href="details.php?id=<?php echo $row['id'];?>">view</a></td>
                <td>
                    <img width="100" height="50" src="images/<?php echo $row['img'];?>" alt="image">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
