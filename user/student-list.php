<?php
    include_once "../assets/database/connection.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets//css/student-list.css">
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

        <section class="student-list-container main-container">
            <div class="student-list">
                <h3>Total Students</h3>
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
                            $read= "SELECT * FROM StudentInfo;";
                            // $result=$con->query($read)
                            if ($result=$con->query($read)) {
                                $num=0;
                                while ($row=$result->fetch_assoc()){
                                    $num++;
                                    // var_dump($row);
                                    $disp="<tr><td>$num</td>
                                    <td>Santosh Bhandari</td>
                                    <td>Kanakai-07</td>
                                    <td>Male</td>
                                    <td>santoshvandari100@gmail.com</td>
                                    <td>9824988945</td>
                                    <td>Namda Kumar Bhandari</td>
                                    <td>NULL</td>"; 
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
</script>
</html>