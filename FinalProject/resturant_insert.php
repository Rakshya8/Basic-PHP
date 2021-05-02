<?php
Include'connection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['reg-submit'])){
        if(isset($_POST['rname'])&&!empty($_POST['rname'])){
            $rname=htmlspecialchars($_POST['rname']);
        }
        if(isset($_POST['loc'])&&!empty($_POST['loc'])){
            $loc=htmlspecialchars($_POST['loc']);
        }
        if(isset($_POST['image'])&&!empty($_POST['image'])){
            $image=htmlspecialchars($_POST['image']);
        }
        if(isset($_POST['cover'])&&!empty($_POST['cover'])){
            $cover=htmlspecialchars($_POST['cover']);
        }
        if(isset($_POST['logo'])&&!empty($_POST['logo'])){
            $logo=htmlspecialchars($_POST['logo']);
        }
        if(isset($_POST['about'])&&!empty($_POST['about'])){
            $about=$_POST['about'];
        }
        $sql="insert into restaurant values (null,'$rname','$loc','$image','$cover','$about','$logo')";
        if(mysqli_query($connection,$sql)){
            header('location:Restaurant.php');
        }
        else{
            echo $sql;
            echo mysqli_error($connection);
        }
    }
}
