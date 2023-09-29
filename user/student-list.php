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
                <table border="1">
                    <thead>
                        <tr>

                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Santosh Bhandari</td>
                            <td>Male</td>
                            <td>Kanakai-07</td>
                            <td>9824988945</td>
                        </tr> 
                             <tr>
                            <td>1</td>
                            <td>Santosh Bhandari</td>
                            <td>Male</td>
                            <td>Kanakai-07</td>
                            <td>9824988945</td>
                        </tr>    
                           <tr>
                            <td>1</td>
                            <td>Santosh Bhandari</td>
                            <td>Male</td>
                            <td>Kanakai-07</td>
                            <td>9824988945</td>
                        </tr>      
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</script>
</html>