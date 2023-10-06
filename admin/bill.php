<?php
    include_once "head.php"
?>
    <title>Student Bill</title>
    <link rel="stylesheet" href="../assets/css/bill.css">
    <script defer src="../assets/js/DateTime.js"></script>
    <script src="../assets/js/BillPrintFunction.js"></script>
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
                 if(isset($_GET["phone"])){
                    $phone=trim($_GET["phone"]);
                    $read="SELECT * FROM StudentInfo, BillInfo WHERE StudentInfo.phone = BillInfo.phone AND StudentInfo.phone ='$phone';";
                    // select * from StudentInfo,BillInfo WHERE StudentInfo.phone = BillInfo.phone;
                    // var_dump($read);
                    if($result=$con->query($read)){
                    if($result->num_rows>0){
                        $desctemp="";
                        $amount=null;
                        while($row=$result->fetch_assoc()){
                            $name=$row["name"];
                            $address=$row["address"];
                            $phone=$row['phone'];
                            $desctemp=$desctemp.$row["description"]."|";
                            $amount+=(int)$row["amount"];
                        }
                        $desc=explode("|",$desctemp);
                        $desc=array_filter($desc);
                        $desc = array_values($desc);
                        }
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
                    <p class="date">Date: 2023-10-23</p>
                    <p class="time">Time: 10:45 AM</p>
                </div>
            </div>
            <div class="billtable">
                <table border="1">
                    <thead>
                        <th>S.N.</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <!-- <td colspan='4'>colspan</td> -->
                      
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
                        <!-- <tr>
                            <td>1</td>
                            <td>Computer Basic</td>
                            <td rowspan='4'>50000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Computer Programming</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Computer Networking</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Computer Hardware</td>
                        </tr>
                        <tr class="total">
                            <td colspan="2">Total Amount</td>
                            <td>50000</td>
                        </tr> -->
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
<script>
    document.querySelector(".date").textContent="Date: "+new Date().toLocaleDateString();
    document.querySelector(".time").textContent="Time: "+ new Date().toLocaleTimeString();
    let printbtn=document.getElementById("print");
    let btndiv = document.querySelector(".billoptions");
    printbtn.addEventListener('click',function(e){
        btndiv.style.display="none";
        window.print()
        btndiv.style.display="block";
        // btndiv.style.opacity='1'
    })
    setTimeout(() => {
        printbtn.click();
    }, 100);
</script>

</html>