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
                       if($_SERVER["REQUEST_METHOD"]=="GET"){
                        if(isset($_GET["coursesuccess"])){
                            echo '<div class="message"><p class="success">Course Deleted Successfully!!</p></div>';
                        }
                        if(isset($_GET["coursefailure"])){
                            echo '<div class="message"><p class="failure">Failed To Delete Course !!</p></div>';
                        }
                    }

                ?>
                <table border="1">
                    <thead>
                        <tr>

                            <th>S.N.</th>
                            <th>Course ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $read= "SELECT * FROM CourseInfo ORDER BY cid;";
                            // $result=$con->query($read)
                            if ($result=$con->query($read)) {
                                $num=0;
                                while ($row=$result->fetch_assoc()){
                                    $num++;
                                    // var_dump($row);
                                    $disp="<tr><td>$num</td>
                                    <td>".$row['cid']."</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['price']."</td>
                                    <td><a href='edit-course.php?cid=".$row['cid']."'> Edit </a> | <a href='delete-course.php?cid=".$row['cid']."' onclick='return Check()'>Delete</a></td>";
                                    echo $disp;
                                    // <td><a href='edit-course.php?username=".$row['username']."'>Edit</a> | <a href='delete-admin.php?username=".$row['username']."'>Delete</a></td>"; 
                                }
                            }else{
                                echo "Error";
                            }
                        
                        
                        
                        ?>
                    </tbody>
                </table>
                <div class="btn-wrapper">
                    <button><a href="add-course.php">Add Course</a></button>
                </div>
            </div>
        </section>
    </main>
    <script>
        function Check(){
            if(confirm("Record Of Student & Bill Who are Enrolled in this course are also deleted.\nAre you sure to delete this course?")){
                return true;
            }else{
                return false;
            }
        
        }
    </script>
</body>
</html>