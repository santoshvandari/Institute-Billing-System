<?php
    include_once "head.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        header("Location: student-list.php");
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST["phone"])){
            $phone=trim($_POST["phone"]);
            $read="SELECT * FROM StudentInfo,CourseInfo WHERE CourseInfo.cid=StudentInfo.cid AND phone ='$phone';";
            if($result=$con->query($read)){
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        $name=$row["name"];
                        $address = $row["address"];
                        $course=$row['cname'];
                        $cid = $row['cid'];
                    }
                }
            }
            $amount = trim($_POST["amount"]);
            $insert="INSERT INTO BillInfo VALUES('$phone','$cid','$amount',NOW());";
            $flag=true;
            if($con->query($insert)){
                $flag=true;
            }else{
                $flag=false;
            }
        }}
?>

    <title>Student Bill</title>
    <link rel="stylesheet" href="../assets/css/admin/common-style.css">
    <link rel="stylesheet" href="../assets/css/admin/student-billed.css">
    <link rel="stylesheet" href="../assets/css/admin/message.css">
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
                        echo '<div class="message"><p class="success">Billing Process is Successful</p></div> ';
                    }else if($flag==false){
                        echo '<div class="message"><p class="failure">Billing Process Failed!!!</p> </div>';
                    }else{
                        echo '<div class="message"><p class="failure">Billing Process Failed!!!</p> </div>';
                    }
                ?>
                </div>
                <hr>
                <?php
                    if($flag){
                        $disp=' <div class="company-name">
                        <p>ABC Institute</p>
                    </div>
                    <hr>
                    <div class="details-container">
                        <div class="billerinfo">
                            <p class="name">Name:'.$name.'</p>
                            <p class="address">Address: '.$address.'</p>
                            <p class="phone">Number: '.$phone.'</p>
                            <p class="course">Course: '.$course.'</p>
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
                                <tr><td>1</td><td>'.$course.'</td><td>'.$amount.'</td></tr>      
                            
                            <tr class="total">
                                <td colspan="2">Total Amount</td>
                                <td>'.$amount.'</td>
                            </tr>
                            </tbody>
                            </table>
                            <div class="billoptions">
                                <form action="bill.php" method="post">
                                    <input type="text" name="phone" id="phone" hidden value="'.$phone.'"/>
                                    <input type="number" name="amount" id="amount" hidden value="'.$amount.'"/>
                                    <button type="submit" name="print">Print</button>
                                </form>
                                </div>';
                                echo $disp;
                    }
                ?>
               
            </div>
        </div>
    </section>
   </main>
</body>
</html>