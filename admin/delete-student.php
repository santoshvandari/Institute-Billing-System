<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["phone"])){
            $phone=trim($_GET["phone"]);
            $deleteBill="DELETE FROM BillInfo WHERE phone='$phone';";
            $deleteStudent="DELETE FROM StudentInfo WHERE phone='$phone';";
            if($con->query($deleteBill) && $con->query($deleteStudent)){
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