<?php
    include_once "head.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        header("Location: student-bill.php");

    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST["phone"])){
            $name=trim($_POST["name"]);
            $address=trim($_POST["address"]);
            $phone=trim($_POST["phone"]);
            $desc=trim($_POST["description"]);
            $amount = trim($_POST["amount"]);


            $delete = 'DELETE FROM BillInfo WHERE phone="'.$phone.'";';
            $insert= 'INSERT INTO BillInfo VALUES("'.$phone.'","'.$desc.'",'.$amount.');';
            $flag=false;
            if($con->query($delete)){
                if($con->query($insert)){
                    $flag=true;
                }
            }else{
                $flag=false;
            }

        }}

?>

    <title>Student Bill</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/student-billed.css">
    <link rel="stylesheet" href="../assets/css/message.css">
    <script defer src="../assets/js/HideMessage.js"></script>
    <script defer src="../assets/js/DateTime.js"></script>


<?php
    include_once "sidebar.php";
?>
    <section class="main-container main-bill-container">
        <div class="bill-wrapper">
            <div class="bill-container">
                <div class="message">
                    
                <?php
                    if($flag){
                        echo '<div class="message"><p class="success">Bill  Updated Successful</p></div> ';
                    }else if($flag==false){
                        echo '<div class="message"><p class="failure">Failed to Update Bill!!!</p> </div>';
                    }else{
                        echo '<div class="message"><p class="failure">Failed to Update Bill!!!</p> </div>';
                    }


                ?>

                </div>
                <hr>
                <?php
                    if($flag){
                        $disp1=' <div class="company-name">
                        <p>ABC Institute</p>
                    </div>
                    <hr>
                    <div class="details-container">
                        <div class="billerinfo">
                            <p class="name">Name:'.$name.'</p>
                            <p class="address">Address: '.$address.'</p>
                            <p class="phone">Number: '.$phone.'</p>
        
                        </div>
                        <div class="billinfo">
                            <p class="date">Date: 2023-10-23</p>
                            <p class="time">Time: 10:45 AM</p>
                        </div>
                    </div>
                    <div class="billtable">
                        <table border="1">
                            <thead>
                                <th>S.N.</th>
                                <th>Description</th>
                            </thead>
                            <tbody>';
                        
                            $desc=explode("|",$desc);
                            $counter=0;
                            $rows="";
                            foreach($desc as $value){
                                $counter++;
                                if (!empty($value)){
                                    $rows = $rows. '<tr><td>'.$counter.'</td><td>'.$value.'</td></tr>';

                                }
                            }
                            $disp2=$rows.'<tr><td><strong>Amount</strong></td><td><strong>'.$amount.'</strong></td></tr></table>';

                            $disp3='<div class="billoptions">
                                <button><a href="updatedbill.php?phone='.$phone.'">Print</a></button>
                                </div>';
                                echo $disp1."".$disp2."".$disp3;
                    }

                ?>
               
            </div>
        </div>
    </section>
   </main>
   <footer>
   </footer>
</body>
</html>