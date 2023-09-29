<?php
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
    <link rel="stylesheet" href="../assets//css/student-bill.css">
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
            <div class="userinfo-container">
                <div class="userinfo-wrapper">
                    <div class="userinfo">
                    <?php
                                if($_SERVER['REQUEST_METHOD']=='POST'){
                                    $phone=trim($_POST["phone"]);
                                    $read="SELECT * FROM "
                                    // select * from StudentInfo,BillInfo WHERE StudentInfo.phone = BillInfo.phone;

                                }
                            ?>
                        <p>Name: Santosh Bhandari</p>
                        <p>Address: Kanakai-07</p>
                        <p>Number: 9824988945</p>
                    </div>
                    <div class="billinfo">
                        <table border='1'>
                            <tr>
                                <th>S.N.</th>
                                <th>Description</th>
                                <th>Paid Amount</th>
                            </tr>
                            <?php
                                // if($_SERVER['REQUEST_METHOD']=='POST'){
                                //     $phone=trim($_POST["phone"]);
                                //     $read="SELECT * "

                                // }
                            ?>



                            <tr>
                                <td>1</td>
                                <td>Computer Basic</td>
                                <td>5000</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="btn">
                    <button>Bill</button>
                </div>
            </div>
        </section>
    </main>
</body>

</html>