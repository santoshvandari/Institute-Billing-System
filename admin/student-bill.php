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
                        if(isset($_GET["phone"])){
                            $phone=$_GET["phone"];
                        }
                        if(isset($_POST['search'])){
                            if(isset($_POST['phone'])){
                                $phone=$_POST['phone'];
                            }
                        }
                        $read="SELECT * FROM StudentInfo,CourseInfo WHERE StudentInfo.cid=CourseInfo.cid AND  phone='$phone'";
                            if($result=$con->query($read)){
                                if($result->num_rows>0){
                                    while($row=$result->fetch_assoc()){
                                        echo ' <div class="userinfo-container">
                                        <div class="userinfo-wrapper">
                                            <div class="userinfo">
                                            <p> Name: '.$row['name'].'</p>
                                            <p> Address: '.$row['phone'].'</p>
                                            <p> Course: '.$row['cname'].'</p>
                                            </div>
                                            <div class="billinfo">
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
                                    if($result=$con->query($readbill)){
                                        if($result->num_rows>0){
                                            $num=0;
                                            while($row=$result->fetch_assoc()){
                                                $num++;
                                                echo "<tr><td>$num</td>
                                                <td>{$row['cname']}</td>
                                                <td>{$row['amount']}</td>
                                                <td>{$row['tdate']}</td>
                                                <td><a href='#'>View</a></td>";
                                            }
                                            
                                        }
                                    }
                                    echo "</table></div>";
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

                          


                            // echo '<div class="billinfo">
                            //                 <table border="1">
                            //                     <tr>
                            //                         <th>S.N.</th>
                            //                         <th>Course</th>
                            //                         <th>Paid</th>
                            //                         <th>Date</th>
                            //                         <th>Action</th>
                            //                     </tr>
                            //                     </table>
                            //                 </div>';



                            // if($result=mysqli_query($conn,$sql);
                            // if(mysqli_num_rows($result)>0){
                            //     while($row=mysqli_fetch_assoc($result)){
                            //         echo ' <div class="userinfo-container">
                            //         <div class="userinfo-wrapper">
                            //         <div class="userinfo">
                            //         <p> Name: '.$row['name'].'</p>
                            //         <p> Phone: '.$row['phone'].'</p>
                            //         <p> Bill: '.$row['bill'].'</p>
                            //         </div>
                            //         </div>
                            //         </div>';
                            //     }
                            // }
                        }
                    // }
                                                    // echo ' <div class="userinfo-container">
                                                    // <div class="userinfo-wrapper">
                                                    // <div class="userinfo">
                                                    // <p> Soryy! No Record Found</p>
                                                    // </div>
                                                    // </div>
                                                    // </div>';
                            ?>
                       
        </section>
    </main>
</body>
</html>