<?php
   session_start();
   if(!$_SESSION['adminname']){
       header("Location: admin-login.php");
   }else{
       include_once "../assets/database/connection.php";
       if($_SERVER['REQUEST_METHOD']=="GET"){
           if(isset($_GET["date"]) && isset($_GET["phone"])){
               $phone=$_GET['phone'];
               $date=$_GET['date'];
               $delete="DELETE FROM BillInfo WHERE phone='$phone' AND tdate='$date';";
               if($con->query($delete)){
                   echo "<script>
                   alert('Record Deleted Successfully');
                   location.href='student-bill.php?phone=".$phone."';
                   </script>";
                }else{
                   echo "<script>
                  alert('Failed To Deleted Record');
                  location.href='student-bill.php?phone=".$phone."';
                  </script>";
               }
        }
    }
}


?>