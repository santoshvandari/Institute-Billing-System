<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["username"])){
            $username=trim($_GET["username"]);
            $delete="DELETE FROM AdminInfo WHERE username='$username';";
            if($con->query($delete)){
                // echo "Success";
                header("Location: admin-list.php");
            }else{
                echo "Error";
            }
        }else{
            header("Location: admin-list.php");
        }
    }
?>