<?php
Include 'connection.php';
$id=$_SESSION['fid'];
$sql = ("select * from foods where id=$id");
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name_i=$row['name'];
    $price_i=$row['price'];
    $cat_i=$row['category_id'];
    $res_i=$row['restaurant_id'];
}
$name=$_POST["fname"];
$price=$_POST["price"];
if(isset($_POST['res'])&&!empty($_POST['res'])){
    $res=htmlspecialchars($_POST['res']);
    $que="select * from restaurant where name='$res'";
    $result=mysqli_query($connection,$que);
    while ($row=mysqli_fetch_assoc($result)){
        $rid=$row['id'];
    }
}
if(isset($_POST['category'])&&!empty($_POST['category'])){
    $cat=htmlspecialchars($_POST['category']);
    $que="select * from category where name='$cat'";
    $result=mysqli_query($connection,$que);
    while ($row=mysqli_fetch_assoc($result)){
        $cid=$row['id'];
    }
}
if(empty($name)){
    $name=$name_i;
}
if(empty($price)&&!is_numeric($price)){
    $price=$price_i;
}
if(!isset($_POST['category']) ||empty($_POST['category'])){
    $cid=$cat_i;
}
if(!isset($_POST['res']) ||empty($_POST['res'])){
    $rid=$res_i;
}


$sql=("update foods set name='$name', price='$price', category_id='$cid', restaurant_id='$rid' where id='$id'");
echo $sql;
if (mysqli_query($connection,$sql)){
    echo"Updated";
    header("Location:food.php");
}
else{
    echo "Error".mysqli_errno($connection);
}
