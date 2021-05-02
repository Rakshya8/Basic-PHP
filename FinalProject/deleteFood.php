<?php
Include 'connection.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

}
$sql=("delete from foods where id=$id");
echo $sql;
if (mysqli_query($connection,$sql)){
    echo"Deleted";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
else{
    echo "Error".mysqli_errno($connection);
}
