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
    <title>Student Bill</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user/student-bill.css">
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
                <h4>User Dashboard</h4>
                <ul class="side-option-list">
                    <li><a href="user-dashboard.php">Home</a></li>
                    <li><a href="student-bill.php">Bill</a></li>
                    <li><a href="student-list.php">Student</a></li>
                    <li><a href="add-student.php">Add Student</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </section>
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
                                                    
                                                    
                                                    $rows="";
                                                    $counter=0;
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
                                        // while($row=$result->fetch_assoc()){
                                        // echo $row["name"];
                                        // }
                                    }
                                }
                                }
                            ?>
                       
        </section>
    </main>
</body>
</html>