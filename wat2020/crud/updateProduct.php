<?php
Include 'connection.php';
$id=($_POST['id']);
$sql = ("select * from products where product_id=$id");
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name_i=$row['product_name'];
    $price_i=$row['product_price'];
    $image_i=$row['product_image'];
}
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $name=$_POST["name"];
    $price=$_POST["price"];
    $image=$_POST["file"];
    if(empty($name)){
        $name=$name_i;
    }
    if(empty($price)){
        $price=$price_i;
    }
    if(!isset($image) ||empty($image)){
        $image=$image_i;
    }

}

$sql=("update products set product_name='$name', product_price='$price', product_image='$image' where product_id='$id'");
if (mysqli_query($connection,$sql)){
    header("Location:displayProducts.php");
//    echo $image;
}
else{
    echo "Error".mysqli_errno($connection);
}
header("location:displayProducts.php");
