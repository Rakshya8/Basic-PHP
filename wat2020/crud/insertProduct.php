<?php
Include "connection.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['submit'])){
        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        else{
            $errMsg = "Please enter a product name";
            echo $errMsg;

        }
        if(isset($_POST['price'])&&!empty($_POST['price'])&& is_numeric($_POST['price'])){
            $price=$_POST['price'];
        }
        else{
            $errMsg = "Please enter a price";
            echo $errMsg;

        }
        if(isset($_POST['file'])&&!empty($_POST['file'])){
            $file=$_POST['file'];
        }
    }
}
else{
    echo "Invalid Request";
    exit();
}
$sql=("Insert into products values(null,'$name','$file','$price')");
if (mysqli_query($connection,$sql)){
    echo"Inserted";
    header("Location:/wat2020/crud/crud.php");
}
else{
    echo "Error".mysqli_errno($connection);
}
