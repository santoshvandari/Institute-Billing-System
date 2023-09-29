<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user-dashboard.css"/>
    <link rel="stylesheet" href="../assets/css/generate-bill.css">
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
        <h4>User</h4>
        <ul class="side-option-list">
            <li><a href="user-dashboard.php">Home</a></li>
            <li><a href="student-bill.php">Bill</a></li>
            <li><a href="student-list.php">Student</a></li>
            <li><a href="add-student.php">Add Student</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
           
    </section>
    <section class="main-container main-bill-container">
        <div class="bill-wrapper">
            <div class="bill-container">
                <hr>
                <div class="company-name">
                    <p>ABC Institute</p>
                </div>
                <hr>
                <div class="details-container">
                    <div class="billerinfo">
                        <p class="name">Name: Santosh Bhandari</p>
                        <p class="address">Address: Kanakai-07</p>
                        <p class="phone">Number: 9824xxxxxx</p>
    
                    </div>
                    <div class="billinfo">
                        <p class="date">Date: 2023-10-23</p>
                        <p class="time">Time: 10:45 AM</p>
                    </div>
                </div>
                <div class="billtable">
                    <table border="1">
                        <thead>
                            <th>S.N.</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Computer Basic</td>
                                <td>5000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Computer Programming</td>
                                <td>11000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Computer Networking</td>
                                <td>10000</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Computer Hardware</td>
                                <td>9000</td>
                            </tr>
                            <tr class="subtotal">
                                <td colspan="2">Subtotal</td>
                                <td colspan="2">52000</td>
                            </tr>
                            <tr class="discount">
                                <td colspan="2">Discount</td>
                                <td colspan="2">2000</td>
                            </tr>
                            <tr class="total">
                                <td colspan="2">Total Amount</td>
                                <td>50000</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="billoptions">
                        <button>Bill</button>
                        <button>Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
   </main>
   <footer>
   </footer>
</body>
</html>