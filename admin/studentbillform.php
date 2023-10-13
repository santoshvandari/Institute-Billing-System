<?php
    include_once "head.php";
?>
    <title>Student Bill Form</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/studentbillform.css">
    <!-- <script defer src="../assets/js/user/addFieldOnClick.js"></script> -->
<?php
    include_once "sidebar.php";
?>
    <section class="main-container form-container">
        <div class="form-wrapper">
            <div class="studentinfo">
                <h3>Student Information</h3>
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST' || $_SERVER['REQUEST_METHOD']=='GET'){
                   if(isset($_GET["phone"])){
                       $phone=trim($_GET["phone"]);
                    $read="SELECT * FROM StudentInfo,CourseInfo WHERE StudentInfo.cid=CourseInfo.cid AND StudentInfo.phone ='$phone';";
                    if($result=$con->query($read)){
                        $amount=0;
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                $price=$row["price"];
                                // $amount=$row["amount"];
                                $course=$row["cname"];
                                echo "<p class='name'>Name: ".$row["name"]."</p>";
                                echo "<p class='address'>Address: ".$row["address"]."</p>";
                                echo "<p class='phone'>Phone: ".$row["phone"]."</p>";
                                echo "<p class='phone'>Course: ".$row["cname"]."</p>";
                            }
                            $read="SELECT * FROM BillInfo WHERE phone='$phone';";
                            if($result=$con->query($read)){
                                if($result->num_rows>0){
                                    while($row=$result->fetch_assoc()){
                                        $amount+=(float)$row["amount"];
                                    }
                                }
                            }
                        }
                    }
                    }else{
                        header("Location: student-list.php");
                    }
                }
                ?>
            </div>
            <form class="form" action="generate-bill.php" method="post">
                <h3>Fill the Bill Information</h3>
                <input type="phone" name="phone" hidden value="<?=$phone?>">
                <label for="course">Course</label>
                <input type="text" id="course" name="course" required value='<?=$course?>' disabled/>
                <label for="totalfee">Total Fee</label>
                <input type="number" id="totalfee" name="totalfee" value='<?=$price?>' required disabled/>
                <label for="dueamount">Due Amount</label>
                <input type="number" id="dueamount" name="dueamount" value='<?=($price-$amount)?>' required disabled/>
                <div class="errormessage"></div>
                <label for="amount">Amount To Pay</label>
                <input type="number" id="amount" name="amount" placeholder="Enter a Amount" required/>
                <div class="btn-wrapper">
                    <button type="reset">Clear</button>
                    <button type="submit">Generate</button>
                </div>
            </form>
            </div>
    </section>
   </main>
</body>
<script>
    let totalfee = document.getElementById("totalfee").value;
    let dueamount = document.getElementById("dueamount").value;
    let errorMessage= document.querySelector(".errormessage");
    let submitBtn= document.querySelector("button[type='submit']");
    document.getElementById("amount").addEventListener("input",(e)=>{
        let amount = Number(e.target.value);
        console.log(amount)
        if(amount>dueamount){
            errorMessage.innerHTML="<p>* Amount cannot be greater than Due Amount</p>";
            submitBtn.disabled=true;
        }else if(amount<0 || amount==0){
            errorMessage.innerHTML="<p>* Amount cannot be less than or Equal to 0</p>";
            submitBtn.disabled=true;
        }else{
            errorMessage.innerHTML="";
            submitBtn.disabled=false;
        }
    });
</script>
</html>