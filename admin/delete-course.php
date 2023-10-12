</script>
<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["cid"])){
            $cid=trim($_GET["cid"]);
            $deletebill="DELETE FROM BillInfo WHERE cid='$cid';";
            $deletestudent="DELETE FROM StudentInfo WHERE cid='$cid';";
            $deletecourse="DELETE FROM CourseInfo WHERE cid='$cid';";
            if($con->query($deletebill) && $con->query($deletestudent) && $con->query($deletecourse)){}
                header("Location: course-list.php?coursesuccess=success");
            }else{
                header("Location: course-list.php?coursefailure=failure");
            }
        }else{
            header("Location: course-list.php?coursefailure=failure");
        }

?>