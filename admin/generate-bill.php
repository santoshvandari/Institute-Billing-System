<?php
    include_once "head.php";
    if($_SERVER['REQUEST_METHOD']=="GET"){
        header("Location: student-list.php");
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST["phone"])){
            $phone=trim($_POST["phone"]);
            $amount = trim($_POST["amount"]);
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
        }}
     }

?>
    <title>Generate Bill</title>
    <link rel="stylesheet" href="../assets/css/admin/common-style.css">
    <link rel="stylesheet" href="../assets/css/admin/generate-bill.css">
    <script defer src="../assets/js/DateTime.js"></script>
    
<?php
    include_once "sidebar.php";
?>
           
    </section>
    <section class="main-container main-bill-container">
        <div class="bill-wrapper">
            <div class="bill-container">
                <hr>
                <div class="company-name">
                    <p>ABC Institute</p>
                </div>
                <hr>
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
                        <form action="student-billed.php" method="post">
                            <input type="phone" name="phone" value="<?=$phone?>" hidden>
                            <input type="number" name="amount" value="<?=$amount?>" hidden>
                            <button type="submit">Bill</button>
                            <button><a href="student-bill.php">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   </main>
</body>
</html>