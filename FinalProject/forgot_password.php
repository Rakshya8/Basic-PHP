<?php
Include('connection.php');
if($_SERVER["REQUEST_METHOD"]=="POST") {
    if (isset($_POST['reg-submit'])) {
        if (isset($_POST['username']) && !empty($_POST['username'])) {
            if (strlen(trim($_POST['username'])) > 6) {
                $uname = $_POST['username'];
                $sql = "select * from users where username='$uname'";
                $result = mysqli_query($connection, $sql);
                if ($row = mysqli_fetch_assoc($result)) {
                    $username = $_POST['username'];

                } else {
                    $usere = "The username not found";
                }
            } else {
                $usere = "Please enter a username";;
            }
        } else {
            $usere = "Please enter a username";
        }
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $mail = htmlspecialchars($_POST['email']);
                $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
                $query = "select * from users where email='$mail'";
                $result = mysqli_query($connection, $query);
                if ($row = mysqli_fetch_assoc($result)) {
                    $email = $_POST['email'];

                } else {
                    $eerror = "Email not found";

                }
            } else {
                $eerror = "Please enter a valid email";
            }
        } else {
            $eerror = "Please enter your email";
        }
        if (isset($_POST['password']) && !empty($_POST['password'])) {

            $uppercase = preg_match('@[A-Z]@', $_POST['password']);
            $lowercase = preg_match('@[a-z]@', $_POST['password']);
            $number = preg_match('@[0-9]@', $_POST['password']);
            if (!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 8) {
                $passe = "Please enter a password of length more than 8 containing at least an upper case letter, a number";
            } else {
                $password = htmlspecialchars($_POST['password']);
                $fpassword = sha1(htmlspecialchars($_POST['password']));
            }
        } else {
            $passe = "Please enter a password";
        }
        if (isset($_POST['repassword']) && !empty($_POST['repassword'])) {
            if ($_POST['repassword'] != $password) {
                $repass = "The passwords do not match";
            }
        } else {
            $repass = "You need to enter the password twice";
            exit();
        }
        resetPassword($connection, $username, $email, $fpassword);
    }
}

    function resetPassword($connection,$username,$email,$fpassword){
        $sql="select * from users where username='$username'and email='$email'";
        $result=mysqli_query($connection,$sql);
        while($row=mysqli_fetch_assoc($result)){
            if($row>0){
                $sql="update users set password ='$fpassword' where username='$username'";
                if(mysqli_query($connection, $sql))
                    header('location: login.php');
                else{
                    $_SESSION['ferrors']="Unable to process at the moment".mysqli_error($connection);
                }
            }


        }
}
?>
<html>
<head>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="js/form.js"></script>

</head>
<body>
<div class="container justify-content-center">
    <form data-toggle="validator" role="form"
          class="form-group has-error has-feedback justify-content-center"
          method="post" onsubmit="return validate()"
          style="width: 55%"
          action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <div class="container justify-content-center">

            <div class="row justify-content-center">
                <div class="col-sm-10 justify-content-center" style="top: 30%">
                    <h3 class='text-center' style="margin-top: 5%" >Reset Password</h3>
                </div>
            </div>
            <div class="row justify-content-center">
            <small class="col-sm-10 text-center"><?php if(isset($_SESSION['ferrors']))
                    echo $_SESSION['ferrors'];?></small>
            </div>

            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                    <span class="input-group-append">
                        <input type="text" name="username" placeholder="Username"
                               size="27" class="inline-fields" id="username"
                               value="<?php if(isset($username)){
                                   echo $username;
                               }?>"
                               onchange="return check_username()" required>
                <label class="float-right" for="Username">
                    <i class="bi bi-person-fill" id="icon"></i>
                </label>
                    </span>
                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <small id="userText" class="text">Must of length greater then 6</small>
                    <span class="text-danger col-sm-4"><?php if(!empty($usere)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$usere.'</label></small>';
                        } ?> </span>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-5 justify-content-center" id="field">
                <span class="input-group-append">
                    <input type="email" name="email" placeholder="Email ex:ex@ex.com"
                           onchange="validate_email()" id="email"
                           value="<?php if(isset($_POST['email'])){
                               echo $_POST['email'];
                           }?>"
                           class="inline-fields" size="26" required>
                    <label for="Email">
                    <i class="bi bi-envelope-fill" id="icon"></i>
                </label>
                    </span>


                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <small class="text" id="emailText">
                        Please enter a valid email address.
                        <br>We wont share with anyone.</small>
                    <span class="text-danger col-sm-4 "><?php if(!empty($eerror)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$eerror.'</label></small>';
                        } ?> </span>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-5 justify-content-center"id="field">
                <span class="input-group-append">
                    <input type="password" name="password" placeholder="Password" id="pass"
                           onchange="check_password()"
                           class="inline-fields" id="confirmPassword" size="26" required>
                    </span>
                </div>

                <div class="col-sm-5 justify-content-center"id="field">
                    <small class="text" style="color: #6c757d" id="passText">
                        Must be of length more than 8 containing at
                        least an upper case letter and a number</small>
                    <span class="text-danger col-sm-4"><?php if(!empty($passe)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$passe.'</label></small>';
                        } ?> </span>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-5 justify-content-center" id="field">
                <span class="input-group-append">
                    <input type="password" placeholder="Retype Password" name="repassword"
                           size="26" id="repass" onchange="check_pass()"
                           class="inline-fields" required>
                    </span>
                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <small class="text" id="repassText">Must match the above typed password</small>
                    <span class="text-danger col-sm-4"><?php if(!empty($repass)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$repass.'</label></small>';
                        } ?> </span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-10 text-center">
                    <input type="submit"
                           class="btn btn-success" name="reg-submit" value="Submit" id="button">

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-5 text-center">
                    <small style="font-size: small">Not a user? </small>
                    <a href="Register.php" style="font-size: small;
                    text-decoration: none;color:black;">Sign up</a>
                </div>
            </div>
        </div>


    </form>
</div>
</body>
</html>
