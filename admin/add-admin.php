<?php
    include_once "head.php";
?>
    <title>Add Admin</title>
    <link rel="stylesheet" href="../assets/css/admin/common-style.css">
    <link rel="stylesheet" href="../assets/css/admin/add-student.css">
    <link rel="stylesheet" href="../assets/css/admin/message.css"/>
    <script defer src="../assets/js/admin/AdminFormValidation.js"></script>
    <script defer src="../assets/js/HideMessage.js"></script>
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
                        $read="SELECT * FROM AdminInfo WHERE username='$username';";
                        if($result=$con->query($read)){
                            if($result->num_rows>0){
                                echo '<div class="message"><p class="failure">Selected Admin Username Already Added !!</p></div>';
                            }else{
                                $insert = "INSERT  INTO AdminInfo values('$username','$name','$email','$phone','$password');";
                                if($con->query($insert)){
                                    echo '<div class="message"><p class="success">Admin Added Successfully!!</p></div>';
                                }else{
                                    echo '<div class="message"><p class="failure">Failed To Add Admin !!</p></div>';
                                }
                            }
                        }
                    }
                }
            ?>
        <form class="form" method="post" onsubmit='return validateForm()'>
            <h3>Fill the Admin Information</h3>
            <label for="name">Full Name</label>
            <p class="errormsg name-error"></p>
            <input type="text" id="name" name="name" placeholder="Enter a Full Name"/>
            <label for="email">Email</label>
            <p class="errormsg email-error"></p>
            <input type="email" name="email" id="email" placeholder="Enter a Email"/>
            <label for="phone">Mobile Number</label>
            <p class="errormsg phone-error"></p>
            <input type="tel" name="phone" id="phone" placeholder="Enter a Phone Number"/>
            <label for="username">Username</label>
            <p class="errormsg username-error"></p>
            <input type="text" name="username" id="username" placeholder="Enter a Username"/> 
            <label for="adminpassword">Password</label>
            <p class="errormsg password-error"></p>
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