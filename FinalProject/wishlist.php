<?php
Include('connection.php');
$name=$_GET['name'];
$id=$_SESSION['uid'];
$image=$_GET['image'];
$sql="insert into wishlist value (null, '$id','$name','$image')";
echo $sql;
if(mysqli_query($connection,$sql)){
    echo 'done';
}
else{
    echo mysqli_error($connection);
}
