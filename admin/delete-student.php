<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["phone"])){
            $username=trim($_GET["phone"]);
            $delete="DELETE FROM StudentInfo WHERE phone='$username';";
            if($con->query($delete)){
                echo "Success";
                header("Location: student-list.php?adminsuccess=success");
            }else{
                echo "Error";
                header("Location: student-list.php?adminfailure=failure");
            }
        }else{
            header("Location: student-list.php?adminfailure=failure");
        }
    }
?>