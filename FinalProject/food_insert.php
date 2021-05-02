<?php
Include'connection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['reg-submit'])){
        if(isset($_POST['fname'])&&!empty($_POST['fname'])){
            $fname=htmlspecialchars($_POST['fname']);
        }
        if(isset($_POST['price'])&&!empty($_POST['price'])&&is_numeric($_POST['price'])){
            $price=htmlspecialchars($_POST['price']);
        }
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
        $sql="insert into foods values ('$fname',null,'$price','$cid','$rid')";
        if(mysqli_query($connection,$sql)){
//            header('location:food.php');
        }
        else{
            echo $sql;
            echo mysqli_error($connection);
        }
    }
}
