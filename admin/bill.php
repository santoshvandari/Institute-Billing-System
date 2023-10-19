<?php
    include_once "head.php";
?>
    <link rel="stylesheet" href="../assets/css/bill.css">
    <script defer src="../assets/js/DateTime.js"></script>
    <script defer src="../assets/js/BillPrintFunction.js"></script>
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
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST["amount"]) && isset($_POST["phone"])){
                        $amount=trim($_POST["amount"]);
                        $phone=trim($_POST["phone"]);
                        $read="SELECT * FROM StudentInfo,CourseInfo WHERE CourseInfo.cid=StudentInfo.cid AND phone ='$phone';";
                        if($result=$con->query($read)){
                            if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                                    $name=$row["name"];
                                    $address=$row["address"];
                                    $phone=$row['phone'];
                                    $course=$row['cname'];
                                }
                            }
                        }
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
                        <p class="date">Date: 2023-10-23</p>
                        <p class="time">Time: 10:45 AM</p>
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
                            <?php
                                if($_SERVER['REQUEST_METHOD']=='POST'){
                                    if(isset($_POST["amount"])){
                                        $amount=trim($_POST["amount"]);
                                        echo "<tr><td>1</td><td>$course</td><td>$amount</td></tr>";      
                                    }
                                }
                            ?>
                            <tr class="total">
                                <td colspan='2'>Total Amount</td>
                                <td><?=$amount?></td>
                            </tr>
                        </tbody>
                    </table>
                <div class="billoptions">
                    <button id='home'><a href="admin-dashboard.php">Home</a></button>
                    <button id="print">Print</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>