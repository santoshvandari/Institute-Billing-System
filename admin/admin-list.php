<?php
    session_start();
    if(!$_SESSION['adminname']){
        // echo "sesson not set yet";
        header("Location: admin-login.php");
    }
    include_once "../assets/database/connection.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets//css/user/student-list.css">
</head>

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
                    <div class="username"><?=$_SESSION["adminname"]?></div>
                    <div class="user-img"><img src="../img/img.jpg" alt=""></div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="side-option">
            <div class="side-option-container">
            <h4>Admin</h4>
                <ul class="side-option-list">
                    <li><a href="admin-dashboard.php">Home</a></li>
                    <li><a href="student-bill.php">Bill</a></li>
                    <li><a href="student-list.php">Student</a></li>
                    <li><a href="add-student.php">Add Student</a></li>
                    <li><a href="user-list.php">Users</a></li>
                <li><a href="admin-list.php">Admins</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </section>

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
<script>
        setTimeout(() => {
            const message = document.querySelector('.message').style.display="none";
        }, 5000);
    </script>
</html>