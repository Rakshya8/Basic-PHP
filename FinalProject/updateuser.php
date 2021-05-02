<?php
Include'connection.php';
$username=$_SESSION['username'];
$sql="select * from users where username='$username'";

$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);

if($row>0){
    $fname=$row['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $dob=$row['dob'];
    $file=$row['profile_pic'];
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['updateP'])){
        if(isset($_POST['fname'])&&!empty($_POST['fname']))
            $fname=$_POST['fname'];
        if(isset($_POST['lname'])&&!empty($_POST['lname']))
            $lname=$_POST['lname'];
        if(isset($_POST['dob'])&&!empty($_POST['dob']))
            $dob=$_POST['dob'];
        if(isset($_POST['picture'])&&!empty($_POST['picture']))
            $file=$_POST['picture'];
        $sql=("update users set fname='$fname', lname='$lname', profile_pic='$file',dob='$dob' where username='$username'");
        echo $sql;
        if( mysqli_query($connection,$sql)){
            $_SESSION['update']="Updated successfully";
            $_SESSION['pro']=$file;
        }
        else{
            $_SESSION['update']="error";

        }
        header("location: profile.php");
    }
}