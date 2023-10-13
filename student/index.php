<?php
        include_once "../assets/database/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>
    <link rel="stylesheet" href="../assets/css/student/style.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <p>Billing System</p>
            </div>
            <ul>
                <li><a href="../admin/admin-login.php">Admin Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="studentform">
            <h3>Find Bill Information</h3>
            <form method="POST">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required />
                <label for="phone">Phone: </label>
                <input type="text" name="phone" id="phone" pattern="[0-9]{10}" required />
                <button type="submit" name="submit">Find</button>
            </form>
        </section>
        <?php
            $flag="Temp";
            if($_SERVER["REQUEST_METHOD"]=="POST" || $_SERVER['REQUEST_METHOD']=='GET'){
                if((isset($_GET['name']) && isset($_GET['phone'])) || (isset($_POST["name"]) && isset($_POST['phone']))){
                    $flag=false;
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        $name=trim($_POST["name"]);
                        $phone=trim($_POST["phone"]);
                    }
                    if($_SERVER['REQUEST_METHOD']=='GET'){
                        $name=trim($_GET['name']);
                        $phone=trim($_GET['phone']);
                    }
                    $read="SELECT * FROM StudentInfo,CourseInfo WHERE StudentInfo.cid=CourseInfo.cid AND name='$name' AND phone='$phone'";
                    if($result=$con->query($read)){
                        if($result->num_rows>0){
                            $flag=true;
                            while($row=mysqli_fetch_assoc($result)){
                            $name=$row["name"];
                            $address=$row["address"];
                            $course=$row["cname"];
                            $price=$row['price'];
                        }
                    }
                }
                }
            }
        
        ?>
        <section class="studentinfo">
            <?php
                if($flag===true){
                   echo '<h3>Student Information</h3>
                    <div class="infowrapper">
                        <p>Name: '.$name.'</p>
                        <p>Address: '.$address.'</p>
                        <p>Course: '.$course.'</p>
                    </div>';
                }else if($flag===false){
                    echo '<h3>Student Information</h3>
                    <div class="infowrapper">
                        <p>No Record Found</p>
                    </div>';
                }
            ?>
        </section>
        <section class="billinfo">
            <?php
            if($flag===true){
                echo '<h3>Payment Information</h3>
                <table border="1">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Course</th>
                        <th>Paid Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
                $read="SELECT * FROM BillInfo WHERE phone='$phone'";
                if($result=$con->query($read)){
                    $totalpaidamount=0;
                    if($result->num_rows>0){
                        $num=0;
                        while($row=$result->fetch_assoc()){
                            $num++;
                            $totalpaidamount+=(int)$row['amount'];
                           echo '<tr>
                            <td>'.$num.'</td>
                            <td>'.$course.'</td>
                            <td>'.(int)$row['amount'].'</td>
                            <td>'.$row['tdate'].'</td>
                            <td><a href="view-bill.php?phone='.$phone.'&date='.$row['tdate'].'">View</a></td>
                            </tr>';
                        }
                    }
                }
                echo '
                    <tr>
                    <td colspan="4"><strong>Total Fee</strong></td>
                        <td><strong>'.(int)$price.'</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Due Amount</strong></td>
                        <td><strong>'.($price-$totalpaidamount).'</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Total Paid Amount</strong></td>
                        <td><strong>'.$totalpaidamount.'</strong></td>
                    </tr>
                </tbody>
            </table>';
        }
            ?>
        </section>
    </main>
</body>
</html>