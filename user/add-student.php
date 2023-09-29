<?php
    include_once "../assets/database/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets//css/add-student.css">
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
            <h4>User Dashboard</h4>
            <ul class="side-option-list">
                <li><a href="user-dashboard.php">Home</a></li>
                <li><a href="student-bill.php">Bill</a></li>
                <li><a href="student-list.php">Student</a></li>
                <li><a href="add-student.php">Add Student</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
            </div> 
        </section>

    <section class="form-container main-container">
        <div class="form-wrapper">
            <?php
                 if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['submit'])){
                        $name=trim($_POST['name']);
                        $address=trim($_POST['address']);
                        $phone=trim($_POST['phone']);
                        $email=trim($_POST['email']);
                        $gender=trim($_POST['gender']);
                        $parent=trim($_POST['parent']);
                        if(!$email){
                            $email = "NULL";
                        }
                        $insert = "INSERT  INTO StudentInfo values('$phone','$name','$address','$email','$gender','$parent');";
                        if($con->query($insert)){
                            echo '<div class="message"><p class="success">Student Record Added Successfully!!</p></div>';
                        }else{
                            echo '<div class="message"><p class="failure">Failed To Add Student Record!!</p></div>';
                        }
                    }
                }




            ?>
        <form class="form" method="post">
            <h3>Fill the Student Information</h3>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter a Full Name" required/>
            <label for="add">Address</label>
            <input type="text" id="add" name="address" placeholder="Enter a Address" required/>
            <label for="phone">Mobile Number</label>
            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder="Enter a Phone Number" required/>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter a Email"/>
            <div class="gender-wrapper">
                <label>Gender</label>
                <input type="radio" name="gender" value="male" checked/>Male
                <input type="radio" name="gender" value="female"/>Female
            </div>
            <label for="parent">Parent Name</label>
            <input type="text" name="parent" id="parent" placeholder="Enter a Parent Name" required/> 
            <div class="btn-wrapper">
                <button type="reset">Clear</button>
                <button type="submit" name="submit">Submit</button>
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