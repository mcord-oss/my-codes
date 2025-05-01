<?php
    
    // creating a variables
            $host = "localhost";
            $user = "root";
            $pass = "admin";
            $db = "dbname";
    // data source name
            $dns = "mysql:host=$host;dbname=$db";
    // pdo instanciation
            $pdo = new PDO($dns, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // query
            $stmt = $pdo->query( "SELECT * FROM `employees`");
    // loop
            while($row = $stmt->fetch()){
                echo $row['first_name']." ".$row['last_name']." ".$row['email']."<br/>";
            }

            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                echo $row->first_name." ".$row->gender."<br/>";
            }

            foreach($stmts as $stmt){
                echo $stmt->first_name." ".$stmt->email."<br/>";
            }

    // prepared statements 
    // positional parameter
            $gender = "male";

            $sql = "SELECT * FROM `employees` WHERE `gender` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$gender]);
            $users = $stmt->fetchAll();

            foreach($users as $user){
                echo $user->first_name." ".$user->last_name." ".$user->email."<br/>";
            }

    // name parameter

            $sql = "SELECT * FROM `employees` WHERE `gender` = :gender";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['gender'=>$gender]);
            $users = $stmt->fetchAll();

            foreach($users as $user){
                echo $user['first_name'].$user['email'].$user['gender']."<br/>";
            }

    // getting single record
            $id = 3;

            $sql = "SELECT * FROM `employees` WHERE `id` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $user = $stmt->fetch();

            echo $user['first_name']." ".$user['last_name'].$user['email'].$user['gender'];

    // getting a number of rows

            $sql = "SELECT * FROM `employees` WHERE `gender` = :gender";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['gender'=>$gender]);
            $userCount = $stmt->rowCount();
            echo $userCount;

    // insert datas

            $fname = "JUAN";
            $lname = "DELA CRUZ";
            $email = "JUANDELACRUZ1@PDO.org";
            $gender = "MALE";

            $sql = "INSERT INTO `employees`(`first_name`,`last_name`,`email`,`gender`)VALUES(?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$fname, $lname, $email, $gender]);
            $users = $stmt->fetchAll();
            $userCount = $stmt->rowCount();

    // update data
            
            $fname = "JEAN";
            $lname = "DELA CRUZ";
            $email = "JEANNA22@GMAIL.COM";
            $gender = "FEMALE";
            $id = 1066;

            $sql = "UPDATE `employees` SET `first_name` = :first_name, `email` = :email, `gender` = :gender WHERE `id` = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['first_name'=>$fname, 'email'=>$email, 'gender'=>$gender, 'id'=>$id]);
            $users = $stmt->fetchAll();
            $userCount = $stmt->rowCount();

    // delete data

            $id = 1067;

            $sql = "DELETE FROM `employees` WHERE `id` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $users = $stmt->fetchAll();
            $userCount = $stmt->rowCount();

    // search datas

            $search = "%female%";

            $sql = "SELECT * FROM `employees` WHERE `gender` LIKE ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$search]);
            $users = $stmt->fetchAll();
            $userCount = $stmt->rowCount();

            foreach($users as $user){
                echo $user['first_name']." ".$user['last_name']." ".$user['email']." ".$user['gender']."<br/>";
            }

?>