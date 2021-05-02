<html>
<head>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
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
    <style>
        body {
            background-image: url('Images/kitchen_image_2.jpg');;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin-left: 30px;
        }


    </style>

</head>
<body>
<div class="container justify-content-center">
    <form data-toggle="validator" role="form"
          class="form-group has-error has-feedback justify-content-center"
          method="post" action="login_user.php"  style="width: 400px">
        <div class="container justify-content-center">

            <div class="row justify-content-center">
                <div class="col-sm-10 text-center" style="top: 30%">
                    <?php if(isset($_SESSION['otpsuccess'])){
                        echo "Welcome to Commerce Stop <br>".$_SESSION['otpsuccess'];
                        echo"<br>Please Login to continue";
                        unset($_SESSION['otpsuccess']);
                    }?>
                    <h3 class='text-center' style="margin-top: 5%" >Login</h3>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-8 text-content-center" id="field">
                    <span class="input-group-append">
                        <input type="text" name="username" placeholder="Username"
                               size="30" class="inline-fields justify-content-center" id="username"
                               onchange="return check_username()" required>
                <label class="float-right" for="Username">
                    <i class="bi bi-person-fill" id="icon"></i>
                </label>
                    </span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-10 justify-content-center" id="field">
<!--                    <small id="userText" class="text">Must of length greater then 6</small>-->
                    <span class="text-danger col-sm-4"><?php if(!empty($usere)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$usere.'</label></small>';
                        } ?> </span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-8 justify-content-center"id="field">
                <span class="input-group-append">
                    <input type="password" name="password" placeholder="Password" id="pass"
                           onchange="check_password()"
                           class="inline-fields" id="confirmPassword" size="30" required>
                    </span>
                </div>
            </div>
                <div class="row justify-content-center" style="margin-bottom: 5%">

                <div class="col-sm-10 justify-content-center"id="field">
<!--                    <small class="text" style="color: #6c757d" id="passText">-->
<!--                        Must be of length more than 8 containing at-->
<!--                        least an upper case letter and a number</small>-->
                    <span class="text-danger col-sm-4"><?php if(!empty($passe)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$passe.'</label></small>';
                        } ?> </span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-5 text-center">
                        <a href="forgot_password.php" style="font-size: small;
                        text-decoration: none;
    color:black;">Forgot Password</a>
                </div>
            </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-sm-10 text-center">
                    <input type="submit" onclick="valid()"
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
        <div class="row justify-content-center">
            <div class="col-sm-5 text-center">
                <small style="font-size: small">Admin? </small>
                <a href="login_admin.php" style="font-size: small;
                    text-decoration: none;color:black;">Sign in as Admin</a>
            </div>
        </div>


    </form>
</div>
</body>
</html>
