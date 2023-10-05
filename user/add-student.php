<?php
    include_once "head.php";
?>
    <title>Add Student</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user/add-student.css">
    <link rel="stylesheet" href="../assets/css/message.css">
    <script defer src="../assets/js/user/HideMessage.js"></script>
<?php
    include_once "sidebar.php";
?>

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

</body>
</html>