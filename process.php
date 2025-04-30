<?php

include_once("connections/connection.php");
$con = connection();


                            if(isset($_POST['btn'])){

                                $image = $_FILES['upload']['name'];
                                $temp_name = $_FILES['upload']['tmp_name'];
                                $folder = 'images/'.$image;

                                $sql = "INSERT INTO `employees`(`img`)VALUES('$image')";
                                $con->query($sql) or die ($con->error);


                                if(move_uploaded_file($temp_name, $folder)){
                                    echo header("location: index.php");
                                }else{
                                    echo "no uploaded files!!!";
                                }
                            }
                            
?>