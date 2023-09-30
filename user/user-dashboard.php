<?php
        session_start();
        if(!$_SESSION['username']){
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
    <link rel="stylesheet" href="../assets/css/user/user-dashboard.css"/>

</head>

<body>
   <header>
    <nav>
        <div class="logo">Billing System</div>
        <div class="user-info">
            <div class="user">
                <div class="username"><?=$_SESSION['username'] ?></div>
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
        <?php
            $studentread="SELECT * FROM StudentInfo;";
            $billread="SELECT * FROM BillInfo;";
            $studentnumber=0;
            $totalamount=0;
            if($result=$con->query($studentread)){
                $studentnumber=$result->num_rows;
                $result->free();
            }
            if($result=$con->query($billread)){
                while($row=$result->fetch_assoc()){
                    $totalamount+=(int)$row['amount'];
                }
            }
            


        ?>


    <section class="main-container">
    <div class="card-wrapper">
        <div class="card">
            <h2>Total Students</h2>
            <hr>
            <p><?=$studentnumber?></p>
        </div>
        <div class="card">
            <h2>Total Amount Paid</h2>
            <hr>
            <p><?=$totalamount?></p>
        </div>
    </div>
    </section>
   </main>
   <footer>
   </footer>
   </script>
</body>
</html>