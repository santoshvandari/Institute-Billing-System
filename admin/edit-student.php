<?php
    include_once "head.php";
?>
    <title>Edit Student</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user/add-student.css">
    <link rel="stylesheet" href="../assets/css/message.css">
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
                    if(isset($_GET["phone"])){
                        $phone = trim($_GET['phone']);
                        $select = "SELECT * FROM StudentInfo WHERE phone = '$phone';";
                        if($result = $con->query($select)){
                            while($row = $result->fetch_assoc()){
                                $name=trim($row['name']);
                                $address=trim($row['address']);
                                $email=trim($row['email']);
                                if($email=='NULL'){
                                    $email="";
                                }
                                $gender=trim($row['gender']);
                                $parent=trim($row['parentname']);
                            };
                            
                        };
                    }
                }
                if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['submit'])){
                        $name=trim($_POST['name']);
                        $address=trim($_POST['address']);
                        $email=trim($_POST['email']);
                        $phone=trim($_GET['phone']);
                        $gender=trim($_POST['gender']);
                        $parent=trim($_POST['parent']);
                        if(!$email){
                            $email = "NULL";
                        }
                        $update = "UPDATE  StudentInfo SET name = '$name', address = '$address', email = '$email', gender = '$gender', parentname = '$parent' WHERE phone = '$phone';";
                        // echo $update;
                        if($con->query($update)){
                            echo '<div class="message"><p class="success">Student Record Updated Successfully!!</p></div>';
                            header("refresh:5; url=student-list.php");
                        }else{
                            echo '<div class="message"><p class="failure">Failed To Updated Student Record!!</p></div>';
                        }
                    }
                }

            ?>
        <form class="form" method="post">
            <h3>Update the Student Information</h3>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="<?=$name?>" required/>
            <label for="add">Address</label>
            <input type="text" id="add" name="address" value="<?=$address?>" required/>
            <label for="phone">Mobile Number</label>
            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" value="<?=$phone?>" disabled required/>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=$email?>"/>
            <div class="gender-wrapper">
                <label>Gender</label>
                <?php
                    if($gender=="male"){
                        echo '<input type="radio" name="gender" value="male" checked/>Male
                        <input type="radio" name="gender" value="female"/>Female';
                    }else{
                        echo '<input type="radio" name="gender" value="male"/>Male
                        <input type="radio" name="gender" value="female" checked/>Female';
                    }
                ?>
                </div>
            <label for="parent">Parent Name</label>
            <input type="text" name="parent" id="parent" value="<?=$parent?>" required/> 
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