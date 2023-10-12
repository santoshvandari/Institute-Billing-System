</script>
<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["cid"])){
            $cid=trim($_GET["cid"]);
            $delete="DELETE FROM CourseInfo WHERE cid='$cid';";
            if($con->query($delete)){
                // echo "Success";
                header("Location: admin-list.php?adminsuccess=success");
            }else{
                // echo "Error";
                header("Location: admin-list.php?adminfailure=failure");
            }
        }else{
            header("Location: admin-list.php?adminfailure=failure");
        }
    }
    // echo "Record Deleted Successfully"
?>