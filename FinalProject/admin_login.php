<?php
Include('connection.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['reg-submit'])){
        if(isset($_POST['username'])&&!empty($_POST['username'])){
            if(strlen(trim($_POST['username']))>6){
                $uname=$_POST['username'];
            }
            else{
                $_SESSION['error']="Please enter a username of length more than 6";
            }
        }
        else{
            $usere="Please enter a username";
        }
        if(isset($_POST['password'])&&!empty($_POST['password'])){

            $uppercase = preg_match('@[A-Z]@', $_POST['password']);
            $lowercase = preg_match('@[a-z]@', $_POST['password']);
            $number    = preg_match('@[0-9]@', $_POST['password']);
            if(!$uppercase || !$lowercase || !$number || strlen($_POST['password'])<8){
                $passe="Please enter a password of length more than 8 containing at least an upper case letter, a number";
            }
            else{
                $password=htmlspecialchars($_POST['password']);
                $fpassword=sha1(htmlspecialchars($_POST['password']));
            }
        }
        else{
            $passe="Please enter a password";
        }
        if(isset($uname)&&isset($password)){
            login($uname,$fpassword,$connection);
        }

    }
}
else{
    $serve="Bad Request";
    exit();
}
function login($username,$fpassword,$connection){
    $sql="select * from users where username='$username'and password='$fpassword' and role='admin'";

    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);
    if($row>0){
        $_SESSION['username']=$username;
        $_SESSION['pro']=$row['profile_pic'];
        header('location: admin_home.php ');
    }
    else{
        $_SESSION['login_error']="User not found";
        header("location: login_admin.php");
    }

}
