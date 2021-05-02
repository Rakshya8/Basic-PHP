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
    <h1> Order Form</h1>
    <h4> Please fill out this form to place your order.</h4>
    <form method="post" style="width: 600px; display: inline-block; border: 2px solid violet; padding: 5px" action="FormExtension.php">

        <fieldset>
            <legend>Enter your login details</legend>
            <label>User Name: </label><input type="text" name="username" value="<?php if(isset($_POST['username'])){
                    echo $_POST['username'];
                }
                ?>" required>
            <label>Email: </label><input type="email" name="email" value="<?php if(isset($_POST['email'])){
                    echo $_POST['email'];
                }
                ?>" required>
        </fieldset>
        <fieldset>
            <legend>Pizza Selection</legend>
            <label>Size: </label>
            <input type="radio" name="size" value="Small" <?php
            if(isset($_POST['size'])&&$_POST['size']=="Small"){
                echo"checked";
            }?>>Small
            <input type="radio" name="size" value="Medium"
                <?php
                if(isset($_POST['size'])&&$_POST['size']=="Medium"){
                    echo"checked";
                }?>
            >Medium
            <input type="radio" name="size" value="Large"
                <?php
                if(isset($_POST['size'])&&$_POST['size']=="Large"){
                    echo"checked";
                }?>>Large
            <br>
            <label>Topping</label>
            <select name="topping" required>
                <option selected="selected" disabled="true" value="">Please select</option>
                <option value="Seafood"
                    <?php
                    if(isset($_POST['topping'])&&$_POST['topping']=="Seafood"){
                        echo"selected";
                    }?>
                >Seafoood</option>
                <option value="Pepporoni"
                    <?php
                    if(isset($_POST['topping'])&&$_POST['topping']=="Pepporoni"){
                        echo"selected";
                    }?>>Pepporoni</option>
                <option value="Pineapple"
                    <?php
                    if(isset($_POST['topping'])&&$_POST['topping']=="Pineapple"){
                        echo"selected";
                    }?>
                >Pineapple</option>
            </select>
            <br>
            <label>Extras:</label>
            <input type="checkbox" name="extras[]" value="Parmesan"
                <?php
                if(isset($_POST['extras'])){
                    foreach ($_POST['extras']as $e){
                        if($e=="Parmesan")
                        {
                            echo"checked";
                        }
                    }
                }?>>Parmesan
            <input type="checkbox" name="extras[]" value="Olive"
                <?php
                if(isset($_POST['extras'])){
                    foreach ($_POST['extras']as $e){
                        if($e=="Olive")
                        {
                            echo"checked";
                        }
                    }
                }?>>Olive
            <input type="checkbox" name="extras[]" value="Capers"
                <?php
                if(isset($_POST['extras'])){
                    foreach ($_POST['extras']as $e){
                        if($e=="Capers")
                        {
                            echo"checked";
                        }
                    }
                }?>
            >Capers
        </fieldset>
        <input type="submit" name="btn-submit" value="Sumbit">
        <input type="reset" value="Clear">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $extras=Array();
        if (isset($_POST['btn-submit'])){
            if(isset($_POST['username']) &&!empty($_POST['username'])){
                $username=$_POST['username'];
            }
            else{
                echo "Please enter a username!";
            }
            if(isset($_POST['email']) &&!empty($_POST['email'])){
                $email=$_POST['email'];
            }
            else{
                echo "Please enter a email!";
            }
            if(isset($_POST['size']) &&!empty($_POST['size'])){
                $size=$_POST['size'];
            }
            else{
                echo "Please select the size of the Pizza!";
            }
            if(isset($_POST['topping']) &&!empty($_POST['topping'])&&$_POST['topping']!="Please select"){
                $topping=$_POST['topping'];
            }
            else{
                echo "Please select a Pizza topping!";
            }
            if(isset($_POST['extras'])){
                $extras=$_POST['extras'];
                }
            }
            echo "<br><br><br><div style='border: 2px solid black; width: 500px; display: inline-block'> <h1 style='color: blue'>Thank you for the order</h1><br>
                 Customer ID: <strong>$username</strong><br>Email: <strong>$email</strong><br>Your order: <strong>$size $topping</strong><br>Extra Toppings: ";
        foreach ($extras as $e){
            echo"<strong>$e</strong>    ";
        }
        echo"</div>";
    }

    ?>
</section>
</body>
</html>