<?php
    include_once "head.php";

?>
    <title>Edit Bill</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/studentbillform.css">
<?php
    include_once "sidebar.php";

?>
    <section class="main-container form-container">
        <div class="form-wrapper">
            <div class="studentinfo">
                <h3>Student Information</h3>
                <?php
                    if($_SERVER['REQUEST_METHOD']=='GET'){
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
                    $read="SELECT * FROM BillInfo WHERE phone ='$phone';";
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
            }
                }
                ?>
            </div>
            <form class="form" action="generate-updatebill.php" method="post">
                <h3>Fill the Bill Information</h3>
                <input type="phone" name="phone" hidden value="<?=$phone;?>">
                <label for="desc">Description</label>
                <?php
                for($i=0;$i<$count;$i++){
                    echo "<input type='text' name='desc$i' value='".$desc[$i]."'/>";
                }

                ?>
                <input type="text" id="desc" name="desc<?=$count?>" placeholder="Enter a Bill title"/>
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