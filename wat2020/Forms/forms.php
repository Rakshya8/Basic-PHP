<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
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
    <h1><u>Processing Input from HTML Forms</u></h1>
    <h2><strong>Login Form using GET</strong></h2>
    <form method="post" action= "forms.php" style="display: inline-block;">
        <fieldset>
            <legend>
                Login
            </legend>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="txtEmail" value="<?php
                if(isset($_POST['txtEmail'])){
                    echo $_POST['txtEmail'];
                }
                ?>">
            </div>
            <div class="form-group">
                <label for="email">Password:</label>
                <input type="password" class="form-control" id="email" name="txtPass" value="<?php
                if(isset($_POST['txtPass'])){
                    echo $_POST['txtPass'];
                }
                ?>">
            </div>
            <input type="submit" value="Submit" name="loginSubmit"class="btn btn-sumit"/>
            <input type="reset" value="Clear" />
        </fieldset>
    </form>

    <form method="post" action="forms.php" style="width: 300px; display: inline-block;">
        <fieldset>
            <legend>Comments</legend>
            <label for="cemail">Email: </label>
            <input type="text" name="cemail" value="<?php
            if(isset($_POST['cemail']))
                echo $_POST['cemail'];
            ?>" /><br />
            <label for="comments">Comments</label>
            <textarea rows="4" cols="50" name="comments" ><?php
                if(isset($_POST['comments']))
                    echo $_POST['comments'];
                ?></textarea><br />
            <label for="confirm">Click to Confirm: </label>
            <input type="checkbox" name="chkConfirm" value="agree"><br />
            <input type="submit" value="Submit" name="btnForm2"/>
            <input type="reset" value="Clear" />
        </fieldset>
    </form>
    <br>


    <br>
    <hr>
    <h1>
        Tax Calculator
    </h1>
    <form method="post" style="width: 600px; display: inline-block">
        <fieldset>
            <legend>Without TAX Calculator</legend>
            After Tax Price:<input type="text" name="initial" value="<?php
            if(isset($_POST['initial']))
                echo $_POST['initial'];
            ?>" required>
            Tax Rate:<input name="rate" value="<?php
            if(isset($_POST['rate']))
                echo $_POST['rate'];
            ?>" required>
            <br>
            <br>
            <input type="submit" name="btnsubmit" value="submit">
            <input type="reset" value="Clear">
        </fieldset>
    </form>
    <hr>
    <?php

        if(isset($_POST['loginSubmit'])){
            echo"<div style='border: 2px solid black; width: 500px; margin: auto'>";
            if(isset($_POST['txtEmail'])&&!empty($_POST['txtEmail'])){
                $email=$_POST['txtEmail'];
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Empty Email or Null")';
                echo '</script>';
                $email="Empty";
            }
            if(isset($_POST['txtPass'])&&!empty($_POST['txtPass'])){
                $password=$_POST['txtPass'];
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Empty Password or Null")';
                echo '</script>';
                $password="Empty";
            }
            echo "<br>Email $email <br> Password $password <br>";
            echo"</div>";
        }
        if(isset($_POST['btnForm2'])){
            echo"<div style='border: 2px solid black; width: 500px; margin: auto'>";
            if(isset($_POST['cemail'])&&!empty($_POST['cemail'])){
                if(filter_var($_POST['cemail'],FILTER_VALIDATE_EMAIL)){
                    $cemail=$_POST['cemail'];
                    echo "Email: $cemail";
                }
                else{
                    echo"Not valid email";
                }
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("No email entered")';
                echo '</script>';
                $cemail="Empty";
            }
            $comment=$_POST['comments'];
            if(isset($_POST['chkConfirm'])){
                $confirm='Agreed<br />';
            }
            else{
                $confirm='Not Agreed<br />';
            }
             echo"<br>Comment: $comment<br>Confirm: $confirm ";
            echo"</div>";

        }
        if (isset($_POST['btnsubmit'])){
            echo"<div style='border: 2px solid black; width: 500px; margin: auto'>";
            if(isset($_POST['rate'])){
                if(!empty($_POST['rate'])) {
                    if(filter_var($_POST['rate'],FILTER_VALIDATE_INT)){
                        $rate = $_POST['rate'];
                    }
                    else{
                        echo"Please enter a whole number for tax rate";
                        exit();
                    }
                }
                else{
                    echo"Please enter a whole number for tax rate";
                }
            }
            if (isset($_POST['initial'])){
                if(!empty($_POST['initial'])) {
                    if(preg_match(' /^\d+(:?[.]\d{2})$/ ',$_POST['initial'])){
                        $initial=$_POST['initial'];
                    }
                    else{
                        echo "Please enter the price in the format 9.99";
                        exit();
                    }
                }
                else{
                    echo "Please enter a whole number for tax rate";

                }
            }

            $res=(100*$initial)/(100+$rate);
            $res=number_format($res,2);
            echo "Price before tax= £$res";
            echo"</div>";
    }

    ?>
    <br>
    <hr>

    <h1>Passing Data Appended to an URL</h1>
    <h2>Pick a category</h2>
    <a href="forms.php?cat=Films">Films</a>
    <a href="forms.php?cat=Books">Books</a>
    <a href="forms.php?cat=Music">Music</a>
    <br>
    <?php
    if(isset($_GET['cat'])){
        echo"<h1> The Category chosen is ".$_GET['cat']."</h1>";
    }
    ?>
    <hr>

</section>
</body>
</html>

