<?php
Include 'connection.php';
$id=$_SESSION['cid'];
$sql = ("select * from cuisine where cuisine_id=$id");
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name_i=$row['cuisine_name'];
}
$name=$_POST["cname"];

if(empty($name)){
    $name=$name_i;
}



$sql=("update cuisine set cuisine_name='$name' where cuisine_id='$id'");
echo $sql;
if (mysqli_query($connection,$sql)){
    echo"Updated";
    header("Location:adminCuisine.php");
}
else{
    echo "Error".mysqli_errno($connection);
}
