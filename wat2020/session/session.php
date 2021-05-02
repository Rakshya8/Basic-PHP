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
    <h1><u>Handling Sessions in PHP</u></h1>
<?php
Include 'init.php';
if(isset($_SESSION['user'])){
    echo"<div style='display: grid;
  grid-template-columns: 1fr 1fr 1fr; padding: 20px'><a href='logout.php'>Logout</a>"."<p>Welcome ".$_SESSION['user']."</p>"."<a href='protected.php'>Protected</a></div>";
}
else{
    if(isset($_SESSION['error']))
        echo $_SESSION['error'];
    Include'loginform.php';
}?>
</section>
</body>
</html>
