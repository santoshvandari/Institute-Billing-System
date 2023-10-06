<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET['name'])){
            $name=$_GET['name'];
            $read="SELECT * FROM StudentInfo WHERE name like '$name%';";
            if($result=$con->query($read)){
                if($result->num_rows>0){
                    $num=0;
                    while ($row=$result->fetch_assoc()){
                         $num++;
                        $disp="<tr><td>$num</td>
                        <td>".$row['name']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['parentname']."</td>
                        <td><a href='student-bill.php?phone=".$row['phone']."'>Bill</a></td>"; 
                        echo $disp;
                    }
                }else{
                    echo "<tr><td colspan='8'>No record found</td></tr>";
                }
            }
            // echo $read;
        }
    }

?>