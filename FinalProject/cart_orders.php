<?php
Include('connection.php');
if(isset($_POST['checkout'])){
    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
        $userid=$_SESSION['uid'];
        $total=$_POST['total'];
        date_default_timezone_set("Asia/Kathmandu");
        $d= date('Y-m-d');
        $sql="insert into orders value(null,'$d','$userid','$username','$total')";
        echo $sql;

        if(mysqli_query($connection,$sql)){

            echo'Inserted';
            unset($_SESSION["shopping_cart"]);
            $_SESSION['count']=0;
            $_SESSION['omsg']="Your order is successful";

        }
        else{
            $_SESSION['omsg']="Entered error please try again later";
            echo mysqli_error($connection);
        }
        header('location: home.php');
    }
}
