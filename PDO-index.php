<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['userlogin'])){
        echo "WELCOME ".$_SESSION['userlogin'];
    }else{
        echo "WELCOME GUEST!";
    }

    // create variables
    $host = "localhost";
    $user = "root";
    $pass = "admin";
    $db = "dbname";

    // data source name
    $dsn = "mysql:host=$host;dbname=$db";
    // instanciation
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // query
    $stmt = $pdo->query("SELECT * FROM `employees` ORDER BY id DESC");

    if(isset($_POST['btn'])){

        $id = $_POST['ID'];

        $sql = "DELETE FROM `employees` WHERE `id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $stmt->rowCount();
        echo header("location: index.php");

    }
    // $gender = "female";

    // positional parameters
    // $sql = "SELECT * FROM `users` WHERE `gender` = ?";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$gender]);
    // $users = $stmt->fetchAll();

    // foreach($users as $user){
    //     echo $user['id']." .".$user['fname']." ".$user['lname']."</br>";
    // }

    // name parameters
    // $sql = "SELECT * FROM `users` WHERE `gender` = :gender";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['gender' => $gender]);
    // $rows = $stmt->fetchAll();

    // cetting a single record
    // $id = 129;

    // $sql = "SELECT * FROM `users` WHERE `id` = :id";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id' => $id]);
    // $row = $stmt->fetch();

    // getting a number rows
    // $gender = "male";
    // $sql = "SELECT * FROM `users` WHERE `gender` = ?";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$gender]);
    // $userCount = $stmt->rowCount();

    // echo $userCount;

    // echo $row['id'];

    // $fname = "";
    // $lname = "";
    // $email = "monrey.12@yahoo.com";
    // $gender = "male";
    

    // $sql = "INSERT INTO `users`(`fname`,`lname`,`email`,`gender`)VALUES(?,?,?,?)";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$fname, $lname, $email, $gender]);
    // echo $stmt->rowCount();

    // $fname = "REYMON";
    // $lname = "TORIALES";
    // $email = "monrey.12@yahoo.com";
    // $gender = "male";
    // $id = 1019;
    

    // $sql = "UPDATE `users` SET `fname` = :fname, `lname` = :lname, `email` = :email, `gender` = :gender WHERE `id` = :id";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['fname'=>$fname, 'lname'=>$lname, 'email'=>$email, 'gender'=>$gender, 'id'=>$id]);
    // echo $stmt->rowCount();

    // if(isset($_POST['btn'])){
    //     $fname = $_POST['fname'];
    //     $lname = $_POST['lname'];
    //     $email = $_POST['email'];
    //     $gender = $_POST['gender'];

        
    //     $sql = "INSERT INTO `users`(`fname`,`lname`,`email`,`gender`)VALUES(?,?,?,?)";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute([$fname, $lname, $email, $gender]);
    //     echo $stmt->rowCount();
    // }

    // if(isset($_POST['btn'])){
    //     $fname = $_POST['fname'];
    //     $lname = $_POST['lname'];
    //     $email = $_POST['email'];
    //     $gender = $_POST['gender'];

    //     $sql = "UPDATE `users` SET `fname` = :fname, `lname` = :lname, `email` = :email, `gender` = :gender";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute(['fname'=>$fname, 'lname'=>$lname, 'email'=>$email, 'gender'=>$gender]);
    //     echo $stmt->rowCount();
    // }



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
    <h1>Welcome pages</h1>
    <?php if(isset($_SESSION['userlogin'])){?>
        <a href="logout.php">logout</a>
    <?php }else{ ?>
        <a href="login.php">login</a>
    <?php } ?>
    <a href="new.php">New</a>
    <table class="table table-bordered table-hover table-secondary">
        <thead class="table-dark" >
            <tr>
                <th>id</th>
                <th>details</th>
                <th>fname</th>
                <th>lname</th>
                <th>email</th>
                <th>gender</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $stmt->fetch()){?>
            <tr>
                <td><?=$row['id'];?>.</td>
                <td><a href="edit.php?id=<?php echo $row['id'];?>">edit</a></td>
                <td><?=$row['first_name'];?></td>
                <td><?=$row['last_name'];?></td>
                <td><?=$row['email'];?></td>
                <td><?=$row['gender'];?></td>
                <td>
                    <form action="#" method="post">
                        <input type="hidden" name="ID" id="ID" value="<?php echo $row['id'].".";?>">
                        <button type="submit" name="btn">delete</button>
                    </form>
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