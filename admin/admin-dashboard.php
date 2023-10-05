    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css"/>
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
        <?php
            $studentread="SELECT * FROM StudentInfo;";
            $userread="SELECT * FROM UserInfo;";
            $adminread="SELECT * FROM AdminInfo;";
            $billread="SELECT * FROM BillInfo;";
            $studentnumber=$totalamount=$totaladmin=$totaluser=0;
            if($result=$con->query($studentread)){
                $studentnumber=$result->num_rows;
                $result->free();
            }
            if($result=$con->query($billread)){
                while($row=$result->fetch_assoc()){
                    $totalamount+=(int)$row['amount'];
                }
                $result->free();
            }
            if($result=$con->query($userread)){
                $totaluser=$result->num_rows;
                $result->free();
            }
            if($result=$con->query($adminread)){
                $totaladmin=$result->num_rows;
                $result->free();
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
        <div class="card">
            <h2>Total Users</h2>
            <hr>
            <p><?=$totaluser?></p>
        </div>
        <div class="card">
            <h2>Total Admin</h2>
            <hr>
            <p><?=$totaladmin?></p>
        </div>
    </div>
    </section>


   </main>
   <footer>
   </footer>
</body>
</html>