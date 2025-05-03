<?php

    include_once("connections/connection.php");
    $con = connection();

    $sql = "SELECT * FROM `employees`";
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
    <table>
    <a href="upload-index.php">&laquo;Back</a>
        <h1>customize information</h1>
        <tbody>
            <tr>
                <form action="upload-update.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" id="id" value="<?php echo $row['id'].".";?>">
                    <input type="file" name="file" id="file">
                    <button type="submit" name="btn">Re-upload</button>
                </form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <form action="upload-delete.php" method="post">
                        <input type="text" name="id" id="id" value="<?=$row['id'].".";?>">
                        <button type="submit" name="btn">Delete</button>
                </form>
            </tr>
            <br><br>
            <?php do { ?>
            <img width="300" height="300" src="images/<?=$row['img'];?>" alt="">
            <?php } while($row = $stmt->fetch_assoc());?>
        </tbody>
    </table>
</body>
</html>