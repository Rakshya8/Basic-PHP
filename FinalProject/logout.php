<?php
INCLUDE('connection.php');
session_destroy();
session_unset();
header("location: home.php");
