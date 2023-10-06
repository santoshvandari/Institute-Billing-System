<?php
    include_once "head.php";
?>
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user/add-student.css">

</head>
<style>
    div.message p{
    margin: 20px  0;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    padding: 10px;
    }
    .success{
        background: lightgreen;
    }
    .failure{
        background: lightcoral;
    }
    .billMessage p{
        color: #fff;
    }


</style>
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
            <h4>Admin</h4>
            <ul class="side-option-list">
                <li><a href="admin-dashboard.php">Home</a></li>
                <li><a href="student-bill.php">Bill</a></li>
                <li><a href="student-list.php">Student</a></li>
                <li><a href="add-student.php">Add Student</a></li>
                <li><a href="user-list.php">Users</a></li>
                <li><a href="admin-list.php">Admins</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            </div> 
        </section>

    <section class="form-container main-container">
        <div class="form-wrapper">
            <?php
                if($_SERVER['REQUEST_METHOD']=='GET'){
                    if(isset($_GET["username"])){
                        $username = trim($_GET['username']);
                        $select = "SELECT * FROM UserInfo WHERE username = '$username';";
                        if($result = $con->query($select)){
                            while($row = $result->fetch_assoc()){
                                $username=trim($row['username']);
                                $name=trim($row['name']);
                                $email=trim($row['email']);
                                $phone=trim($row['phone']);
                                $password=trim($row['userpwd']);
                            };
                            
                        };
                    }
                }
                //        
                 if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['submit'])){
                        $name=trim($_POST['name']);
                        $phone=trim($_POST['phone']);
                        $email=trim($_POST['email']);
                        $username=trim($_GET['username']);
                        $password=trim($_POST['password']);
                        $update= "UPDATE UserInfo SET name = '$name', email = '$email', phone = '$phone', userpwd = '$password' WHERE username = '$username';";
                        
                        if($con->query($update)){
                            echo '<div class="message"><p class="success">User Updated Successfully!!</p></div>';
                            header("refresh:5; url=user-list.php");
                        }else{
                            echo '<div class="message"><p class="failure">Failed To Update  User !!</p></div>';
                        }
                    }
                }




            ?>
        <form class="form" method="post">
            <h3>Update the User Information</h3>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="<?=$name?>" required/>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=$email?>" required/>
            <label for="phone">Mobile Number</label>
            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" value="<?=$phone?>" required/>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?=$username?>" disabled required/> 
            <label for="userpassword">Password</label>
            <input type="text" name="password" id="userpassword" value="<?=$password?>"/>
            <div class="btn-wrapper">
                <button type="reset">Clear</button>
                <button type="submit" name="submit">Update</button>
            </div>
        </form>
        </div>
    </section>
    </main>
    <script>
        setTimeout(() => {
            const message = document.querySelector('.message').style.display="none";
        }, 5000);
    </script>
</body>
</html>