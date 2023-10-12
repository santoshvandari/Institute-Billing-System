</script>
<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["cid"])){
            $cid=trim($_GET["cid"]);
            $deletecourse="DELETE FROM CourseInfo WHERE cid='$cid';";
            $deletestudent="DELETE FROM StudentInfo WHERE cid='$cid';";
            if($con->query($deletestudent)){
                if($con->query($deletecourse)){
                    header("Location: course-list.php?coursesuccess=success");
                }else{
                    header("Location: course-list.php?coursefailure=failure");
                }
                // echo "Success";
            }else{
                // echo "Error";
                header("Location: course-list.php?coursefailure=failure");
            }
        }else{
            header("Location: course-list.php?coursefailure=failure");
        }
    }
    // echo "Record Deleted Successfully"
?>