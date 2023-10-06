<?php
    include "head.php";
?>
    <title>Student Bill</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/student-bill.css">
<?php
    include_once "sidebar.php";
?>
        <section class="main-container">
            <div class="search-option">
                <form method="POST">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" id="phone" pattern="[0-9]{10}" required />
                    <button type="submit" name='search'>Search</button>
                </form>
            </div>
          
                    <?php
                                if($_SERVER['REQUEST_METHOD']=='POST' || $_SERVER['REQUEST_METHOD']=='GET'){
                
                                    if($_SERVER['REQUEST_METHOD']=='GET'){
                                        if(isset($_GET["phone"])){
                                            $phone=trim($_GET["phone"]);
                                        }else{
                                            $phone=null;
                                        }
                                    }

                                    if($_SERVER['REQUEST_METHOD']=='POST')
                                        $phone=trim($_POST["phone"]);
                                    if (empty($phone))
                                        $phone=Null;
                                    $read="SELECT * FROM StudentInfo, BillInfo WHERE StudentInfo.phone = BillInfo.phone AND StudentInfo.phone ='$phone';";
                                    // select * from StudentInfo,BillInfo WHERE StudentInfo.phone = BillInfo.phone;
                                    // var_dump($read);
                                    if($result=$con->query($read)){
                                        if($result->num_rows>0){
                                            $desctemp="";
                                            $amount=null;
                                            while($row=$result->fetch_assoc()){
                                                $name=$row["name"];
                                                $address=$row["address"];
                                                $phone=$row['phone'];
                                                $desctemp=$desctemp.$row["description"]."|";
                                                $amount+=(int)$row["amount"];
                                            }
                                            $desc=explode("|",$desctemp);
                                            $disp1=' <div class="userinfo-container">
                                            <div class="userinfo-wrapper">
                                                            <div class="userinfo">
                                                            
                                                            <p>Name: '.$name.'</p>
                                                            <p>Address: '.$address.'</p>
                                                            <p>Number: '.$phone.'</p>
                                                        </div>
                                                        <div class="billinfo">
                                                            <table border="1">
                                                                <tr>
                                                                    <th>S.N.</th>
                                                                    <th>Description</th>
                                                                </tr>';
                                                $counter=0;
                                                $rows="";
                                               
                                                    
                                                    foreach($desc as $value){
                                                        if (!empty($value)){
                                                            $counter++;
                                                            $rows = $rows. '<tr><td>'.$counter.'</td><td>'.$value.'</td></tr>';

                                                        }
                                                    }
                                                $disp2=$rows.'<tr><td><strong>Amount</strong></td><td><strong>'.$amount.'</strong></td></tr>';
                                                  
                                                $disp3='</table>
                                                        </div>
                                                        </div>
                                                        <div class="btn">
                                                            <button><a href="edit-bill.php?phone='.$phone.'">Edit Bill</a></button>
                                                            <button><a href="studentbillform.php?phone='.$phone.'">Add Bill</a></button>
                                                            </div>
                                                        </div>';
                                                echo $disp1."".$disp2."".$disp3;

                                        } else{
                                            $read="SELECT * FROM StudentInfo WHERE StudentInfo.phone ='$phone';";
                                            if($result=$con->query($read)){
                                                if($result->num_rows>0){
                                                    $desctemp="";
                                                    $amount=null;
                                                    while($row=$result->fetch_assoc()){
                                                        $name=$row["name"];
                                                        $address=$row["address"];
                                                        $phone=$row['phone'];
                                                        $disp=' <div class="userinfo-container">
                                                            <div class="userinfo-wrapper">
                                                                            <div class="userinfo">
                                                                            
                                                            <p>Name: '.$name.'</p>
                                                            <p>Address: '.$address.'</p>
                                                            <p>Number: '.$phone.'</p>
                                                        </div>
                                                        <div class="billinfo">
                                                            <table border="1">
                                                                <tr>
                                                                    <th>S.N.</th>
                                                                    <th>Description</th>
                                                                </tr>
                                                                </table>
                                                        </div>
                                                        </div>
                                                        <div class="btn">
                                                            <button><a href="studentbillform.php?phone='.$phone.'">Add Bill</a></button>
                                                            </div>
                                                        </div>
                                                                ';
                                                    
                                                    }
                                                    echo $disp;
                                                }else{     
                                                    echo ' <div class="userinfo-container">
                                                    <div class="userinfo-wrapper">
                                                    <div class="userinfo">
                                                    <p> Soryy! No Record Found</p>
                                                    </div>
                                                    </div>
                                                    </div>';
                                                }
                                        }
                                    }
                                }
                                }
                            ?>
                       
        </section>
    </main>
</body>
</html>