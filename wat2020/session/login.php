<?php
Include 'init.php';
if(isset($_POST['subLogin'])){
    if(isset($_POST['txtUser'])&&!empty($_POST['txtUser'])){
        $user=$_POST['txtUser'];
    }
    if(isset($_POST['txtPass'])&&!empty($_POST['txtPass'])){
        $pass=$_POST['txtPass'];
    }
    $query="select * from users where username='$user' and password='$pass'";
    $result=mysqli_query($connection, $query);
    $row=mysqli_fetch_assoc($result);
    if($row>0){
        $_SESSION['user']=$user;
    }
    else {
        $_SESSION['error']= 'User not recognised';
    }

    header ('location: session.php');

}

