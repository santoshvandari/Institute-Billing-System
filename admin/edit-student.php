<?php
    include_once "head.php";
?>
    <title>Add Student</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/add-student.css">
    <link rel="stylesheet" href="../assets/css/message.css"/>
    <script defer src="../assets/js/HideMessage.js"></script>
<?php
    include_once "sidebar.php";
?>

    <section class="form-container main-container">
        <div class="form-wrapper">
            <?php
                //  if ($_SERVER['REQUEST_METHOD']=='POST'){
                //     if(isset($_POST['submit'])){
                //         $name=trim($_POST['name']);
                //         $address=trim($_POST['address']);
                //         $phone=trim($_POST['phone']);
                //         $email=trim($_POST['email']);
                //         $gender=trim($_POST['gender']);
                //         $parent=trim($_POST['parent']);
                //         $cid=trim($_POST['course']);
                //         if(!$email){
                //             $email = "NULL";
                //         }
                //         $read="SELECT * FROM StudentInfo WHERE phone='$phone'";
                //         if($result=$con->query($read)){
                //             if($result->num_rows>0){
                //                 echo '<div class="message"><p class="failure">Phone Number Already Added!!</p></div>';
                //                 // echo "<script>alert('Phone Number Already Added')</script>";
                //             }else{
                //                 $insert = "INSERT  INTO StudentInfo values('$phone','$name','$address','$email','$gender','$parent','$cid');";
                //                 if($con->query($insert)){
                //                     echo '<div class="message"><p class="success">Student Record Added Successfully!!</p></div>';
                //                 }else{
                //                     echo '<div class="message"><p class="failure">Failed To Add Student Record!!</p></div>';
                //                 }
                //             }
                //         }
                        // $insert = "INSERT  INTO StudentInfo values('$phone','$name','$address','$email','$gender','$parent');";
                        // if($con->query($insert)){
                        //     echo '<div class="message"><p class="success">Student Record Added Successfully!!</p></div>';
                        // }else{
                        //     echo '<div class="message"><p class="failure">Failed To Add Student Record!!</p></div>';
                        // }
                //     }
                // }

                
                if ($_SERVER['REQUEST_METHOD']=='GET'){
                        if(isset($_GET["phone"])){
                            $phone=$_GET["phone"];
                            $read="SELECT * FROM StudentInfo,CourseInfo WHERE StudentInfo.cid=CourseInfo.cid AND phone='$phone'";
                            if($result=$con->query($read)){
                                while($result->fetch_assoc()){
                                    $name=$row['name'];
                                    $address=$row['address'];
                                    $email=$row['email'];
                                    if($email=='NULL'){
                                        $email="";
                                    }
                                    $gender=$row['gender'];
                                    $parentname=$row['parent'];
                                    $course=$row['cname'];
                                    $cid=$row['cid'];
                                }
                            }
                        }else{
                            header("location:student-list.php");
                        }
                }



            ?>
        <form class="form" method="post">
            <h3>Fill the Student Information</h3>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value='<?=$name?>' required/>
            <label for="add">Address</label>
            <input type="text" id="add" name="address"  value='<?=$address?>' required/>
            <label for="phone">Mobile Number</label>
            <input type="tel" name="phone" id="phone" value='<?=$phone?>' disabled/>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value='<?=$email?>'/>
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
            <input type="text" name="parent" id="parent" value='<?=?>' required/> 
            <label for="course">Course</label>
            <select name="course" id="course" value='<?=$course?>' required></select>
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