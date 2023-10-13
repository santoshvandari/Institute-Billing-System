<?php
   
   if($_SERVER['REQUEST_METHOD']=="GET"){
        if(isset($_GET["date"]) && isset($_GET["phone"])){
            $phone=$_GET['phone'];
            $date=$_GET['date'];
            $delete="DELETE FROM BillInfo WHERE phone='$phone' AND tdate='$date';";
            if()
            echo $delete;
            echo "
                <script>
                    alert('Record Deleted Successfully');
                    location.href='student-bill.php?phone=".$phone."';
                </script>
            ";
        }
    }


?>