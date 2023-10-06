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
                if($_SERVER["REQUEST_METHOD"]=="GET"){
                    header("Location: admin-dashboard.php");
                }
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST["desc"]) && isset($_POST["amount"]) && isset($_POST["phone"])){
                    $phone=trim($_POST["phone"]);
                    $desc=trim($_POST["desc"]);
                    $amount = trim($_POST["amount"]);
                    $read="SELECT * FROM StudentInfo WHERE phone ='$phone';";
                    if($result=$con->query($read)){
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                $name=$row["name"];
                                $address=$row["address"];
                                $phone=$row['phone'];
                            }
                        }
                    }
                    $desc=explode("|",$desc);
                    $desc=array_filter($desc);
                    $desc = array_values($desc);
                        
        
                }
            }          
           ?>
            
            <div class="details-container">
                <div class="billerinfo">
                    <p class="name">Name: <?=$name?></p>
                    <p class="address">Address: <?=$address?></p>
                    <p class="phone">Number: <?=$phone?></p>

                </div>
                <div class="billinfo">
                    <p class="date">Date: 0000-00-00</p>
                    <p class="time">Time: 00:00 AM</p>
                </div>
            </div>
            <div class="billtable">
                <table border="1">
                    <thead>
                        <th>S.N.</th>
                        <th>Description</th>
                        <th>Amount</th>
                      
                    </thead>
                    <tbody>
                        <?php
                        $rows="";
                             $count=count($desc);
                             for($i=0;$i<$count;$i++){
                                if($i==0){
                                    $rows = $rows. '<tr><td>'.($i+1).'</td><td>'.$desc[$i].'</td><td rowspan="'.$count.'">'.$amount.'</td></tr>';

                                }else{
                                    $rows = $rows. '<tr><td>'.($i+1).'</td><td>'.$desc[$i].'</td></tr>';
                                }
                             }

                             echo $rows.'</tr>
                             <tr class="total">
                                 <td colspan="2">Total Amount</td>
                                 <td>'.$amount.'</td>
                             </tr>';

                        ?>
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