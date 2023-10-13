<?php
           include_once "../assets/database/connection.php";
?>
    <link rel="stylesheet" href="../assets/css/bill.css">
    <title>Student Bill</title>
</head>
<body>
    <div class="bill-wrapper">
        <div class="bill-container">
            <hr>
            <div class="company-name">
                <p>ABC Institute</p>
            </div>
            <hr>
            
            <?php  
                if($_SERVER['REQUEST_METHOD']=='GET'){
                    if(isset($_GET["date"]) && isset($_GET["phone"])){
                        $phone=trim($_GET["phone"]);
                        $tdate=trim($_GET['date']);
                        $read="SELECT name,address,StudentInfo.phone,cname,amount,DATE(tdate) as date, TIME(tdate) as time FROM StudentInfo,CourseInfo,BillInfo WHERE CourseInfo.cid=StudentInfo.cid AND BillInfo.phone=StudentInfo.phone AND StudentInfo.phone ='$phone' AND tdate='$tdate';";
                        // echo $read;
                        if($result=$con->query($read)){
                            if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                                    $name=$row["name"];
                                    $address=$row["address"];
                                    $phone=$row['phone'];
                                    $course=$row['cname'];
                                    $amount=$row['amount'];
                                    $date=$row['date'];
                                    $time=$row['time'];                                    
                                }
                            }
                        }
                    }else{
                        header("Location:index.php");
                    }
                }

            ?>
            
              <div class="details-container">
                    <div class="billerinfo">
                        <p class="name">Name: <?=$name?></p>
                        <p class="address">Address:<?=$address?></p>
                        <p class="phone">Number: <?=$phone?></p>
                        <p class="course">Course: <?=$course?></p>
    
                    </div>
                    <div class="billinfo">
                        <p class="date">Date: <?=$date?></p>
                        <p class="time">Time: <?=$time?></p>
                    </div>
                </div>
            <div class="billtable">
                <table border="1">
                    <thead>
                        <th>S.N.</th>
                        <th>Course</th>
                        <th>Amount</th>
                      
                    </thead>
                    <tbody>
                        <tr><td>1</td><td><?=$course?></td><td><?=$amount?></td></tr>
                            <tr class="total">
                                <td colspan='2'>Total Amount</td>
                                <td><?=$amount?></td>
                            </tr>
                        </tbody>
                    </table>
                <div class="billoptions">
                    <button id='home'><a href="index.php">Home</a></button>
                    <button id="print">Print</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
let printbtn=document.getElementById("print");
let btndiv = document.querySelector(".billoptions");
printbtn.addEventListener('click',function(e){
    btndiv.style.display="none";
    window.print()
    btndiv.style.display="block";
})
</script>
</html>