<?php
    include_once "head.php"
?>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css"/>

</head>


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