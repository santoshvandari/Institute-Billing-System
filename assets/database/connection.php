<?php
$con=new mysqli("localhost","root","");
if($con->error){
    die("Failed to Connect to Database");
}else{
    echo "Database Connected Successfully";
}
?>