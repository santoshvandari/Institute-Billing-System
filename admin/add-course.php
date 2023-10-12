<?php
    include_once "head.php";
?>
    <title>Add Course</title>
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
                //         if(!$email){
                //             $email = "NULL";
                //         }
                //         $read="SELECT * FROM StudentInfo WHERE phone='$phone'";
                //         if($result=$con->query($read)){
                //             if($result->num_rows>0){
                //                 echo '<div class="message"><p class="failure">Phone Number Already Added!!</p></div>';
                //                 // echo "<script>alert('Phone Number Already Added')</script>";
                //             }else{
                //                 $insert = "INSERT  INTO StudentInfo values('$phone','$name','$address','$email','$gender','$parent');";
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




            ?>
        <form class="form" method="post">
            <h3>Fill Course Information</h3>
            <label for="cid">Course ID</label>
            <input type="text" id="cid" name="cid" placeholder="Enter a Course ID" required/>
            <label for="cname">Course Name</label>
            <input type="text" id="cname" name="cname" placeholder="Enter a Course Name" required/>
            <label for="price">Address</label>
            <input type="number" id="price" name="price" placeholder="Enter a Price" required/>
            <label for="phone">Mobile Number</label>
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