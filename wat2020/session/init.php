<?php

$hostname="localhost";
$username ="root";
$password="";
$databaseName="mydb";
$connection =mysqli_connect($hostname, $username,$password,$databaseName) or exit("Unable to connect!");
session_start();
//if($connection)
//        echo "Connected";
//else
//    echo "Failed";
?>