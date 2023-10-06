<?php
    include_once "head.php";
?>
    <title>Add Student</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/add-student.css">
    <link rel="stylesheet" href="../assets/css/message.css"/>
    <script src="../assets/js/HideMessage.js"></script>
<?php
    include_once "sidebar.php";
?>

    <section class="form-container main-container">
        <div class="form-wrapper">
            <?php
                 if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['submit'])){
                        $name=trim($_POST['name']);
                        $phone=trim($_POST['phone']);
                        $email=trim($_POST['email']);
                        $username=trim($_POST['username']);
                        $password=md5(trim($_POST['password']));
                        
                        $insert = "INSERT  INTO AdminInfo values('$username','$name','$email','$phone','$password');";
                        if($con->query($insert)){
                            echo '<div class="message"><p class="success">Admin Added Successfully!!</p></div>';
                        }else{
                            echo '<div class="message"><p class="failure">Failed To Add Admin !!</p></div>';
                        }
                    }
                }
            ?>
        <form class="form" method="post">
            <h3>Fill the Admin Information</h3>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter a Full Name" required/>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter a Email" required/>
            <label for="phone">Mobile Number</label>
            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder="Enter a Phone Number" required/>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter a Username" required/> 
            <label for="adminpassword">Password</label>
            <input type="text" name="password" id="adminpassword" placeholder="Enter a Password"/>
            <div class="btn-wrapper">
                <button type="reset">Clear</button>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
        </div>
    </section>
    </main>
</body>
</html>