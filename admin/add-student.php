<?php
    include_once "head.php";
?>
    <title>Add Student</title>
    <link rel="stylesheet" href="../assets/css/admin/common-style.css">
    <link rel="stylesheet" href="../assets/css/admin/add-student.css">
    <link rel="stylesheet" href="../assets/css/admin/message.css"/>
    <script defer src="../assets/js/HideMessage.js"></script>
    <script defer src="../assets/js/admin/StudentFormValidation.js"></script>
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
                        $cid=trim($_POST['course']);
                        if(!$email){
                            $email = "NULL";
                        }
                        $read="SELECT * FROM StudentInfo WHERE phone='$phone'";
                        if($result=$con->query($read)){
                            if($result->num_rows>0){
                                echo '<div class="message"><p class="failure">Phone Number Already Added!!</p></div>';
                            }else{
                                $insert = "INSERT  INTO StudentInfo values('$phone','$name','$address','$email','$gender','$parent','$cid');";
                                if($con->query($insert)){
                                    echo '<div class="message"><p class="success">Student Record Added Successfully!!</p></div>';
                                }else{
                                    echo '<div class="message"><p class="failure">Failed To Add Student Record!!</p></div>';
                                }
                            }
                        }
                    }
                }
            ?>
        <form class="form" method="post" onsubmit="return validateForm()">
            <h3>Fill the Student Information</h3>
            <label for="name">Full Name</label>
            <p class="errormsg name-error"></p>
            <input type="text" id="name" name="name" placeholder="Enter a Full Name"/>
            <label for="add">Address</label>
            <p class="errormsg address-error"></p>
            <input type="text" id="add" name="address" placeholder="Enter a Address"/>
            <label for="phone">Mobile Number</label>
            <p class="errormsg phone-error"></p>
            <input type="tel" name="phone" id="phone" placeholder="Enter a Phone Number"/>
            <label for="email">Email</label>
            <p class="errormsg email-error"></p>
            <input type="email" name="email" id="email" placeholder="Enter a Email"/>
            <div class="gender-wrapper">
                <label>Gender</label>
                <input type="radio" name="gender" value="male" checked/>Male
                <input type="radio" name="gender" value="female"/>Female
            </div>
            <label for="parent">Parent Name</label>
            <p class="errormsg parentname-error"></p>
            <input type="text" name="parent" id="parent" placeholder="Enter a Parent Name"/> 
            <label for="course">Course</label>
            <p class="errormsg course-error"></p>
            <select name="course" id="course">
                <option value="">Select a Course</option>
                <?php
                    $read="SELECT * FROM CourseInfo";
                    if($result=$con->query($read)){
                        var_dump($result);
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                echo "<option value='{$row['cid']}'>{$row['cname']}</option>";
                            }
                        }else{
                            echo "<script>alert('Please Add Course First');
                             location.href='course-list.php';</script>";
                           
                        }
                    }
                ?>
            </select>
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