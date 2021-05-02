<html>
<head>
    <style>
        td{
            border: 1px solid black;
            width: 120px;
        }
    </style>
</head>
</html>
<?php
Include ('connection.php');
$query='select * from products';
$result=mysqli_query($connection,$query);

echo"<center><h1> Manage Products</h1></center>";
echo"<center><a style='margin-bottom: 2%' href='crud.php'>Add Product</a></center>";
echo '<form method="get" action="search.php">';
echo"<center><span><input type='text' placeholder='search' name='s'>
<input type='submit' name='sub' value='Submit'></span></center>";
echo '</form>';
echo "<table cellpadding='10' align='center'>";
echo"<th>Product Name</th>";
echo"<th>Price</th>";
echo"<th>Image</th>";
echo"<th>Amend</th>";
echo"<th>Delete</th>";
while ($row =mysqli_fetch_assoc($result)){
    if($row==0){
        echo"No Data Found";
    }
    else{
        echo"<tr>";
        echo"<td>";
        echo $row['product_name'];
        echo"</td>";
        echo"<td>";
        echo $row['product_price'];
        echo"</td>";
        echo"<td>";
        echo '<img src="./Images/' . $row['product_image'] . '" style="width:100px;height:100px;" />';
        echo"</td>";
        echo"<td>";
        echo "<a href='amendProduct.php?id=".$row['product_id']."'>Amend</a>";
        echo"</td>";
        echo"<td>";
        echo "<a href='deleteProduct.php?id=".$row['product_id']."'>Delete</a>";
        echo"</td> </tr>";
    }
}

?>
