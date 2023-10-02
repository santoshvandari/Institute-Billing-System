<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_POST["username"]){
            $username=$_POST["username"];
            $delete="DELETE FROM AdminInfo WHERE username='$username';";

        }else{
            header("Location: admin-list.php")
        }
    }
?>