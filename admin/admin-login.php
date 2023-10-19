<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/admin/login.css" />
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
                        if(!empty($_SESSION['adminname'])){
                            header("Location: admin-dashboard.php");
                        }
                          

        ?>
    <div class="form-wrapper">
        
        <form method="post">
            <h3>Admin Login</h3>
            <?php
                  if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['submit'])){
                        $username=trim($_POST['username']);
                        $password=md5(trim($_POST['password']));
                        // echo md5($password);
                        if (!$username){
                            echo "<p>* Please enter username</p>";
                        }
                        if (!$password){
                            echo "<p>* Please enter password</p>";
                        }
                        if($username && $password){
                            $read = 'select * from AdminInfo WHERE username ="'.$username.'" and adminpwd="'.$password.'";';
                            if($result=$con->query($read)){
                                if($result->num_rows>0){
                                    $_SESSION["adminname"] = $username;
                                    header("Location: admin-dashboard.php");
                                }else{
                                    echo "<p>* Invalid username or password.</p>";
                                }
                            }else{
                                echo "error.";
                            }
                        }
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
        <a href="../student/">Home</a>
        <a href="mailto:info@bhandari-santosh.com.np">FeedBack</a>
    </footer>
</body>

</html>