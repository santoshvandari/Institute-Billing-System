<?php
    include_once "head.php";
?>
    <title>Update Student Bill</title>
    <link rel="stylesheet" href="../assets/css/admin/common-style.css">
    <link rel="stylesheet" href="../assets/css/admin/studentbillform.css">
    <script defer src="../assets/js/admin/EditBillFormValidation.js"></script>
<?php
    include_once "sidebar.php";
?>
    <section class="main-container form-container">
        <div class="form-wrapper">
            <div class="studentinfo">
                <h3>Student Information</h3>
                <?php
                if($_SERVER['REQUEST_METHOD']=='GET'){
                    if(isset($_GET["phone"]) && isset($_GET['date'])){
                        $phone=trim($_GET["phone"]);
                        $tdate=trim($_GET['date']);
                        $read="SELECT * FROM StudentInfo,CourseInfo,BillInfo WHERE CourseInfo.cid=StudentInfo.cid AND BillInfo.phone=StudentInfo.phone AND StudentInfo.phone ='$phone' AND tdate='$tdate';";
                        if($result=$con->query($read)){
                            if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                                    $name=$row["name"];
                                    $address=$row["address"];
                                    $phone=$row['phone'];
                                    $course=$row['cname'];
                                    $amount=$row['amount'];
                                    $courseprice=$row['price'];
                                }
                                $read="SELECT * FROM BillInfo WHERE phone='$phone';";
                                if($result=$con->query($read)){
                                    $totalpaidamount=0;
                                    if($result->num_rows>0){
                                        while($row=$result->fetch_assoc()){
                                            $totalpaidamount+=(float)$row["amount"];
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if($_SERVER['REQUEST_METHOD']=='POST' ){
                    if(isset($_GET["phone"]) && isset($_GET['date'])){
                        $phone=trim($_GET["phone"]);
                        $tdate=trim($_GET['date']);
                        $amount=trim($_POST['amount']);
                        $update="UPDATE BillInfo SET amount=$amount WHERE phone='$phone' AND tdate='$tdate';";
                        if($con->query($update)){
                            echo "<script>
                            alert('Record Updated Successfully');
                            location.href='student-bill.php?phone={$phone}&date={$date}';
                            </script>";
                        }else{
                            echo "<script>
                            alert('Failed To Update Information');
                            location.href='student-bill.php?phone={$phone}&date={$date}';
                            </script>";
                        }
                    }}
                ?>
                <p class='name'>Name: <?=$name?></p>
                <p class='address'>Address: <?=$address?></p>
                <p class='phone'>Phone: <?=$phone?></p>
                <p class='phone'>Course: <?=$course?></p>
            </div>
            <form class="form" method="post">
                <h3>Update Bill Information</h3>
                <label for="course">Course</label>
                <input type="text" id="course" name="course" required value='<?=$course?>' disabled/>
                <label for="totalfee">Total Fee</label>
                <input type="number" id="totalfee" name="totalfee" value='<?=$courseprice?>' required disabled/>
                <label for="dueamount">Due Amount</label>
                <input type="number" id="dueamount" name="dueamount" value='<?=($courseprice-$totalpaidamount)?>' required disabled/>
                <div class="errormessage"></div>
                <label for="amount">Amount To Pay</label>
                <input type="number" id="amount" name="amount" value='<?=(int)$amount?>' required/>
                <div class="btn-wrapper">
                    <button type="reset">Clear</button>
                    <button type="submit">Update</button>
                </div>
            </form>
            </div>
    </section>
   </main>
</body>
</html>