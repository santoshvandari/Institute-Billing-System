<?php
    $server="localhost";
    $username="user";
    $password="user";
    $database="BillingSystem";
    $con=new mysqli($server,$username,$password,$database);
    if($con->connect_error){
        echo "Failed to Connect to database. Error: ".$con->connec_error;
    }else{
        // echo "Connected Successfully";
    }


?>