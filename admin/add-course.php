<?php
    include_once "head.php";
?>
    <title>Add Course</title>
    <link rel="stylesheet" href="../assets/css/admin/common-style.css">
    <link rel="stylesheet" href="../assets/css/admin/add-student.css">
    <link rel="stylesheet" href="../assets/css/admin/message.css"/>
    <script defer src="../assets/js/HideMessage.js"></script>
    <script defer src='../assets/js/admin/CourseFormValidation.js'></script>
<?php
    include_once "sidebar.php";
?>

    <section class="form-container main-container">
        <div class="form-wrapper">
            <?php
                 if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['submit'])){
                        $cid = trim($_POST['cid']);
                        $cname = trim($_POST['cname']);
                        $price= trim($_POST['price']);
                        $read="SELECT * FROM CourseInfo WHERE cid='$cid';";
                        if($result=$con->query($read)){
                            if($result->num_rows>0){
                                echo '<div class="message"><p class="failure">Course Already Added!!</p></div>';
                            }else{
                                $insert = "INSERT  INTO CourseInfo values('$cid','$cname',$price);";
                                if($con->query($insert)){
                                    echo '<div class="message"><p class="success">Course Added Successfully!!</p></div>';
                                    // header("Refresh: 5; URL=course-list.php");
                                }else{
                                    echo '<div class="message"><p class="failure">Failed To Add Course!!</p></div>';
                                }
                            }
                        }
                    }
                }
            ?>
        <form class="form" method="post" id='courseform'>
            <h3>Fill Course Information</h3>
            <label for="cid">Course ID</label>
            <!-- <p class="message">* cannot be empty</p> -->
            <input type="text" id="cid" name="cid" placeholder="Enter a Course ID" required/>
            <label for="cname">Course Name</label>
            <input type="text" id="cname" name="cname" placeholder="Enter a Course Name" required/>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" placeholder="Enter a Price" required/>
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