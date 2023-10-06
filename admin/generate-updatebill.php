<?php
    include_once "head.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST["phone"])){
            $phone=trim($_POST["phone"]);
            $amount = trim($_POST["amount"]);
            $read="SELECT * FROM StudentInfo WHERE phone ='$phone';";
            if($result=$con->query($read)){
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        $name=$row["name"];
                        $address = $row["address"];
                    }
                }
        }}
     }

?>
    <title>Generate Bill</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/generate-bill.css">
    <script defer src="../assets/js/DateTime.js"></script>
<?php
    include_once "sidebar.php";
?>
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
                        <tbody>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                if(isset($_POST["desc0"])){
                                    $description="";
                                    $count=$_POST["counter"];
                                    for($i=0;$i<=$count;$i++){
                                        if(!empty($_POST["desc".$i])){
                                            $description=$description."|".$_POST["desc".$i];
                                            echo "<tr><td>".($i+1)."</td><td>".$_POST["desc".$i]."</td></tr>";      
                                        }
                                    }
                                   
                                }
                            }

                            ?>
                            <tr class="total">
                                <td>Total Amount</td>
                                <td><?=$amount?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="billoptions">
                        <form action="student-updatebilled.php" method="post">
                            <input type="text" name="name" value="<?=$name?>" hidden>
                            <input type="text" name="address" value="<?=$address?>" hidden>
                            <input type="phone" name="phone" value="<?=$phone?>" hidden>
                            <input type="text" name="description" value="<?=$description?>" hidden/>
                            <input type="number" name="amount" value="<?=$amount?>" hidden>
                            <button type="submit">Update Bill</button>
                            <button><a href="student-bill.php">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   </main>
   <footer>
   </footer>
</body>
</html>