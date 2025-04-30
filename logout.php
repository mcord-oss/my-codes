<?php

if(!isset($_SESSION)){
    session_start();
    unset($_SESSION['userlogin']);
    unset($_SESSION['access']);
}

include_once("connections/connection.php");
$con = connection();
echo header("location: index.php");

?>