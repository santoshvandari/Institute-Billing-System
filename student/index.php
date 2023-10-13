<?php
        include_once "../assets/database/connection.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="../assets/css/common-style.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/student-bill.css"> -->
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
            <form action="#">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required />
                <label for="phone">Phone: </label>
                <input type="text" name="phone" id="phone" pattern="[0-9]{10}" required />
                <button type="submit" name="submit">Find</button>
            </form>
        </section>
        <!-- <section class="studentinfo">
        <?php
                //    if($_SERVER['REQUEST_METHOD']=='POST' || $_SERVER['REQUEST_METHOD']=='GET'){
                //         $phone=null;
                //         if($_SERVER["REQUEST_METHOD"]=="GET"){
                //             if(isset($_GET["phone"])){
                //                 $phone=$_GET["phone"];
                //             }
                //         }
                //         if($_SERVER["REQUEST_METHOD"]=="POST"){
                //             if(isset($_POST['search'])){
                //                 if(isset($_POST['phone'])){
                //                     $phone=$_POST['phone'];
                //                 }
                //             }
                //         }
                //         $read="SELECT * FROM StudentInfo,CourseInfo WHERE StudentInfo.cid=CourseInfo.cid AND  phone='$phone'";
                //             if($result=$con->query($read)){
                //                 if($result->num_rows>0){
                //                     while($row=$result->fetch_assoc()){
                //                         $courseprice=(int)$row['price'];
                //                         echo ' <div class="userinfo-container">
                //                         <div class="userinfo-wrapper">
                //                             <div class="userinfo">
                //                             <p> Name: '.$row['name'].'</p>
                //                             <p> Address: '.$row['phone'].'</p>
                //                             <p> Course: '.$row['cname'].'</p>
                //                             </div>
                //                             <div class="billinfo">
                //                             <h3>Payment Statement</h3>
                //                             <table border="1">
                //                                 <tr>
                //                                     <th>S.N.</th>
                //                                     <th>Course</th>
                //                                     <th>Paid</th>
                //                                     <th>DateTime</th>
                //                                     <th>Action</th>
                //                                 </tr>';
                                        
                //                     }
                //                     $readbill="SELECT * FROM BillInfo,CourseInfo WHERE BillInfo.cid=CourseInfo.cid AND  phone='$phone'";
                //                     $totalpaid=0;
                //                     if($result=$con->query($readbill)){
                //                         if($result->num_rows>0){
                //                             $num=0;
                //                             while($row=$result->fetch_assoc()){
                //                                 $num++;
                //                                 $totalpaid+=(int)$row['amount'];
                //                                 $courseprice=(int)$row['price'];
                //                                 echo "<tr><td>$num</td>
                //                                 <td>{$row['cname']}</td>
                //                                 <td>{$row['amount']}</td>
                //                                 <td>{$row['tdate']}</td>
                //                                 <td><a href='#'>Edit</a> | <a href='#'>Delete</a> | <a href='#'>View</a></td>";
                //                             }
                                           
                //                         }
                //                     }
                //                         $dueamount=$courseprice-$totalpaid;
                //                         echo "
                //                         <tr>
                //                         <td colspan='4'><strong>Total Fee</strong></td>
                //                         <td><strong>{$courseprice}</strong></td>

                //                         </tr>
                //                         <tr>
                //                         <td colspan='4'><strong>Due Amount</strong></td>
                //                         <td><strong>{$dueamount}</strong></td>
                                        
                //                         </tr>
                //                         <tr>
                //                         <td colspan='4'><strong>Total Paid</strong></td>
                //                         <td><strong>{$totalpaid}</strong></td>
                                        
                //                         </tr>
                //                         ";
                //                     echo "</table></div></div>";
                //                     echo '<div class="btn">
                //                     <button><a href="studentbillform.php?phone='.$phone.'">Add Bill</a></button>
                //                     </div>';
                //                 }else{
                //                     echo ' <div class="userinfo-container">
                //                                     <div class="userinfo-wrapper">
                //                                     <div class="userinfo">
                //                                     <p> Soryy! No Record Found</p>
                //                                     </div>
                //                                     </div>
                //                                     </div>';
                //                 }
                //             }
                //         }
                            ?> -->
        <section class="studentinfo">
            <h3>Student Information</h3>
            <div class="infowrapper">
                <p>Name: Santosh Bhandari</p>
                <p>Address: Kanakai-07</p>
                <p>Course: Computer Basic</p>
            </div>
        </section>
        <section class="billinfo">
            <h3>Payment Information</h3>
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
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Computer Basic</td>
                        <td>5000</td>
                        <td>2058-10-10</td>
                        <td>View</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Computer Basic</td>
                        <td>5000</td>
                        <td>2058-10-10</td>
                        <td>View</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Computer Basic</td>
                        <td>5000</td>
                        <td>2058-10-10</td>
                        <td>View</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Computer Basic</td>
                        <td>5000</td>
                        <td>2058-10-10</td>
                        <td>View</td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Total Paid Amount</strong></td>
                        <td><strong>5000</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Due Amount</strong></td>
                        <td><strong>1000</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Total Amount</strong></td>
                        <td><strong>6000</strong></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <!-- <section class="main-container">
                <div class="search-option">
                    <form method="POST">
                        <label for="phone">Phone Number:</label>
                        <input type="text" name="phone" id="phone" pattern="[0-9]{10}" required />
                        <button type="submit" name='search'>Search</button>
                    </form>
                </div> -->
</body>

</html>