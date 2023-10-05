    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css"/>

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