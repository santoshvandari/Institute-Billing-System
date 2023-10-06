<?php
    include_once "head.php";
?>
    <title>Admin List</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets//css/student-list.css">
    <link rel="stylesheet" href="../assets/css/message.css">
    <script defer src="../assets/js/HideMessage.js"></script>


<style>
.btn-wrapper{
    margin: 20px 0;
    text-align:right;
}
.btn-wrapper button{
    margin-right:20px;
    background: #0d6efd;
    color:#fff;
    font-size: 20px;
    font-weight: 400;
    padding: 8px 20px;
    border: 1px solid #000;
    border-radius: 10px;
    cursor: pointer;
    transition: all .5s linear;
}
.btn-wrapper button:hover{
    background:#41464b;
}
.btn-wrapper button:active{
    background:transparent;
    color:#000;
}
button a{
    text-decoration:none;
    color:#fff;
}
</style>
<?php
    include_once "sidebar.php";
?>

        <section class="student-list-container main-container">
            <div class="student-list">
                <h3>Total Admins</h3>
                <?php
                       if($_SERVER["REQUEST_METHOD"]=="GET"){
                        if(isset($_GET["adminsuccess"])){
                            echo '<div class="message"><p class="success">Admin Deleted Successfully!!</p></div>';
                        }
                        if(isset($_GET["adminfailure"])){
                            echo '<div class="message"><p class="failure">Failed To Delete Admin !!</p></div>';
                        }
                    }

                ?>
                <table border="1">
                    <thead>
                        <tr>

                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $read= "SELECT * FROM AdminInfo ORDER BY name;";
                            // $result=$con->query($read)
                            if ($result=$con->query($read)) {
                                $num=0;
                                while ($row=$result->fetch_assoc()){
                                    $num++;
                                    // var_dump($row);
                                    $disp="<tr><td>$num</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['phone']."</td>
                                    <td>".$row['username']."</td>
                                    <td><a href='edit-admin.php?username=".$row['username']."'>Edit</a> | <a href='delete-admin.php?username=".$row['username']."'>Delete</a></td>"; 
                                    echo $disp;
                                }
                            }else{
                                echo "Error";
                            }
                        
                        
                        
                        ?>
                    </tbody>
                </table>
                <div class="btn-wrapper">
                    <button><a href="add-admin.php">Add Admin</a></button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>