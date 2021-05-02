<?php

Include ('connection.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

}
$sql = ("select * from products where product_id=$id");
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name=$row['product_name'];
    $price=$row['product_price'];
    $image=$row['product_image'];
}
?>
<html>
<head>
    <title>Update Form</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Manage Products</h1>
<form method="post" action="updateProduct.php">
    <fieldset style="width: 100px; display: inline-block">
    <legend>Enter New Product Detail</legend>
    <input type="hidden" name="id" value="<?php echo $id?>">
    Product Name: <br><input type="text" name="name" value="<?php echo $name?>"><br> <br>
    Price: <br><input type="number" name="price" value="<?php echo $price?>"><br><br>
    Image Filename: <br><input type="file" name="file" value="<?php echo $image?>">
        <?php echo '<img src="./Images/' . $image . '" style="width:100px;height:100px;" /' ?><br><br>
    <input type="submit" value="Submit" name="submit"> <input type="reset" value="Clear">
</fieldset>

</form>
</body>
</html>
