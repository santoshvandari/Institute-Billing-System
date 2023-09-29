<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user-dashboard.css"/>

</head>

<body>
    <?php
        session_start();
        if(!$_SESSION['username']){
            // echo "sesson not set yet";
            header("Location: user-login.php");
        }
    ?>
   <header>
    <nav>
        <div class="logo">Billing System</div>
        <div class="user-info">
            <div class="user">
                <div class="username"><?=$_SESSION['username'] ?></div>
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
            <li><a href="user-dashboard.html">Home</a></li>
            <li><a href="student-bill.html">Bill</a></li>
            <li><a href="student-list.html">Student</a></li>
            <li><a href="add-student.html">Add Student</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
           
    </section>
    <section class="main-container">
        
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. At voluptatibus consectetur nulla deleniti cupiditate asperiores ab quis. Incidunt quidem quam nisi, exercitationem culpa aliquid perferendis ullam. Ducimus ratione qui voluptate facilis quibusdam tempore? Enim ipsa corrupti id accusantium delectus similique veritatis, rerum, quisquam impedit numquam deleniti maxime, vel earum necessitatibus!



    </section>
   </main>
   <footer>
   </footer>
   </script>
</body>
</html>