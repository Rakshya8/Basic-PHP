<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Applications and Technologies</title>
    <link type="text/css" rel="stylesheet" href="../Style/main.css" />
</head>
<body>
<header>
    <center>
        <h1>Rakshya Lama Moktan</h1> <br>
        <h1><u>Student id:</u> C7227218</h1>
    </center>
    <hr style='border-top: 4px solid red;'/>
</header>

<section id="container" style='text-align: center;'>

<?php
echo"<h3><u>Some Useful Functions</u></h3>";
$password="password   ";
$password=trim($password);
$password=htmlentities($password);
echo "Password is: $password <br>";
if(isset($password) && !empty($password)){
    if(strlen($password)>=6 and strlen($password)<=8){
        if(is_numeric($password)){
            echo "Password cannot be a number";
        }
        else{
            $enc=sha1($password);
            echo"The password is Ok<br>";
            echo "Encypted password: $enc";

        }
    }
    else{
        echo"Your password must be between 6 and 8 characters in length";
    }

}
else{
    echo"Please enter a password";
}
echo "<hr>";
?>
</section>
</body>
</html>
