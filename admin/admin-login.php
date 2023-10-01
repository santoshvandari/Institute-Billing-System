<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/login.css" />
</head>
<style>
     form p {
        color: red;
    }
</style>
<body>

        <?php
                include_once "../assets/database/connection.php";
                session_start();
                        if(!empty($_SESSION['username'])){
                            header("Location: admin-dashboard.html");
                        }
                          

        ?>
    <div class="form-wrapper">
        
        <form method="post">
            <h3>Admin Login</h3>
            <?php
                  if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['submit'])){
                        $username=trim($_POST['username']);
                        $password=trim($_POST['password']);
                        if (!$username){
                            echo "<p>* Please enter username</p>";
                        }
                        if (!$password){
                            echo "<p>* Please enter password</p>";
                        }
                        if($username && $password){
                            $read = 'select * from AdminInfo WHERE username ="'.$username.'" and userpwd="'.$password.'";';
                            if($result=$con->query($read)){
                                if($result->num_rows>0){
                                    $_SESSION["username"] = $username;
                                    echo $_SESSION["username"];
                                    header("Location: user-dashboard.php");
                                }else{
                                    echo "<p>* Invalid username or password.</p>";
                                }
                            }else{
                                echo "error.";
                            }
                        }


                    // if($username=='admin' && $password=='admin'){
                    //     header('location:admin.html');
                    // }
                    // else{
                    //     echo 'Invalid username or password';
                    // }
                    }
            }
            ?>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
            <div class="btn-wrapper">
                <button type="reset" class="btn">Clear</button>
                <button type="submit" class="btn" name='submit'>Login</button>
            </div>
        </form>
    </div>
    <footer>
        <a href="../user/user-login.php">User</a>
        <a href="#">Developers Info</a>
        <a href="mailto:test@gmail.com">FeedBack</a>
    </footer>
</body>

</html>