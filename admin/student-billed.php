<?php
    include_once "head.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST["phone"])){
            $name=trim($_POST["name"]);
            $address=trim($_POST["address"]);
            $phone=trim($_POST["phone"]);
            $desc=trim($_POST["description"]);
            // $desc="NULL";
            $amount = trim($_POST["amount"]);


            $insert= 'INSERT INTO BillInfo VALUES("'.$phone.'","'.$desc.'",'.$amount.');';

            $flag=false;
            if($con->query($insert)){

                $flag=true;
            }else{
                $flag=false;
            }
        }}

?>

    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user/student-billed.css">
    <link rel="stylesheet" href="../assets/css/message.css">

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
        <h4>Admin</h4>
        <ul class="side-option-list">
            <li><a href="admin-dashboard.php">Home</a></li>
            <li><a href="student-bill.php">Bill</a></li>
            <li><a href="student-list.php">Student</a></li>
            <li><a href="add-student.php">Add Student</a></li>
            <li><a href="user-list.php">Users</a></li>
                <li><a href="admin-list.php">Admins</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
           
    </section>
    <section class="main-container main-bill-container">
        <div class="bill-wrapper">
            <div class="bill-container">
                <div class="billMessage">
                    
                <?php
                    if($flag){
                        echo '<div class="successful"><p>Billing Process is Successful</p></div> ';
                    }else if($flag==false){
                        echo '<div class="failure"><p>Billing Process Failed!!!</p></div> ';
                    }else{
                        echo '<div class="failure"><p>Internal Server Issue!!!</p></div>';
                    }

                ?>
                    <!-- <div class="successful">
                        <p>Billing Process is Successful</p>
                        
                    </div> -->
                    <!-- <div class="failure">
                        <p>Billing Process Failed!!!</p>
    
                    </div> -->
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
                                <button><a href="bill.php?phone='.$phone.'">Print</a></button>
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
   <script>
   
        document.querySelector(".date").textContent="Date: "+new Date().toLocaleDateString();
        document.querySelector(".time").textContent="Time: "+ new Date().toLocaleTimeString();
   </script>
</body>
</html>