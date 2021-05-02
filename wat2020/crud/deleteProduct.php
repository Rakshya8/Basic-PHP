<?php
Include 'connection.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

}
$sql=("delete from products where product_id=$id");
if (mysqli_query($connection,$sql)){
    echo"Deleted";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
else{
    echo "Error".mysqli_errno($connection);
}
