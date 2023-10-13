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
                        $phone=null;
                        if($_SERVER["REQUEST_METHOD"]=="GET"){
                            if(isset($_GET["phone"])){
                                $phone=$_GET["phone"];
                            }
                        }
                        if($_SERVER["REQUEST_METHOD"]=="POST"){
                            if(isset($_POST['search'])){
                                if(isset($_POST['phone'])){
                                    $phone=$_POST['phone'];
                                }
                            }
                        }
                        $read="SELECT * FROM StudentInfo,CourseInfo WHERE StudentInfo.cid=CourseInfo.cid AND  phone='$phone'";
                            if($result=$con->query($read)){
                                if($result->num_rows>0){
                                    while($row=$result->fetch_assoc()){
                                        $courseprice=(int)$row['price'];
                                        echo ' <div class="userinfo-container">
                                        <div class="userinfo-wrapper">
                                            <div class="userinfo">
                                            <p> Name: '.$row['name'].'</p>
                                            <p> Address: '.$row['phone'].'</p>
                                            <p> Course: '.$row['cname'].'</p>
                                            </div>
                                            <div class="billinfo">
                                            <h3>Payment Statement</h3>
                                            <table border="1">
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th>Course</th>
                                                    <th>Paid</th>
                                                    <th>DateTime</th>
                                                    <th>Action</th>
                                                </tr>';
                                        
                                    }
                                    $readbill="SELECT * FROM BillInfo,CourseInfo WHERE BillInfo.cid=CourseInfo.cid AND  phone='$phone'";
                                    $totalpaid=0;
                                    if($result=$con->query($readbill)){
                                        if($result->num_rows>0){
                                            $num=0;
                                            while($row=$result->fetch_assoc()){
                                                $num++;
                                                $totalpaid+=(int)$row['amount'];
                                                $courseprice=(int)$row['price'];
                                                $date=$row['tdate'];
                                                echo "<tr><td>$num</td>
                                                <td>{$row['cname']}</td>
                                                <td>{$row['amount']}</td>
                                                <td>{$row['tdate']}</td>
                                                <td><a href='edit-bill.php?phone={$phone}&date={$date}'>Edit</a> | <a href='delete-bill.php?phone={$phone}&date={$date}'>Delete</a> | <a href='view-bill.php?phone={$phone}&date={$date}'>View</a></td>";
                                            }
                                           
                                        }
                                    }
                                        $dueamount=$courseprice-$totalpaid;
                                        echo "
                                        <tr>
                                        <td colspan='4'><strong>Total Fee</strong></td>
                                        <td><strong>{$courseprice}</strong></td>

                                        </tr>
                                        <tr>
                                        <td colspan='4'><strong>Due Amount</strong></td>
                                        <td><strong>{$dueamount}</strong></td>
                                        
                                        </tr>
                                        <tr>
                                        <td colspan='4'><strong>Total Paid</strong></td>
                                        <td><strong>{$totalpaid}</strong></td>
                                        
                                        </tr>
                                        ";
                                    echo "</table></div></div>";
                                    echo '<div class="btn">
                                    <button><a href="studentbillform.php?phone='.$phone.'">Add Bill</a></button>
                                    </div>';
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
                            ?>
                       
        </section>
    </main>
</body>
</html>