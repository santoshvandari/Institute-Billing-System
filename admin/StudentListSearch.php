<?php
    include_once "../assets/database/connection.php";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET['name'])){
            $name=$_GET['name'];
            $read="SELECT * FROM StudentInfo,CourseInfo WHERE StudentInfo.cid=CourseInfo.cid AND name like '$name%';";
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
                         <td>".$row['cname']."</td>
                         <td><a href='student-bill.php?phone=".$row['phone']."'>Bill</a> | <a href='edit-student.php?phone=".$row['phone']."'>Edit</a> | <a href='delete-student.php?phone=".$row['phone']."' onclick='return Check()'>Delete</a></td>";  
                        echo $disp;
                    }
                }else{
                    echo "<tr><td colspan='8'>No record found</td></tr>";
                }
            }
        }
    }

?>