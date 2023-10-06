<?php
    include_once "head.php";
?>
    <title>Student List</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/student-list.css">
    <script src="../assets/js/user/NameSearch.js"></script>
<?php
    include_once "sidebar.php";
?>
        <section class="student-list-container main-container">
            <div class="student-list">
                <h3>Total Students</h3>
                <div class="search-option">
                        <form>
                            <input type="text" name="name" id="name" placeholder="Search by Name" />
                        </form>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $read= "SELECT * FROM StudentInfo ORDER BY name;";
                            // $result=$con->query($read)
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
                                    <td><a href='student-bill.php?phone=".$row['phone']."'>Bill</a></td>"; 
                                    echo $disp;
                                }
                            }else{
                                echo "Error";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>