<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["phone"])){
            $phone=trim($_GET["phone"]);
            $delete="DELETE FROM StudentInfo WHERE phone='$phone';";
            if($con->query($delete)){
                echo "Success";
                header("Location: student-list.php?studentsuccess=success");
            }else{
                echo "Error";
                header("Location: student-list.php?studentfailure=failure");
            }
        }else{
            header("Location: student-list.php?studentfailure=failure");
        }
    }
?>