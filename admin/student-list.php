<?php
    include_once "head.php";
?>
    <title>Student List</title>
    <link rel="stylesheet" href="../assets/css/admin/common-style.css">
    <link rel="stylesheet" href="../assets/css/admin/student-list.css">
    <link rel="stylesheet" href="../assets/css/admin/ButtonDesign.css">
    <link rel="stylesheet" href="../assets/css/admin/message.css"/>
    <script defer src="../assets/js/HideMessage.js"></script>
    <script defer src="../assets/js/admin/NameSearch.js"></script>
<?php
    include_once "sidebar.php";
?>

        <section class="student-list-container main-container">
            <div class="student-list">
                <h3>Total Students</h3>
                <?php
                       if($_SERVER["REQUEST_METHOD"]=="GET"){
                        if(isset($_GET["studentsuccess"])){
                            echo '<div class="message"><p class="success">Student Deleted Successfully!!</p></div>';
                        }
                        if(isset($_GET["studentfailure"])){
                            echo '<div class="message"><p class="failure">Failed To Delete Student !!</p></div>';
                        }
                    }

                ?>
                    <div class="search-option">
                        <div class="form">
                            <input type="text" name="name" id="namesearch" placeholder="Search by Name" />
                        </div>
                    </div>
                <table border="1">
                    <thead>
                        <tr>

                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Parent Name</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $read = "SELECT * FROM StudentInfo,CourseInfo WHERE StudentInfo.cid=CourseInfo.cid ORDER BY StudentInfo.name;";
                            if ($result=$con->query($read)) {
                                $num=0;
                                while ($row=$result->fetch_assoc()){
                                    $num++;
                                    $disp="<tr><td>$num</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['address']."</td>
                                    <td>".$row['gender']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['phone']."</td>
                                    <td>".$row['parentname']."</td>
                                    <td>".$row['cname']."</td>
                                    <td><a href='student-bill.php?phone=".$row['phone']."'>Bill</a> | <a href='edit-student.php?phone=".$row['phone']."'>Edit</a> | <a href='delete-student.php?phone=".$row['phone']."' onclick='return Check()'>Delete</a></td>"; 
                                    echo $disp;
                                }
                            }else{
                                echo "Error";
                            }
                        ?>
                    </tbody>
                </table>
                <div class="btn-wrapper">
                    <button><a href="add-student.php">Add Student</a></button>
                </div>
            </div>
        </section>
    </main>
</body>
<script>
        function Check(){
            if(confirm("Bill Record of this Student are also deleted.\nAre you sure to delete this Student Record?")){
                return true;
            }else{
                return false;
            }
        
        }
    </script>
</html>