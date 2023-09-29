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
                <form action="#">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" id="phone" pattern="[0-9]{10}" required/>
                    <button type="submit">Search</button>
                </form> 
            </div>
            <!-- <div class="bill-container">
                <div class="table-container">
                    <table border="1">
                        <tr>
                            <td colspan="6">
                                Institute In fo
                            </td>
                        </tr>
                    </table>
                </div>
            </div> -->
        </section>
        </main>
</body>
</html>