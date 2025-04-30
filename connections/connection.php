<?php

    function connection(){

        $host = "localhost";
        $user = "root";
        $pass = "admin";
        $db = "dbname";

        $con = new mysqli($host, $user, $pass, $db);

            if($con->connect_error){

                echo $con->connect_error;

            }else{

                return $con;
                
            }
    }

?>