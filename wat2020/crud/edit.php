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
</head>
<body>
<h1>Manage Products</h1>
<form style="width: 100px; margin: auto; display: inline-block" method="post" action="updateProduct.php?id=".$row['product_id']."">
    <fieldset>
        <legend>Enter New Product Details</legend>
        Product Name: <br><input type="text" name="name" value="<?php echo $name?>"><br>
        Price: <br><input type="number" name="price" value="<?php echo $price?>"><br>
        Image Filename: <br><input type="file" name="file" value="<?php echo $image?>"><br>
        <input type="submit" value="Submit" name="submit"> <input type="reset" value="Clear">
    </fieldset>

</form>
</body>
</html>
