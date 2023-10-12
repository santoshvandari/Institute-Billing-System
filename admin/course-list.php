<?php
    include_once "head.php";
?>
        <link rel="stylesheet" href="../assets/css/common-style.css">
        <link rel="stylesheet" href="../assets//css/student-list.css">
        <link rel="stylesheet" href="../assets/css/message.css">
        <link rel="stylesheet" href="../assets/css/admin/ButtonDesign.css">
        <script defer src="../assets/js/HideMessage.js"></script>
    <title>Course</title>
</head>
<?php
    include_once "sidebar.php";
?>
        <section class="student-list-container main-container">
            <div class="student-list">
                <h3>Total Course</h3>
                <?php
                    //    if($_SERVER["REQUEST_METHOD"]=="GET"){
                    //     if(isset($_GET["adminsuccess"])){
                    //         echo '<div class="message"><p class="success">Admin Deleted Successfully!!</p></div>';
                    //     }
                    //     if(isset($_GET["adminfailure"])){
                    //         echo '<div class="message"><p class="failure">Failed To Delete Admin !!</p></div>';
                    //     }
                    // }

                ?>
                <table border="1">
                    <thead>
                        <tr>

                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Computer Basic</td>
                            <td>5000</td>
                            <td>Edit | Delete</td>
                        </tr> 
                        <tr>
                            <td>1</td>
                            <td>Computer Basic</td>
                            <td>5000</td>
                            <td>Edit | Delete</td>
                        </tr>
                         <tr>
                            <td>1</td>
                            <td>Computer Basic</td>
                            <td>5000</td>
                            <td>Edit | Delete</td>
                        </tr> 
                        <tr>
                            <td>1</td>
                            <td>Computer Basic</td>
                            <td>5000</td>
                            <td>Edit | Delete</td>
                        </tr> 
                        <tr>
                            <td>1</td>
                            <td>Computer Basic</td>
                            <td>5000</td>
                            <td>Edit | Delete</td>
                        </tr>
                        <?php
                            
                            // $read= "SELECT * FROM AdminInfo ORDER BY name;";
                            // $result=$con->query($read)
                            // if ($result=$con->query($read)) {
                            //     $num=0;
                            //     while ($row=$result->fetch_assoc()){
                            //         $num++;
                            //         // var_dump($row);
                            //         $disp="<tr><td>$num</td>
                            //         <td>".$row['name']."</td>
                            //         <td>".$row['email']."</td>
                            //         <td>".$row['phone']."</td>
                            //         <td>".$row['username']."</td>
                            //         <td><a href='edit-admin.php?username=".$row['username']."'>Edit</a> | <a href='delete-admin.php?username=".$row['username']."'>Delete</a></td>"; 
                            //         echo $disp;
                            //     }
                            // }else{
                            //     echo "Error";
                            // }
                        
                        
                        
                        ?>
                    </tbody>
                </table>
                <div class="btn-wrapper">
                    <button><a href="add-course.php">Add Course</a></button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>


</body>
</html>