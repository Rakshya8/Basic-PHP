<?php
Include'connection.php';
$username=$_SESSION['username'];
$sql="select * from users where username='$username'";

$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);

if($row>0){
    $password=$row['password'];
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['updateP'])){
        if(isset($_POST['o'])&&!empty($_POST['o'])){
            $pd=sha1($_POST['o']);

        }
        if($password==$pd && $_POST['n']==$_POST['repassword']){
            if(isset($_POST['n'])&&!empty($_POST['n'])){
                $uppercase = preg_match('@[A-Z]@', $_POST['n']);
                $lowercase = preg_match('@[a-z]@', $_POST['n']);
                $number    = preg_match('@[0-9]@', $_POST['n']);
                if(!$uppercase || !$lowercase || !$number || strlen($_POST['n'])<8){
                    $passe="Please enter a password of length more than 8 containing at least an upper case letter, a number";
                }
                else{
                    $password=htmlspecialchars($_POST['n']);
                    $fpassword=sha1(htmlspecialchars($_POST['n']));
                    $sql=("update users set fname='$password' where username='$username'");
                    if( mysqli_query($connection,$sql)){
                        $_SESSION['update']="Updated successfully";
                    }
                    else{
                        $_SESSION['update']="error";

                    }
                }

            }

        }
        header("location: profile.php");
    }
}