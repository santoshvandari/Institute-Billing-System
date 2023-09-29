<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="../assets/css/user-login.css" />
</head>

<body>
    <div class="form-wrapper">
        <?php
            


        ?>
        <form method="post">
            <?php
                if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['submit'])){
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        include_once "../assets/database/connection.php";
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
        <a href="admin.html">Admin</a>
        <a href="admin.html">Developers Info</a>
        <a href="mailto:test@gmail.com">FeedBack</a>
    </footer>
</body>

</html>