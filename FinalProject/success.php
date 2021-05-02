<?php
Include('connection.php');
if(isset($_SESSION['otpsuccess'])){
    header("location:login.php");
}
else{
    echo"Email and OTP combination do not match!";
    header('location: OTPCOnfirmation.php');
}
