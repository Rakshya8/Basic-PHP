<?php
Include'connection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['reg-submit'])){
        if(isset($_POST['cname'])&&!empty($_POST['cname'])){
            $cname=htmlspecialchars($_POST['cname']);
        }
        $sql="insert into cuisine values ('$cname',null)";
        if(mysqli_query($connection,$sql)){
            header('location:adminCuisine.php');
        }
        else{
            echo $sql;
            echo mysqli_error($connection);
        }
    }
}
