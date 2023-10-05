<?php
    include_once "head.php";
?>
    <title>Bill Form</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user/studentbillform.css">
    <script defer src="../assets/js/user/addFieldOnClick.js"></script>

</head>
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
                    }
                }
                ?>
            </div>
            <form class="form" action="generate-bill.php" method="post">
                <h3>Fill the Bill Information</h3>
                <input type="phone" name="phone" hidden value="<?=$phone;?>">
                <label for="desc">Description</label>
                <input type="text" id="desc" name="desc0" required placeholder="Enter a Bill title"/>
                <div class="addbtn">
                    <button id="add">+</button>
                </div>
                <label for="amt">Amount</label>
                <input type="number" id="amt" name="amount" placeholder="Enter a Amount" required/>
                <input type="number" name="counter" id="counter" value="0" hidden>
                <div class="btn-wrapper">
                    <button type="reset">Clear</button>
                    <button type="submit">Generate</button>
                </div>
            </form>
            </div>
    </section>
   </main>
   <footer>
   </footer>
</body>
</html>