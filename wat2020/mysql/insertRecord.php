<?php
include "connection.php";
if (isset($_POST['btnSubmit'])){
    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
}
$sql="INSERT INTO cutomer VALUES (NULL,'$first_name','$last_name','$email','$pass','$gender','$age')";
//echo $sql;
//exit();
if (mysqli_query($connection,$sql)) {
    echo "Record added successfully";

}
else
    echo "Error".mysqli_errno($connection);
