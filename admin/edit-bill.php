<?php
    session_start();
    if(!$_SESSION['adminname']){
        // echo "sesson not set yet";
        header("Location: user-login.php");
    }
    include_once "../assets/database/connection.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user/studentbillform.css">

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
    <section class="main-container form-container">
        <div class="form-wrapper">
            <div class="studentinfo">
                <h3>Student Information</h3>
                <?php
                    if$_SERVER['REQUEST_METHOD']=='GET'){
                        if(isset($_GET["phone"])){
                        $phone=trim($_GET["phone"]);
                         $read="SELECT * FROM StudentInfo WHERE phone ='$phone';";
                         if($result=$con->query($read)){
                             if($result->num_rows>0){
                                 while($row=$result->fetch_assoc()){
                                     $name=$row["name"];
                                     echo "<p class='name'>Name: ".$row["name"]."</p>";
                                     echo "<p class='address'>Address: ".$row["address"]."</p>";
                                     echo "<p class='phone'>Phone: ".$row["phone"]."</p>";
                                 }
                             }
                         }
                    $read="SELECT * FROM BillInfo WHERE StudentInfo.phone ='$phone';";
                        if($result=$con->query($read)){
                            if($result->num_rows>0){
                                $desctemp="";
                                $amount=null;
                                while($row=$result->fetch_assoc()){
                                    $desctemp=$desctemp.$row["description"]."|";
                                    $amount+=(int)$row["amount"];
                                }
                                $desc=explode("|",$desctemp);
                                $desc=array_filter($desc);
                                $desc = array_values($desc);
                                $count=count($desc);
                    }
                }
                ?>
            </div>
            <form class="form" action="generate-bill.php" method="post">
                <h3>Fill the Bill Information</h3>
                <input type="phone" name="phone" hidden value="<?=$phone;?>">
                <label for="desc">Description</label>
                <?php
                for($i=0;$i<$count;$i++){
                    echo "<input type='text' name='desc$i' value='".$desc[$i]."'/>";
                }

                ?>
                <input type="text" id="desc" name="desc0" required placeholder="Enter a Bill title"/>
                <div class="addbtn">
                    <button id="add">+</button>
                </div>
                <label for="amt">Amount</label>
                <input type="number" id="amt" name="amount" value="<?=$amount?>"  required/>
                <input type="number" name="counter" id="counter" value="<?=($count)?>" hidden>
                <div class="btn-wrapper">
                    <button type="reset">Clear</button>
                    <button type="submit">Update</button>
                </div>
            </form>
            </div>
    </section>
   </main>
   <footer>
   </footer>
   <script>
    counter=Number(document.getElementById("counter").value);
    document.getElementById("add").addEventListener("click",function(e){
        e.preventDefault();
        counter++;
        document.getElementById("counter").value=counter
        let element = `<input type='text' name='desc${counter}' placeholder='Enter a Bill Title'/>`
        document.querySelector('.addbtn').insertAdjacentHTML("beforebegin",element)
        console.log(document.getElementById("counter").value)
    })
   </script>
</body>
</html>