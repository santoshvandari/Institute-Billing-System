<?php
        session_start();
        if(!$_SESSION['username']){
            header("Location: user-login.php");
        }
        include_once "../assets/database/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">