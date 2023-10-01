<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        header("Location: admin-dashboard.php");
    }
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user/generate-bill.css">
</head>
<body>
   <header>
    <nav>
        <div class="logo">Billing System</div>
        <div class="user-info">
            <div class="user">
                <div class="username">Santosh Bhandari</div>
                <div class="user-img"><img src="../img/img.jpg" alt="" srcset=""></div>
            </div>
        </div>
    </nav>
   </header>
   <main>
    <section class="side-option">
       <div class="side-option-container">
        <h4>User</h4>
        <ul class="side-option-list">
            <li><a href="user-dashboard.php">Home</a></li>
            <li><a href="student-bill.php">Bill</a></li>
            <li><a href="student-list.php">Student</a></li>
            <li><a href="add-student.php">Add Student</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
           
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
                                        $description=$description."|".$_POST["desc".$i];
                                        echo "<tr><td>".($i+1)."</td><td>".$_POST["desc".$i]."</td></tr>";      
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
                        <form action="student-billed.php" method="post">
                            <input type="text" name="name" value="<?=$name?>" hidden>
                            <input type="text" name="address" value="<?=$address?>" hidden>
                            <input type="phone" name="phone" value="<?=$phone?>" hidden>
                            <input type="text" name="description" value="<?=$description?>" hidden/>
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
   <footer>
   </footer>
     <script>
        document.querySelector(".date").textContent="Date: "+new Date().toLocaleDateString();
        document.querySelector(".time").textContent="Time: "+ new Date().toLocaleTimeString();
     </script>
</body>
</html>