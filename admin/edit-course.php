<?php
    include_once "head.php";
?>
    <title>Update Course</title>
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
                 if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['submit'])){
                        $cid = trim($_GET['cid']);
                        $cname = trim($_POST['cname']);
                        $price= trim($_POST['price']);
                        // $update= "UPDATE AdminInfo SET name = '$name', email = '$email', phone = '$phone', adminpwd = '$password' WHERE username = '$username';";
                        $update="UPDATE CourseInfo SET cname='$cname',price=$price WHERE cid='$cid';";
                        if($result=$con->query($update)){
                            echo '<div class="message"><p class="success">Course Updated Successfully!!</p></div>';
                            header("Refresh: 5; URL=course-list.php");
                        }else{
                            echo '<div class="message"><p class="failure">Failed To Update Course!!</p></div>';
                        }
                    }
                }
                if($_SERVER['REQUEST_METHOD']=='GET'){
                    if(isset($_GET['cid'])){
                        $cid=trim($_GET["cid"]);
                        $read="SELECT * FROM CourseInfo WHERE cid='$cid';";
                        if($result=$con->query($read)){
                            while($row=$result->fetch_assoc()){
                                $cname=$row['cname'];
                                $price=$row['price'];
                            }
                        }
                    }else{
                        header("Location:course-list.php");
                    }
                }
            ?>
        <form class="form" method="post">
            <h3>Update Course Information</h3>
            <label for="cid">Course ID</label>
            <input type="text" id="cid" name="cid" value='<?=$cid?>' required disabled/>
            <label for="cname">Course Name</label>
            <input type="text" id="cname" name="cname" value='<?=$cname?>' required/>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" value='<?=$price?>' required/>
            <div class="btn-wrapper">
                <button type="reset">Clear</button>
                <button type="submit" name="submit">Update</button>
            </div>
        </form>
        </div>
    </section>
    </main>
</body>
</html>